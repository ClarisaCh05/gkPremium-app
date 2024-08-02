<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\costume;
use App\Models\theme;
use App\Models\color;
use App\Models\search_history;
use App\Models\viewed_costume;
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
            ->groupBy('costume.id_costume', 'costume.name', 'costume.size', 'costume.price', 'costume.description', 'costume.views', 'costume.status','costume.interest')
            ->orderBy('costume.id_costume', 'asc')
            ->paginate(12);

        $themes = theme::select('theme.*')->get();
        $colors = color::select('color.*')->get();

        $noResults = $data->isEmpty(); // Check if the data is empty

        return view('client_util.katalog_client', [
            'katalogs' => $data, 
            'noResults' => $noResults,
            'themes' => $themes,
            'colors' => $colors,
        ]);
    }    

    public function updateView(Request $request, $id_costume)
    {
        $request->validate([
            'id_costume' => 'required|exists:costume,id_costume',
        ]);

        $view = viewed_costume::create([
            'id_costume' => $id_costume,
        ]);

        if ($view) {
            Log::info('View added successfully:', [
                'id_costume' => $id_costume,
            ]);
        } else {
            Log::error('Failed to add view:', [
                'id_costume' => $id_costume,
            ]);
        }

        return response()->json(['message' => 'Costume updated successfully']);
    }


    public function filterCostume(Request $request)
    {
        $size = $request->input('size');
        $category = $request->input('category');
        $search = $request->input('search'); // Get the search input
        $theme = $request->input('theme');
        $color = $request->input('color');

        // $tema = theme::select('theme.*')->get();
        // Log::info("Received theme query:", ['tema' => $tema]);

        $searchHistory = search_history::create([
            'search' => $search,
            'id_category' => $category,
            'id_theme' => $theme,
            'id_color' => $color,
        ]);
        
        // Check if the search history was successfully created and log the result
        if ($searchHistory) {
            Log::info('Search history added successfully:', [
                'search' => $search,
                'id_category' => $category,
                'id_theme' => $theme,
                'id_color' => $color
            ]);
        } else {
            Log::error('Failed to add search history:', [
                'search' => $search,
                'id_category' => $category,
                'id_theme' => $theme,
                'id_color' => $color
            ]);
        }

        Log::info('Received search query:', ['search' => $search, 'category' => $category]);

        $query = Costume::select('costume.*', 
            DB::raw('(SELECT imageUrl FROM image WHERE image.id_costume = costume.id_costume LIMIT 1) as imageUrl'), 
            DB::raw('GROUP_CONCAT(DISTINCT category.category SEPARATOR ", ") AS categories'))
            ->join('costume_category', 'costume.id_costume', '=', 'costume_category.id_costume')
            ->join('category', 'costume_category.id_category', '=', 'category.id_category')
            ->join('costume_theme', 'costume.id_costume', '=', 'costume_theme.id_costume')
            ->join('theme', 'costume_theme.id_theme', '=', 'theme.id_theme')
            ->join('costume_color', 'costume.id_costume', '=', 'costume_color.id_costume') // Added this join
            ->join('color', 'costume_color.id_color', '=', 'color.id_color');

        if ($size) {
            $query->where('costume.size', '=', $size);
        }

        if ($category) {
            $query->where(function($query) use ($category) {
                $query->where('category.id_category', '=', $category)
                    ->orWhere('category.category', '=', $category);
            });
        }

        if ($theme) {
            $query->where('theme.id_theme', '=', $theme);
        }

        if($color) {
            $query->where('color.id_color', '=', $color);
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

        $noResults = $data->isEmpty(); // Check if the data is empty

        if ($request->ajax()) {
            return response()->json([
                'katalogs' => view('partials.costumeClientItems', ['katalogs' => $data, 'noResults' => $noResults])->render(),
                'pagination' => $data->links('pagination::bootstrap-5')->render()
            ]);
        }

        return view('client_util.katalog_client', ['katalogs' => $data, 'noResults' => $noResults]);
    }

}
