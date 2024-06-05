<?php

use Illuminate\Http\Request;
use App\Events\CostumeViewed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/broadcast-costume-view', function (Request $request) {
//     broadcast(new CostumeViewed($request->costumeId, $request->views));
//     return response()->json(['status' => 'Broadcasted']);
// });

Route::post('/update-costume-view', function (Request $request) {
    $costumeId = $request->input('costumeId');
    $views = $request->input('views');

    DB::table('costume')
        ->where('id_costume', $costumeId)
        ->update(['views' => $views]);

    return response()->json(['status' => 'Database updated successfully']);
});