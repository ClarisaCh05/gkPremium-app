<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\rented;
use App\Models\costume;
use App\Models\search_history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RentController extends Controller
{
    public function getRent() {
        $today = Carbon::today(); // Get today's date

        $rentedData = rented::select('rented.*', 'costume.name')
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

    public function autocomplete(Request $request)
    {
        $search = $request->get('query');

        $costumes = costume::where('name', 'LIKE', "%{$search}%")->get();

        return response()->json($costumes);
    }
    
    public function addRent(Request $request) {
        $validated = $request->validate([
            'id_costume' => 'required',
            'description' => 'required',
            'created_at' => 'required',
            'ended_at' => 'required',
        ]);

        $rent = rented::create([
            'id_costume' => $validated['id_costume'],
            'description' => $validated['description'],
            'created_at' => $validated['created_at'],
            'ended_at' => $validated['ended_at'],
        ]);

        return response()->json(['success' => true]);
    }

    public function updateStatus(Request $request, $id_costume)
    {
        Log::info('Update Status Request:', $request->all());

        $validated = $request->validate([
            'status' => 'required|integer',
        ]);

        Log::info('Costume ID:', ['id_costume' => $id_costume]);

        $costume = costume::where('id_costume', $id_costume)->first();
        if ($costume) {
            $costume->status = $validated['status'];
            $costume->save(); // Use save method to update

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Costume not found']);
    }

    // public function deleteRent($id_rent)
    // {
    //     $rent = rented::find($id_rent);

    //     $rent->delete();

    //     // Return a success response
    //     return response()->json(['success' => true]);
    // }

    public function getTopViewedCostumes(Request $request)
    {
        $limit = $request->input('limit', -1); // Get limit from request, default to -1 (no limit)

        $query = costume::orderBy('views', 'desc');

        if ($limit > 0) {
            $query->limit($limit);
        }

        $topCostumes = $query->get(['name', 'views']);

        return response()->json($topCostumes);
    }

    public function getFrequentlyViewedCostumes(Request $request)
    {
        $interval = $request->input('interval'); // Get interval from request

        $query = DB::table('viewed_costume')
            ->join('costume', 'viewed_costume.id_costume', '=', 'costume.id_costume') // Join with costumes table
            ->select(DB::raw('costume.name as costume_name, COUNT(*) as total_views, DATE(viewed_costume.created_at) as view_date'))
            ->groupBy('costume_name', 'view_date');

        // Apply interval filter
        switch ($interval) {
            case 'daily':
                $query->whereDate('viewed_costume.created_at', '>=', Carbon::now()->subDays(1));
                break;
            case 'monthly':
                $query->whereDate('viewed_costume.created_at', '>=', Carbon::now()->subMonths(1));
                break;
            case 'quarterly':
                $query->whereDate('viewed_costume.created_at', '>=', Carbon::now()->subMonths(3));
                break;
            case 'yearly':
                $query->whereDate('viewed_costume.created_at', '>=', Carbon::now()->subYear());
                break;
            default:
                // By default, fetch all data
                break;
        }

        $data = $query->get();

        return response()->json($data);
    }

    public function getTopInterestCostumes()
    {
        $costumes = Costume::select('name', 'interest')
            ->where('interest', '>', 0) // Exclude costumes with zero interest
            ->orderBy('interest', 'desc')
            ->get();

        return response()->json($costumes);
    }

    public function getFrequentlyAskedCostumes(Request $request)
    {
        $interval = $request->input('interval'); // Get interval from request

        $query = DB::table('asked_costume')
            ->join('costume', 'asked_costume.id_costume', '=', 'costume.id_costume') // Join with costumes table
            ->select(DB::raw('costume.name as costume_name, COUNT(*) as total_asked, DATE(asked_costume.created_at) as view_date'))
            ->groupBy('costume_name', 'view_date');

        // Apply interval filter
        switch ($interval) {
            case 'daily':
                $query->whereDate('asked_costume.created_at', '>=', Carbon::now()->subDays(1));
                break;
            case 'monthly':
                $query->whereDate('asked_costume.created_at', '>=', Carbon::now()->subMonths(1));
                break;
            case 'quarterly':
                $query->whereDate('asked_costume.created_at', '>=', Carbon::now()->subMonths(3));
                break;
            case 'yearly':
                $query->whereDate('asked_costume.created_at', '>=', Carbon::now()->subYear());
                break;
            default:
                // By default, fetch all data
                break;
        }

        $data = $query->get();

        return response()->json($data);
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

    public function getSearchHistoryData(Request $request)
    {
        $interval = $request->input('interval', 'daily'); // default to daily if no interval is provided
        $type = $request->input('type', 'search'); // type of search (search, category, theme, color)

        switch ($interval) {
            case 'daily':
                $dateFormat = 'DATE(created_at)';
                break;
            case 'monthly':
                $dateFormat = 'CONCAT(YEAR(created_at), "-", MONTH(created_at))';
                break;
            case 'quarterly':
                $dateFormat = 'CONCAT(YEAR(created_at), "-", QUARTER(created_at))';
                break;
            case 'yearly':
                $dateFormat = 'YEAR(created_at)';
                break;
            default:
                $dateFormat = 'DATE(created_at)';
                break;
        }

        switch ($type) {
            case 'category':
                $data = search_history::selectRaw("$dateFormat as date, category.category as type, COUNT(*) as count")
                    ->join('category', 'search_history.id_category', '=', 'category.id_category')
                    ->whereNotNull('search_history.id_category')
                    ->groupBy('date', 'search_history.id_category')
                    ->get();
                break;
                
            case 'theme':
                $data = search_history::selectRaw("$dateFormat as date, theme.theme as type, COUNT(*) as count")
                    ->join('theme', 'search_history.id_theme', '=', 'theme.id_theme')
                    ->whereNotNull('search_history.id_theme')
                    ->groupBy('date', 'search_history.id_theme')
                    ->get();
                break;

            case 'color':
                $data = search_history::selectRaw("$dateFormat as date, color.color as type, COUNT(*) as count")
                    ->join('color', 'search_history.id_color', '=', 'color.id_color')
                    ->whereNotNull('search_history.id_color')
                    ->groupBy('date', 'search_history.id_color')
                    ->get();
                break;

            case 'search':
            default:
                $data = search_history::selectRaw("$dateFormat as date, search as type, COUNT(*) as count")
                    ->whereNotNull('search')
                    ->groupBy('date', 'search')
                    ->get();
                break;
        }

        return response()->json($data);
    } 
}
