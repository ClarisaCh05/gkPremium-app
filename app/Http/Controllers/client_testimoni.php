<?php

namespace App\Http\Controllers;

use App\Models\testimoni;
use Illuminate\Http\Request;

class client_testimoni extends Controller
{
    public function getClientTestimoni()
    {
        $data = testimoni::select('testimoni.*')->get();

        return view('client_util.testimoni_client', ['testimonies' => $data]);
    }
}