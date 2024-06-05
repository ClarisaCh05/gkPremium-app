<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\image;
use GuzzleHttp\Client;
use App\Models\costume;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\costume_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class costume_controller extends Controller
{
    public function tampilCostume() 
    {
        return view('admin_util/kostum');
    }

    public function getCompleteCostume(Request $request)
    {
        if ($request->ajax()) {
            $data = costume::select('costume.*', DB::raw('GROUP_CONCAT(DISTINCT image.imageUrl SEPARATOR ",") AS images'), DB::raw('GROUP_CONCAT(DISTINCT category.category SEPARATOR ", ") AS categories'))
                ->join('costume_category', 'costume.id_costume', '=', 'costume_category.id_costume')
                ->join('category', 'costume_category.id_category', '=', 'category.id_category')
                ->join('image', 'image.id_costume', '=', 'costume.id_costume')
                ->groupBy('costume.id_costume', 'costume.name', 'costume.size', 'costume.price', 'costume.description', 'costume.views', 'costume.interest')
                ->orderBy('costume.id_costume', 'asc')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                        <div class="d-flex">
                            <a href="/kostum/edit_kostum/'.$row->id_costume.'" class="edit btn btn-success btn-sm btn-icon rounded-circle mr-1 mb-1" style="margin-bottom: 0.25rem;">
                                <i class="fas fa-edit"></i>
                            </a> 
                            <a href="javascript:void(0)" data-id="'.$row->id_costume.'" class="delete btn btn-danger btn-sm btn-icon rounded-circle mr-1 mb-1">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin_util.kostum');
    }


    public function getAddCostume() {
        return view('admin_util/add_kostum');
    }

    public function addCostume(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $costume = costume::create([
            'name' => $validated['name'],
            'size' => $validated['size'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'views' => 0,
            'interest' => 0
        ]);

        return response()->json(['id_costume' => $costume->id_costume]);
    }   

    public function deleteCostume($id_costume)
    {
        // Find the costume
        $costume = costume::find($id_costume);
        
        if (!$costume) {
            // Costume not found, return a 404 error
            abort(404);
        }
        
        // Delete related image records
        image::where('id_costume', $id_costume)->delete();
        
        // Delete related costume category records
        costume_category::where('id_costume', $id_costume)->delete();
        
        // Delete the costume record
        $costume->delete();
        
        // Return a success response
        return response()->json(['success' => true]);
    }

    public function editCostume($id_costume)
    {
        $costume = costume::select('costume.*')
            ->where('costume.id_costume', $id_costume)
            ->get();

        $images = image::select('image.*')
            ->where('image.id_costume', $id_costume)
            ->get();

        $costume_category = costume_category::select('costume_category.*')
            ->where('costume_category.id_costume', $id_costume)
            ->get();

        $categories = category::select('category.*')
            ->get();

        return view('admin_util/edit_kostum', compact('costume', 'images', 'costume_category', 'categories'));
    }

    public function updateCostume(Request $request, $id_costume)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        // Update the costume
        $costume = costume::where('id_costume', $id_costume)->first();
        $costume->update([
            'name' => $request->name,
            'size' => $request->size,
            'price' => $request->price,
            'description' => $request->description,
            // Include any other fields you need to update
        ]);

        return response()->json(['message' => 'Costume updated successfully']);
    }

    public function uploadImage(Request $request)
    {
       try {
            $client = new Client();
            $response = $client->request('POST', 'https://api.imgbb.com/1/upload', [
                'form_params' => [
                    'image' => base64_encode(file_get_contents($request->file('file')->getRealPath())),
                    'key' => '55488f24a499c325646c862eb83f31d5',
                ],
            ]);
            
            $responseData = json_decode($response->getBody(), true);
            // $imageUrl = $responseData['data']['display_url'];
        
            if (isset($responseData['data']['display_url'])) {
                return response()->json(['image_url' => $responseData['data']['display_url']]);
            } else {
                return response()->json(['error' => 'Image upload failed'], 500);
            }

       } catch (\Exception $e) {
            Log::error('Error in uploadImage: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
       }
    }

    public function saveImage(Request $request)
    {
        Log::info('Saving image with data:', $request->all());

        $costumeId = $request->input('id_costume');
        $imageUrl = $request->input('imageUrl');

        // Save image URL to database
        image::create([
            'id_costume' => $costumeId,
            'imageUrl' => $imageUrl,
        ]);

        // Return success response
        return response()->json(['success' => true]);
    }

    public function deleteImage($id_image) 
    {
        $image = image::find($id_image);

        // Delete the image record from the database
        $image->delete();

        // Return a success response
        return response()->json(['success' => true]);
    }

    public function addCategory(Request $request)
    {
        $costumeId = $request->input('id_costume');
        $categories = $request->input('categories');
    
        if (!is_array($categories)) {
            return response()->json(['error' => 'Invalid categories format'], 400);
        }
    
        foreach ($categories as $categoryId) {
            costume_category::create([
                'id_costume' => $costumeId,
                'id_category' => (int) $categoryId, // Ensure category ID is an integer
            ]);
        }
    
        return response()->json(['success' => true]);
    }

    public function deleteCategory($ccId)
    {
        $costume_category = costume_category::where('id_costume_category', $ccId)->first();

        if (!$costume_category) {
            return response()->json(['error' => 'costume category not found'], 404);
        }

        try {
            costume_category::where('id_costume_category', $ccId)->delete();
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
