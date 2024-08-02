<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Promosi;
use App\Models\Promosi_Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class PromosiController extends Controller
{
    public function index() {
        return view('admin_util/add_promosi');
    }

    public function getPromo() {
        Promosi::where('ended_at', '<', Carbon::now())
            ->where('is_expired', 0)
            ->update(['is_expired' => 1]);

        // Fetch data with pagination
        $activePromotions = Promosi::select('promosi.*', 'promosi_image.*')
            ->join('promosi_image', 'promosi.id_promo', '=', 'promosi_image.id_promo')
            ->where('is_expired', 0)
            ->orderBy('promosi.title', 'asc')
            ->paginate(10, ['*'], 'activePage'); // Paginate active promotions

        return view('admin_util.promosi', [
            'promosi' => $activePromotions
        ]);
    }

    public function getPastPromo() {
        $expiredPromotions = Promosi::select('promosi.*', 'promosi_image.*')
            ->join('promosi_image', 'promosi.id_promo', '=', 'promosi_image.id_promo')
            ->where('is_expired', 1)
            ->orderBy('promosi.title', 'asc')
            ->paginate(10, ['*'], 'expiredPage'); // Paginate expired promotions

        return view('admin_util.promosi_history', [
            'promosi' => $expiredPromotions
        ]);
    }

    public function addPromo(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'created_at' => 'required',
            'ended_at' => 'required'
        ]);

        $promo = Promosi::create([
            'title' => $validated['title'],
            'created_at' => $validated['created_at'],
            'ended_at' => $validated['ended_at']
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

    public function updatePromoImage(Request $request, $id_promo)
    {
        
        $imageUrl = $request->input('imageUrl');

        $image = Promosi_Image::where('id_promo', $id_promo)->first();
        $image->update([
            'image' => $imageUrl
        ]);

        return response()->json(['message' => 'Promo updated successfully']);
    }

    public function searchPromo(Request $request)
    {
        $search = $request->input('search');
        $dateRange = $request->input('daterange');

        $query = promosi::select('promosi.*', 'promosi_image.*')
            ->join('promosi_image', 'promosi.id_promo', '=', 'promosi_image.id_promo')
            ->orderBy('promosi.title', 'asc');

        if ($search) {
            $query->where('promosi.title', 'like', '%' . $search . '%');
        }

        if ($dateRange) {
            $dates = explode(' - ', $dateRange);
            $startDate = \Carbon\Carbon::createFromFormat('d/m/Y', $dates[0])->startOfDay();
            $endDate = \Carbon\Carbon::createFromFormat('d/m/Y', $dates[1])->endOfDay();

            $query->whereBetween('promosi.created_at', [$startDate, $endDate])
                ->orWhereBetween('promosi.ended_at', [$startDate, $endDate]);
        }

        $data = $query->paginate(10);

        return view('admin_util.promosi', ['promosi' => $data]);
    }

    public function searchPastPromo(Request $request)
    {
        $search = $request->input('search');
        $dateRange = $request->input('daterange');

        $query = promosi::select('promosi.*', 'promosi_image.*')
            ->join('promosi_image', 'promosi.id_promo', '=', 'promosi_image.id_promo')
            ->where('is_expired', 1);

        if ($search) {
            $query->where('promosi.title', 'like', '%' . $search . '%');
        }

        if ($dateRange) {
            $dates = explode(' - ', $dateRange);
            $startDate = \Carbon\Carbon::createFromFormat('d/m/Y', $dates[0])->startOfDay();
            $endDate = \Carbon\Carbon::createFromFormat('d/m/Y', $dates[1])->endOfDay();

            $query->where(function ($q) use ($startDate, $endDate) {
                $q->whereBetween('promosi.created_at', [$startDate, $endDate])
                ->orWhereBetween('promosi.ended_at', [$startDate, $endDate]);
            });
        }

        $data = $query->orderBy('promosi.title', 'asc')->paginate(10, ['*'], 'expiredPage');

        return view('admin_util.promosi_history', ['promosi' => $data]);
    }
}


