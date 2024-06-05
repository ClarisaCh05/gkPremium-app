<?php

namespace App\Http\Controllers;

use App\Models\rented;
use App\Models\costume;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin_util.sewa');
    }

    public function showRented()
    {
        $today = Carbon::today(); // Get today's date

        $data = rented::select('rented.*', 'costume.name')
            ->join('costume', 'rented.id_costume', '=', 'costume.id_costume')
            ->whereDate('rented.created_at', $today) // Filter by today's date
            ->orderBy('costume.name', 'asc')
            ->get();

        return view('admin_util.sewa', compact('data')); // Pass the $data variable to the view
    }

}
