<?php

namespace App\Http\Controllers;

use App\Models\costume;
use Illuminate\Http\Request;

class costumeDetailController extends Controller
{
    public function getCostumeDetails($id_costume)
    {
        $costume = costume::with('images')
            ->where('costume.id_costume', $id_costume)
            ->join('costume_category', 'costume.id_costume', '=', 'costume_category.id_costume')
            ->join('category', 'costume_category.id_category', '=', 'category.id_category')
            ->firstOrFail();

        return view('client_util.costume_detail', ['costumes' => $costume]);
    }

    public function updateInterest(Request $request, $id_costume)
    {
        $validated = $request->validate([
            'interest' => 'required|numeric'
        ]);
        
        $costume = costume::where('id_costume', $id_costume)->first();
        $costume->update([
            'interest' => $validated['interest']
        ]);

        return response()->json(['message' => 'Costume updated successfully']);
    }
}
