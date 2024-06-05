<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\client_testimoni;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PromosiController;
use App\Http\Controllers\costume_controller;
use App\Http\Controllers\homePageController;
use App\Http\Controllers\katalog_controller;
use App\Http\Controllers\testimoni_controller;
use App\Http\Controllers\costumeDetailController;
use App\Http\Controllers\katalogClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (homePageController $controller) {
    $katalogs = $controller->getCostume();
    $promos = $controller->getPromo();
    $brideStation = $controller->getBrideStation();
    $topCostume = $controller->getTopViewed(); 

    return view('caraousel', [
        'katalogs' => $katalogs,
        'promos' => $promos,
        'brideStation' => $brideStation,
        'topCostume' => $topCostume
    ]);
})->name('client.homepage');

Route::get('test', function () {return view('test');})->name('test');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('client/search', [homePageController::class, 'searchCostume'])->name('client.katalogSearch');
Route::get('client/katalog', [katalogClientController::class, 'getCostume'])->name('client.katalog');
Route::get('client/filter', [katalogClientController::class, 'filterCostume'])->name('client.filter');
// Route::post('client/updateView/{id_costume}', [katalogClientController::class, 'updateView'])->name('client.Updateview');

Route::get('client/costumeDetail/{id_costume}', [costumeDetailController::class, 'getCostumeDetails'])->name('client.costumeDetail');
Route::post('client/updateInterest/{id_costume}', [costumeDetailController::class, 'updateInterest'])->name('client.updateInterest');

Route::get('client/getClientTestimoni', [client_testimoni::class, 'getClientTestimoni'])->name('client.getClientTestimoni');

Route::get('client/ketentuan-sewa', function() {return view('client_util/ketentuan_sewa');})->name('client.ketentuanSewa');
Route::get('client/siapa-kami', function() {return view('client_util/siapa_kami');})->name('client.siapaKami');

// web.php
Route::get('/check-auth', function() {
    return response()->json([
        'authenticated' => Auth::check(),
        'userId' => Auth::id()
    ]);
});

Route::middleware('auth.check')->group(function () {
    Route::get('/conversation/{userId}', [MessageController::class, 'conversation'])->name('message.conversation');
    Route::post('/send-message', [MessageController::class, 'sendMessage'])->name('message.send-message');
});

Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/admin/dashboard', [AdminController::class, 'showRented'])->name('homeAdmin');

    Route::delete('/message/delete-chat/{friendId}', [MessageController::class, 'deleteChat'])->name('message.delete-chat');

    Route::get('/sewa', [RentController::class, 'getRent'])->name('sewa');
    Route::post('/sewa/add_rent', [RentController::class, 'addRent'])->name('sewa.addRent');
    Route::delete('/sewa/deleteRent/{id_rent}', [RentController::class, 'deleteRent'])->name('sewa.deleteRent');
    Route::get('/costumes/top-viewed', [RentController::class, 'getTopViewedCostumes'])->name('costumes.top-viewed');
    Route::get('/costumes/stats', [RentController::class, 'getRentalStats'])->name('rentals.stats');
    Route::get('/costumes/top-categories', [RentController::class, 'getTopCategories'])->name('costumes.top-categories');
    Route::get('/costume/topInterest', [RentController::class, 'getTopInterestCostumes'])->name('costumes.topInterest');

    Route::get('/testimoni', function () {return view('admin_util/testimoni');})->name('testimoni');
    Route::prefix('testimoni')->group(function () {
        Route::get('/showTestimoni', [testimoni_controller::class, 'getTestimoni'])->name('testimoni.testimoni');
        Route::get('/tambahTestimoni', [testimoni_controller::class, 'index'])->name('testimoni.tambahTestimoni');
        Route::post('/uploadImage', [testimoni_controller::class, 'uploadImage'])->name('testimoni.uploadImage');
        Route::post('/addTestimoni', [testimoni_controller::class, 'addTestimoni'])->name('testimoni.addTestimoni');
        Route::get('/editTestimoni/{id_testimoni}', [testimoni_controller::class, 'editTestimoni'])->name('testimoni.editTestimoni');
        Route::post('/updateTestimoni/{id_testimoni}', [testimoni_controller::class, 'updateTestimoni'])->name('testimoni.updateTestimoni');
    });

    Route::get('/promosi', [PromosiController::class, 'getPromo'])->name('promosi');
    Route::prefix('promosi')->group(function () {
        Route::get('/addPromosi', [PromosiController::class, 'index'])->name('promosi.tambahPromosi');
        Route::post('/tambahPromo', [PromosiController::class, 'addPromo'])->name('promosi.addPromo');
        Route::post('/uploadImage', [PromosiController::class, 'uploadImage'])->name('promosi.uploadImage');
        Route::post('/saveImage', [PromosiController::class, 'saveImage'])->name('promosi.saveImage');
        Route::get('/editPromo/{id_promo}', [PromosiController::class, 'editPromo'])->name('promosi.editPromo');
        Route::delete('/deletePromo/{id_promo}', [PromosiController::class, 'deletePromosi'])->name('promosi.deletePromo');
        Route::post('/updatePromo/{id_promo}', [PromosiController::class, 'updatePromo'])->name('promosi.updatePromo');
        Route::delete('/deletePromoImg/{id_promo_img}', [PromosiController::class, 'deleteImage'])->name('promosi.deletePromoImg');
        Route::get('/searchPromo', [PromosiController::class, 'searchPromo'])->name('promosi.searchPromo');
    });

    // Grouped routes for costume-related actions
    Route::prefix('kostum')->group(function () {
        Route::get('/tampil_kostum', [costume_controller::class, 'getCompleteCostume'])->name('kostum.getCompleteCostume');
        Route::get('/tambahKostum', [costume_controller::class, 'getAddCostume'])->name('getAddCostume');
        // Route to add a new costume (should be POST for form submission)
        Route::post('/add_kostum', [costume_controller::class, 'addCostume'])->name('kostum.addCostume');
        // Route to upload image to Imgur
        Route::post('/uploadImage', [costume_controller::class, 'uploadImage'])->name('kostum.uploadImage');
        Route::get('/edit_kostum/{id_costume}', [costume_controller::class, 'editCostume'])->name('kostum.editCostume');
        // Route to save image URL to the database
        Route::post('/saveImage', [costume_controller::class, 'saveImage'])->name('kostum.saveImage');
        Route::delete('/deleteImage/{id_image}', [costume_controller::class, 'deleteImage'])->name('kostum.imageDelete');;
        // Route to add categories to a costume
        Route::post('/addCategory', [costume_controller::class, 'addCategory'])->name('kostum.addCategory');
        Route::post('/updateCostume/{id_costume}', [costume_controller::class, 'updateCostume'])->name('kostum.updateCostume');
        Route::post('/updateCategory', [costume_controller::class, 'updateCategory'])->name('kostum.updateCategory');
        Route::delete('/deleteCategory/{id_costume_category}', [costume_controller::class, 'deleteCategory'])->name('kostum.deleteCategory');
        Route::delete('/deleteCostume/{id_costume}', [costume_controller::class, 'deleteCostume'])->name('kostum.deleteCostume');
    });

    Route::get('/katalog', [katalog_controller::class, 'getCostume'])->name('katalog');
    Route::get('/katalog/search', [katalog_controller::class, 'searchCostume'])->name('katalog.searchCostume');
    Route::get('/katalog/katalogDetail/{id_costume}', [katalog_controller::class, 'getCostumeDetails'])->name('katalog.detailCostume');
});



