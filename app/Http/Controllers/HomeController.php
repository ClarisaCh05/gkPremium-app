<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\homePageController;

class HomeController extends Controller
{
    protected $data = [];
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only('adminDashboard');  // Apply the admin middleware to specific method
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    
    public function index(homePageController $controller)
    {
        $katalogs = $controller->getCostume();
        $promos = $controller->getPromo();
        $brideStation = $controller->getBrideStation();
        $topCostume = $controller->getTopViewed(); 
        $topCategories = $controller->getTopCategories();

        return view('homePage', [
            'katalogs' => $katalogs,
            'promos' => $promos,
            'brideStation' => $brideStation,
            'topCostume' => $topCostume,
            'topCategories' => $topCategories,
        ]);
    }

    public function adminDashboard()
    {
        // Admin-specific logic
        return view('admin_util.sewa');
    }
}
