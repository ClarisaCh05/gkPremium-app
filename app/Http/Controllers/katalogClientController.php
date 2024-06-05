<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\costume;
use Illuminate\Support\Facades\Log;

class katalogClientController extends Controller
{
    public function getCostume()
    {
        $data = costume::select('costume.*', 
            DB::raw('GROUP_CONCAT(DISTINCT category.category SEPARATOR ", ") AS categories'), 
            DB::raw('(SELECT imageUrl FROM image WHERE image.id_costume = costume.id_costume LIMIT 1) as imageUrl'))
            ->join('costume_category', 'costume.id_costume', '=', 'costume_category.id_costume')
            ->join('category', 'costume_category.id_category', '=', 'category.id_category')
            ->groupBy('costume.id_costume', 'costume.name', 'costume.size', 'costume.price', 'costume.description', 'costume.views', 'costume.interest')
            ->orderBy('costume.id_costume', 'asc')
            ->paginate(12);
        
        return view('client_util/katalog_client', ['katalogs' => $data]);
    }    

    public function updateView(Request $request, $id_costume)
    {
        $validated = $request->validate([
            'views' => 'required|numeric'
        ]);
        
        $costume = costume::where('id_costume', $id_costume)->first();
        $costume->update([
            'views' => $validated['views']
        ]);

        return response()->json(['message' => 'Costume updated successfully']);
    }

    public function filterCostume(Request $request)
    {
        $size = $request->input('size');
        $category = $request->input('category');
        $search = $request->input('search'); // Get the search input

        Log::info('Received search query:', ['search' => $search, 'category' => $category]);
    
        $query = Costume::select('costume.*', 
            DB::raw('(SELECT imageUrl FROM image WHERE image.id_costume = costume.id_costume LIMIT 1) as imageUrl'), 
            DB::raw('GROUP_CONCAT(DISTINCT category.category SEPARATOR ", ") AS categories'))
            ->join('costume_category', 'costume.id_costume', '=', 'costume_category.id_costume')
            ->join('category', 'costume_category.id_category', '=', 'category.id_category');
    
        if ($size) {
            $query->where('costume.size', '=', $size);
        }
    
        if ($category) {
            $query->where(function($query) use ($category) {
                $query->where('category.id_category', '=', $category)
                    ->orWhere('category.category', '=', $category);
            });
        }

        if ($search) {
            $query->where(function($query) use ($search) {
                $query->where('costume.name', 'like', '%' . $search . '%')
                    ->orWhere('costume.description', 'like', '%' . $search . '%');
            });
        }
    
        $data = $query->groupBy('costume.id_costume', 'costume.name', 'costume.size', 'costume.price', 'costume.description', 'costume.views', 'costume.interest')
            ->orderBy('costume.id_costume', 'asc')
            ->paginate(12);
    
        if ($request->ajax()) {
            return response()->json([
                'katalogs' => view('partials.costumeClientItems', ['katalogs' => $data])->render(),
                'pagination' => $data->links('pagination::bootstrap-5')->render()
            ]);
        }
    
        return view('client_util.katalog_client', ['katalogs' => $data]);
    }    

}
