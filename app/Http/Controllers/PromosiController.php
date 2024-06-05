<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Promosi;
use App\Models\Promosi_Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PromosiController extends Controller
{
    public function index() {
        return view('admin_util/add_promosi');
    }

    public function getPromo() {
        $data = Promosi::select('promosi.*', 'promosi_image.*')
            ->join('promosi_image', 'promosi.id_promo', '=', 'promosi_image.id_promo')
            ->orderBy('promosi.title', 'asc')
            ->paginate(10);

        return view('admin_util/promosi', ['promosi' => $data]);
    }

    public function addPromo(Request $request) {
        $validated = $request->validate([
            'title' => 'required'
        ]);

        $promo = Promosi::create([
            'title' => $validated['title']
        ]);

        Log::info('Promo Object:', ['promo' => $promo]); // Log the entire promo object
        return response()->json(['id_promo' => $promo->id_promo]);
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

    public function saveImage(Request $request) 
    {
        Log::info('Saving image with data:', $request->all());

        $promoId = $request->input('id_promo');
        $imageUrl = $request->input('image');

        Log::info('Saving image', ['id_promo' => $promoId, 'imageUrl' => $imageUrl]);

        Promosi_Image::create([
            'id_promo' => $promoId,
            'image' => $imageUrl,
        ]);

        return response()->json(['success' => true]);
    }

    public function deleteImage($id_promo_img)
    {
        $id_image = Promosi_Image::find($id_promo_img);

        $id_image->delete();

        return response()->json(['success' => true]);
    }

    public function deletePromosi($id_promo)
    {
        $promo = Promosi::find($id_promo);

        if(!$promo) {
            abort(404);
        }

        Promosi_Image::where('id_promo', $id_promo)->delete();
        
        $promo->delete();

        return response()->json(['success' => true]);

    }

    public function editPromo($id_promo)
    {
        $promos = Promosi::select('promosi.*')
            ->where('promosi.id_promo', $id_promo)
            ->get();
        
        $promo_img = Promosi_Image::select('promosi_image.*')
            ->where('promosi_image.id_promo', $id_promo)
            ->get();
        
        return view('admin_util/edit_promo', compact('promos', 'promo_img'));
    }

    public function updatePromo(Request $request, $id_promo)
    {
        $promo = Promosi::where('id_promo', $id_promo)->first();
        $promo->update([
            'title' => $request->title
        ]);

        return response()->json(['message' => 'Promo updated successfully']);
    }

    public function searchPromo(Request $request)
    {
        $search = $request->input('search');

        $data = Promosi::select('promosi.*', 'promosi_image.*')
            ->where('promosi.title', 'like', '%' . $search . '%')
            ->join('promosi_image', 'promosi.id_promo', '=', 'promosi_image.id_promo')
            ->orderBy('promosi.title', 'asc')
            ->paginate(10);

        return view('admin_util.promosi', ['promosi' => $data]);
    }

}


