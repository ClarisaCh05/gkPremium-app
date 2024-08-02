<?php

namespace App\Http\Controllers;

use App\Models\costume;
use App\Models\Promosi;
use Illuminate\Http\Request;
use App\Models\Promosi_Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class homePageController extends Controller
{
    public function getCostume()
    {
        $katalogs = costume::select('costume.*', 'image.imageUrl', DB::raw('GROUP_CONCAT(category.category SEPARATOR ", ") AS categories'))
            ->join('costume_category', 'costume.id_costume', '=', 'costume_category.id_costume')
            ->join('category', 'costume_category.id_category', '=', 'category.id_category')
            ->join('image', 'image.id_costume', '=', 'costume.id_costume')
            ->groupBy('costume.id_costume', 'costume.name', 'costume.size', 'costume.price', 'costume.description', 'costume.views', 'costume.interest', 'costume.status','image.imageUrl')                
            ->orderBy('costume.id_costume', 'asc')
            ->paginate(16);
        
        return $katalogs;
    }

    public function getPromo()
    {
        $promos = Promosi_Image::select('promosi_image.*')
            ->get();
        
        Log::info($promos);
        return $promos;
    }

    public function getBrideStation()
    {
        $brideStation = costume::select('costume.*', 'image.imageUrl', DB::raw('GROUP_CONCAT(category.category SEPARATOR ", ") AS categories'))
            ->join('costume_category', 'costume.id_costume', '=', 'costume_category.id_costume')
            ->join('category', 'costume_category.id_category', '=', 'category.id_category')
            ->join('image', 'image.id_costume', '=', 'costume.id_costume')
            ->where('costume_category.id_category', '=', 7)
            ->groupBy('costume.id_costume', 'costume.name', 'costume.size', 'costume.price', 'costume.description', 'costume.views', 'costume.interest', 'costume.status','image.imageUrl')                
            ->orderBy('costume.id_costume', 'asc')
            ->paginate(3);

        Log::info($brideStation);
        return $brideStation;
    }    

    public function getTopViewed()
    {
        $topCostume = costume::select('costume.*', 'image.imageUrl')
            ->join('image', 'image.id_costume', '=', 'costume.id_costume')
            ->orderBy('views', 'desc') // Order by views in descending order to get the most viewed first
            ->take(16)
            ->get(); // Execute the query and get the results

        Log::info($topCostume);
        return $topCostume;
    }

    public function getTopCategories()
    {
        // Get the top 10 viewed costumes
        $topCostumes = Costume::orderBy('views', 'desc')
                            ->take(10)
                            ->pluck('id_costume')
                            ->toArray();

        // Get the categories for the top 10 viewed costumes
        $topCategories = DB::table('costume_category')
            ->join('costume', 'costume_category.id_costume', '=', 'costume.id_costume')
            ->join('category', 'costume_category.id_category', '=', 'category.id_category')
            ->whereIn('costume_category.id_costume', $topCostumes)
            ->select('category.id_category', 'category.category', DB::raw('count(*) as category_count'))
            ->groupBy('category.id_category', 'category.category')
            ->orderBy('category_count', 'desc')
            ->take(4)
            ->get();

        // If no top categories found, return a 404 response
        if ($topCategories->isEmpty()) {
            return response()->json(['message' => 'No top categories found.'], 404);
        }

        // Prepare an array to hold categories with their images
        foreach ($topCategories as $topCategory) {
            // Get an image for the current top category by joining with the image table through id_costume
            $categoryImage = DB::table('image')
                ->join('costume_category', 'image.id_costume', '=', 'costume_category.id_costume')
                ->where('costume_category.id_category', $topCategory->id_category)
                ->select('image.imageUrl')
                ->first();

            // Add the image URL to the current category information
            $topCategory->imageUrl = $categoryImage ? $categoryImage->imageUrl : null;
        }

        // Pass the data to the view
        return $topCategories;
    }

    public function searchCostume(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');
    
        Log::info('Received search query:', ['search' => $search, 'category' => $category]);
    
        $query = Costume::select('costume.*',  
            DB::raw('GROUP_CONCAT(category.category SEPARATOR ", ") AS categories'),
            DB::raw('(SELECT imageUrl FROM image WHERE image.id_costume = costume.id_costume LIMIT 1) as imageUrl'))
            ->join('costume_category', 'costume.id_costume', '=', 'costume_category.id_costume')
            ->join('category', 'costume_category.id_category', '=', 'category.id_category');
    
        if ($search) {
            $query->where(function($query) use ($search) {
                $query->where('costume.name', 'like', '%' . $search . '%')
                    ->orWhere('costume.description', 'like', '%' . $search . '%');
            });
        }
    
        if ($category) {
            $query->where(function($query) use ($category) {
                $query->where('category.id_category', '=', $category)
                    ->orWhere('category.category', '=', $category);
            });
        }
    
        $datas = $query->groupBy('costume.id_costume', 'costume.name', 'costume.size', 'costume.price', 'costume.description', 'costume.views', 'costume.interest')
            ->orderBy('costume.id_costume', 'asc')
            ->paginate(16)
            ->appends(['search' => $search, 'category' => $category]);
    
        Log::info('Search results:', ['results' => $datas->toArray()]);
        
        $noResults = $datas->isEmpty(); // Check if the data is empty
    
        return view('client_util.katalog_client', ['katalogs' => $datas, 'search' => $search, 'category' => $category, 'noResults' => $noResults]);
    }       
}
