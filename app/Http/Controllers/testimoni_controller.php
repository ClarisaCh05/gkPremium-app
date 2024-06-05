<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\testimoni;
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
            'description' => 'required'
        ]);

        $testimoni = testimoni::create([
            'imageUrl' => $validated['imageUrl'],
            'name' => $validated['name'],
            'description' => $validated['description']
        ]);

        Log::info('Testimoni Object:', ['testimonies' => $testimoni]);
        return response()->json(['success' => true]);
    }

    public function editTestimoni($id_testimoni)
    {
        $testimoni = testimoni::select('testimoni.*')
            ->where('testimoni.id_testimoni', $id_testimoni)
            ->get();
        
        return view('admin_util/edit_testimoni', ['testimonies' => $testimoni]);
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
}
