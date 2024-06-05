<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Client;

class image_controller extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function uploadToImgur(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:10240', // max 10MB
        ]);

        $image = $request->file('image');
        $imagePath = $image->getPathname();
        $client = new Client();

        try {
            $response = $client->request('POST', 'https://api.imgur.com/3/image', [
                'headers' => [
                    'Authorization' => 'Client-ID ' . env('IMGUR_CLIENT_ID'),
                ],
                'form_params' => [
                    'image' => base64_encode(file_get_contents($imagePath)),
                ],
            ]);

            $responseData = json_decode($response->getBody()->getContents());

            // Save the Imgur URL to the database
            $imageModel = new Image();
            $imageModel->imgur_url = $responseData->data->link;
            $imageModel->save();

            return back()->with('success', 'Image uploaded and saved successfully')->with('imgur_url', $responseData->data->link);
        } catch (\Exception $e) {
            return back()->withErrors('Failed to upload image: ' . $e->getMessage());
        }
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'costume_id' => 'required|exists:costumes,id',
        ]);

        $path = $request->file('image')->store('images', 'public');

        $image = image::create([
            'costume_id' => $request->costume_id,
            'path' => $path,
        ]);

        return response()->json($image, 201);
    }
}
