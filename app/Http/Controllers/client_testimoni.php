<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\color;
use App\Models\testimoni;
use App\Models\theme;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class client_testimoni extends Controller
{
    public function getClientTestimoni()
    {
        try {
            // Retrieve testimonies data
            $testimonies = testimoni::select('testimoni.*')->get();

            // Retrieve categories data
            $categories = category::select('category.*')->get();

            $themes = theme::select('theme.*')->get();

            $colors = color::select('color.*')->get();

            return view('client_util.testimoni_client', [
                'testimonies' => $testimonies,
                'categories' => $categories,
                'themes' => $themes,
                'colors' => $colors,
            ]);


        } catch (\Exception $e) {
            // Log the exception message
            Log::error('Error retrieving data: ' . $e->getMessage());

            return view('client_util.testimoni_client', [
                'testimonies' => [],
                'categories' => [],
                'themes' => [],
                'colors' => [],
            ]);
        }
    }

    public function filterTestimony(Request $request)
    {
        Log::info('Received filter');

        $theme = $request->input('theme');
        $category = $request->input('category');
        $search = $request->input('search');

        Log::info('Received search query:', ['search' => $search, 'category' => $category, 'theme' => $theme]);

        $query = Testimoni::select('testimoni.*',
            DB::raw('GROUP_CONCAT(DISTINCT category.category SEPARATOR ", ") AS categories'),
            DB::raw('GROUP_CONCAT(DISTINCT theme.theme SEPARATOR ", ") AS themes'))
            ->leftJoin('testimoni_kategori', 'testimoni.id_testimoni', '=', 'testimoni_kategori.id_testimoni')
            ->leftJoin('category', 'testimoni_kategori.id_kategori', '=', 'category.id_category')
            ->leftJoin('testimoni_tema', 'testimoni.id_testimoni', '=', 'testimoni_tema.id_testimoni')
            ->leftJoin('theme', 'testimoni_tema.id_theme', '=', 'theme.id_theme');

        if ($category) {
            $query->where('category.id_category', '=', $category);
        }

        if ($theme) {
            $query->where('theme.id_theme', '=', $theme);
        }

        if ($search) {
            $query->where(function($query) use ($search) {
                $query->where('testimoni.name', 'like', '%' . $search . '%')
                    ->orWhere('testimoni.description', 'like', '%' . $search . '%');
            });
        }

        $data = $query->groupBy('testimoni.id_testimoni', 'testimoni.name', 'testimoni.description', 'testimoni.imageUrl')
            ->orderBy('testimoni.id_testimoni', 'asc')
            ->get(); // Execute the query and get the results

        $noResults = $data->isEmpty(); // Check if the data is empty

        if ($request->ajax()) {
            return response()->json([
                'testimonies' => view('partials.testimoni_list', ['testimonies' => $data, 'noResults' => $noResults])->render(),
            ]);
        }

        return view('client_util.testimoni_client', ['testimonies' => $data, 'noResults' => $noResults]);
    }

}
