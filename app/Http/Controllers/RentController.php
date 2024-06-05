<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\rented;
use App\Models\costume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentController extends Controller
{
    public function getRent() {
        $today = Carbon::today(); // Get today's date

        $rentedData = rented::select('rented.*', 'costume.*')
            ->join('costume', 'rented.id_costume', '=', 'costume.id_costume')
            ->whereDate('rented.created_at', $today) // Filter by today's date
            ->orderBy('costume.name', 'asc')
            ->get();
        
        $costumeData = costume::all(); // Get all costumes for the dropdown

        return view('admin_util.add_sewa', [
            'rentedData' => $rentedData,
            'costumeData' => $costumeData
        ]);
    
    }
    
    public function addRent(Request $request) {
        $validated = $request->validate([
            'id_costume' => 'required',
            'description' => 'required'
        ]);

        $rent = rented::create([
            'id_costume' => $validated['id_costume'],
            'description' => $validated['description']
        ]);

        return response()->json(['success' => true]);
    }

    public function deleteRent($id_rent)
    {
        $rent = rented::find($id_rent);

        $rent->delete();

        // Return a success response
        return response()->json(['success' => true]);
    }

    public function getTopViewedCostumes()
    {
        // Assuming you have a `views` column in your `costumes` table
        $topCostumes = costume::orderBy('views', 'desc')
                            ->take(10)
                            ->get(['name', 'views']);

        return response()->json($topCostumes);
    }

    public function getTopInterestCostumes()
    {
        // Assuming you have a `views` column in your `costumes` table
        $topInterest = costume::orderBy('interest', 'desc')
                            ->take(10)
                            ->get(['name', 'interest']);

        return response()->json($topInterest);
    }

    public function getRentalStats(Request $request) {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        $query = rented::select('costume.name', DB::raw('count(*) as rent_count'))
            ->join('costume', 'rented.id_costume', '=', 'costume.id_costume')
            ->groupBy('costume.name')
            ->orderBy('rent_count', 'desc');
    
        if ($startDate && $endDate) {
            $query->whereBetween('rented.created_at', [$startDate, $endDate]);
        }
    
        $rentalStats = $query->get();
    
        return response()->json($rentalStats);
    }

    public function getTopCategories()
    {
        // Get the top 10 viewed costumes
        $topCostumes = costume::orderBy('views', 'desc')
                              ->take(10)
                              ->pluck('id_costume')
                              ->toArray();

        // Get the categories for the top 10 viewed costumes
        $topCategories = DB::table('costume_category')
            ->join('costume', 'costume_category.id_costume', '=', 'costume.id_costume')
            ->join('category', 'costume_category.id_category', '=', 'category.id_category')
            ->whereIn('costume_category.id_costume', $topCostumes)
            ->select('category.category', DB::raw('count(*) as category_count'))
            ->groupBy('category.category')
            ->orderBy('category_count', 'desc')
            ->get();

        return response()->json($topCategories);
    }
}
