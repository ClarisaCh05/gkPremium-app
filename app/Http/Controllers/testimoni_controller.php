<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use App\Models\testimoni;
use App\Models\category;
use App\Models\theme;
use App\Models\testimoni_kategori;
use App\Models\testimoni_tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class testimoni_controller extends Controller
{
    public function index()
    {
        return view('admin_util/add_testimoni');
    }
    
    public function getTestimoni(Request $request) 
    {
        if($request->ajax()) {
            $data = testimoni::select('testimoni.*')
            ->get();

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = '
                    <div class="d-flex">
                        <a href="/testimoni/editTestimoni/'.$row->id_testimoni.'" class="edit btn btn-success btn-sm btn-icon rounded-circle mr-1 mb-1" style="margin-bottom: 0.25rem;">
                            <i class="fas fa-edit"></i>
                        </a> 
                        <a href="javascript:void(0)" data-id="'.$row->id_testimoni.'" class="delete btn btn-danger btn-sm btn-icon rounded-circle mr-1 mb-1">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                ';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin_util/testimoni');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            try {
                $client = new Client();
                $response = $client->request('POST', 'https://api.imgbb.com/1/upload', [
                    'form_params' => [
                        'image' => base64_encode(file_get_contents($request->file('file')->getRealPath())),
                        'key' => '55488f24a499c325646c862eb83f31d5',
                    ],
                ]);

                $responseData = json_decode($response->getBody(), true);
                Log::info('imgbb response data:', ['responseData' => $responseData]);

                if (isset($responseData['data']['display_url'])) {
                    return response()->json(['image_url' => $responseData['data']['display_url']]);
                } else {
                    return response()->json(['error' => 'Image upload failed'], 500);
                }
            } catch (\Exception $e) {
                Log::error('Error in uploadImage: ' . $e->getMessage());
                return response()->json(['error' => 'Internal server error'], 500);
            }
        } else {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
    }

    public function addTestimoni(Request $request)
    {
        $validated = $request->validate([
            'imageUrl' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $testimoni = testimoni::create([
            'imageUrl' => $validated['imageUrl'],
            'name' => $validated['name'],
            'description' => $validated['description']
        ]);

        Log::info('Testimoni Object:', ['testimonies' => $testimoni]);
        return response()->json(['id_testimoni' => $testimoni->id_testimoni]);
    }

    public function editTestimoni($id_testimoni)
    {
        $testimonies = Testimoni::select('testimoni.*')
            ->where('testimoni.id_testimoni', $id_testimoni)
            ->get();

        $categories = Category::select('category.*')
            ->get();

        $themes = Theme::select('theme.*')
            ->get();

        $testimoni_kategori = testimoni_kategori::select('testimoni_kategori.*')
            ->where('testimoni_kategori.id_testimoni', $id_testimoni)
            ->get();

        $testimoni_tema = testimoni_tema::where('id_testimoni', $id_testimoni)->get();

        Log::info('retrieved tema:', ['testimoni_tema' => $testimoni_tema]);

        return view('admin_util.edit_testimoni', compact('testimonies', 
            'categories', 'themes', 'testimoni_kategori', 'testimoni_tema'));
    }

    public function updateTestimoni(Request $request, $id_testimoni)
    {
        $testimoni = testimoni::where('id_testimoni', $id_testimoni)->first();
        $testimoni->update([
            'imageUrl' => $request->imageUrl,
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json(['message' => 'Testimoni updated successfully']);
    }

    public function deleteTestimoni($id_testimoni)
    {
        $testimoni = testimoni::find($id_testimoni);

        if(!$testimoni) {
            abort(404);
        }

        testimoni::where('id_testimoni', $id_testimoni)->delete();
        
        $testimoni->delete();

        return response()->json(['success' => true]);

    }

    public function addTestimoniCategory(Request $request)
    {
        $costumeId = $request->input('id_testimoni');
        $categories = $request->input('categories');
    

        if (!is_array($categories)) {
            return response()->json(['error' => 'Invalid categories format'], 400);
        }
    
        foreach ($categories as $categoryId) {
            testimoni_kategori::create([
                'id_testimoni' => $costumeId,
                'id_kategori' => (int) $categoryId, // Ensure category ID is an integer
            ]);
        }
    
        return response()->json(['success' => true]);
    }

    public function addTestimonyTheme(Request $request)
    {
        $testimoniId = $request->input('id_testimoni');
        $theme = $request->input('theme');

        if (!is_array($theme)) {
            return response()->json(['error' => 'Invalid themes format'], 400);
        }

        foreach ($theme as $themeId) {
            testimoni_tema::create([
                'id_testimoni' => $testimoniId,
                'id_theme' => (int) $themeId, // Ensure category ID is an integer
            ]);
        }
    
        return response()->json(['success' => true]);
    }

    public function deleteCategory($ccId)
    {
        Log::info('Attempting to delete category with ID: ' . $ccId);

        $testimoni_category = testimoni_kategori::where('id_testimoni_kategori', $ccId)->first();

        if (!$testimoni_category) {
            Log::error('Category not found with ID: ' . $ccId);
            return response()->json(['error' => 'costume category not found'], 404);
        }

        try {
            testimoni_kategori::where('id_testimoni_kategori', $ccId)->delete();
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function deleteTheme($ccId)
    {
        $testimoni_theme= testimoni_tema::where('id_testimoni_tema', $ccId)->first();

        if (!$testimoni_theme) {
            return response()->json(['error' => 'costume theme not found'], 404);
        }

        try {
            testimoni_tema::where('id_testimoni_tema', $ccId)->delete();
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
