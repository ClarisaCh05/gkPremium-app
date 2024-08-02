<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\color;
use App\Models\image;
use App\Models\theme;
use GuzzleHttp\Client;
use App\Models\costume;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\costume_category;
use App\Models\costume_color;
use App\Models\costume_theme;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
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
            $today = Carbon::today();

            // Fetch costumes and join rented data
            $data = costume::select('costume.*', DB::raw('GROUP_CONCAT(DISTINCT image.imageUrl SEPARATOR ",") AS images'), DB::raw('GROUP_CONCAT(DISTINCT category.category SEPARATOR ", ") AS categories'), 'rented.ended_at as rented_ended_at')
                ->join('costume_category', 'costume.id_costume', '=', 'costume_category.id_costume')
                ->join('category', 'costume_category.id_category', '=', 'category.id_category')
                ->join('image', 'image.id_costume', '=', 'costume.id_costume')
                ->leftJoin('rented', function ($join) use ($today) {
                    $join->on('costume.id_costume', '=', 'rented.id_costume')
                        ->where('rented.ended_at', '<', $today);
                })
                ->groupBy('costume.id_costume', 'costume.name', 'costume.size', 'costume.price', 'costume.description', 'costume.views', 'costume.interest', 'costume.status', 'rented_ended_at')
                ->orderBy('costume.id_costume', 'asc')
                ->get();

            // Check ended date and update status
            foreach ($data as $costume) {
                if ($costume->rented_ended_at && $costume->rented_ended_at < $today && $costume->status == 2) {
                    $costume->status = 0; // Revert status to Ready
                    $costume->save();
                }
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    $statuses = [
                        0 => 'Ready',
                        1 => 'Belum Ready',
                        2 => 'Dipinjam',
                        3 => 'Perbaikan / Cuci',
                        4 => 'Tidak ada'
                    ];

                    $statusBtn = '';
                    foreach ($statuses as $value => $label) {
                        $checked = $row->status == $value ? 'checked' : '';
                        $statusBtn .= '
                            <div class="form-check-inline">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status'.$row->id_costume.'" value="'.$value.'" id="status'.$value.'_'.$row->id_costume.'" '.$checked.'>
                                    <label class="form-check-label" for="status'.$value.'_'.$row->id_costume.'">
                                        '.$label.'
                                    </label>
                                </div>
                            </div>
                        ';
                    }
                    return '<div data-status="'.$row->status.'">' . $statusBtn . '</div>';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                        <div class="d-flex">
                            <a href="/kostum/edit_kostum/'.$row->id_costume.'" class="edit btn btn-success btn-sm btn-icon rounded-circle mr-1 mb-1" style="margin-bottom: 0.25rem;">
                                <i class="fas fa-edit"></i>
                            </a> 
                        </div>';
                    return $actionBtn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return view('admin_util.kostum');
    }

    public function getAddCostume() {
        $themes = theme::select('theme.*')->get();

        $colors = color::select('color.*')->get();

        return view('admin_util/add_kostum', [
            'themes' => $themes,
            'colors' => $colors,
        ]);
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

        $costume_color = costume_color::select('costume_color.*')
            ->where('costume_color.id_costume', $id_costume)
            ->get();

        $costume_theme = costume_theme::select('costume_theme.*')
            ->where('costume_theme.id_costume', $id_costume)
            ->get();

        $categories = category::select('category.*')
            ->get();

        $colors = color::select('color.*')
            ->get();
        
        $themes = theme::select('theme.*')
            ->get();

        return view('admin_util/edit_kostum', compact('costume', 'images', 
            'costume_category', 'categories', 'costume_color', 'costume_theme',
            'colors', 'themes'));
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

    public function updateStatus(Request $request, $id_costume)
    {
        $validated = $request->validate([
            'status' => 'required|integer',
        ]);

        $costume = costume::where('id_costume', $id_costume)->first();
        if ($costume) {
            $costume->update([
                'status' => $validated['status'],
            ]);
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Costume not found']);
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

    public function addColor(Request $request)
    {
        $costumeId = $request->input('id_costume');
        $color = $request->input('color');

        if (!is_array($color)) {
            return response()->json(['error' => 'Invalid categories format'], 400);
        }

        foreach ($color as $colorId) {
            costume_color::create([
                'id_costume' => $costumeId,
                'id_color' => (int) $colorId, // Ensure category ID is an integer
            ]);
        }
    
        return response()->json(['success' => true]);
    }

    public function addTheme(Request $request)
    {
        $costumeId = $request->input('id_costume');
        $theme = $request->input('theme');

        if (!is_array($theme)) {
            return response()->json(['error' => 'Invalid themes format'], 400);
        }

        foreach ($theme as $themeId) {
            costume_theme::create([
                'id_costume' => $costumeId,
                'id_theme' => (int) $themeId, // Ensure category ID is an integer
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

    public function deleteColor($ccId)
    {
        $costume_color= costume_color::where('id_costume_color', $ccId)->first();

        if (!$costume_color) {
            return response()->json(['error' => 'costume color not found'], 404);
        }

        try {
            costume_color::where('id_costume_color', $ccId)->delete();
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }    

    public function deleteTheme($ccId)
    {
        $costume_theme= costume_theme::where('id_costume_theme', $ccId)->first();

        if (!$costume_theme) {
            return response()->json(['error' => 'costume theme not found'], 404);
        }

        try {
            costume_theme::where('id_costume_theme', $ccId)->delete();
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
