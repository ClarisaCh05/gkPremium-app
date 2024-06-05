<?php

namespace App\Http\Controllers;

use App\Models\costume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class katalog_controller extends Controller
{
    public function tampilKatalog()
    {
        return view('admin_util/katalog');
    }

    public function getCostume()
    {
        $data = costume::select('costume.*', 'image.imageUrl', DB::raw('GROUP_CONCAT(category.category SEPARATOR ", ") AS categories'))
            ->join('costume_category', 'costume.id_costume', '=', 'costume_category.id_costume')
            ->join('category', 'costume_category.id_category', '=', 'category.id_category')
            ->join('image', 'image.id_costume', '=', 'costume.id_costume')
            ->groupBy('costume.id_costume', 'costume.name', 'costume.size', 'costume.price', 'costume.description', 'costume.views', 'costume.interest','image.imageUrl')                
            ->orderBy('costume.id_costume', 'asc')
            ->paginate(12);

        return view('admin_util/katalog', ['katalogs' => $data]);
    }

    public function searchCostume(Request $request) 
    {
        $search = $request->input('search');
        $category = $request->input('category');

        $query = costume::select('costume.*', 'image.imageUrl', DB::raw('GROUP_CONCAT(category.category SEPARATOR ", ") AS categories'))
            ->join('costume_category', 'costume.id_costume', '=', 'costume_category.id_costume')
            ->join('category', 'costume_category.id_category', '=', 'category.id_category')
            ->join('image', 'image.id_costume', '=', 'costume.id_costume')
            ->groupBy('costume.id_costume', 'costume.name', 'costume.size', 'costume.price', 'costume.description', 'costume.views', 'costume.interest', 'image.imageUrl');

        if ($search) {
            $query->where('costume.name', 'like', '%' . $search . '%');
        }

        if ($category) {
            $query->where('costume_category.id_category', '=', $category);
        }

        $data = $query->orderBy('costume.id_costume', 'asc')->paginate(12);

        if ($request->ajax()) {
            return response()->json([
                'katalogs' => view('partials.katalog_items', ['katalogs' => $data])->render(),
                'pagination' => $data->links('pagination::bootstrap-5')->render()
            ]);
        }

        return view('admin_util.katalog', ['katalogs' => $data]);
    }

    public function getCostumeDetails($id_costume)
    {
        $costume = costume::with('images')
            ->where('costume.id_costume', $id_costume)
            ->join('costume_category', 'costume.id_costume', '=', 'costume_category.id_costume')
            ->join('category', 'costume_category.id_category', '=', 'category.id_category')
            ->firstOrFail();

        return view('admin_util.kostum_detail', ['costume' => $costume]);
    }
}
