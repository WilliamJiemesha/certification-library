<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CatalogueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('catalogue');
// });

Route::get('/signup', [AuthenticateController::class, 'getRegister']);
Route::post('/signup', [AuthenticateController::class, 'postRegister']);

Route::get('/login', [AuthenticateController::class, 'getLogin']);
Route::post('/login', [AuthenticateController::class, 'postLogin']);

Route::get('/', [CatalogueController::class, 'getCatalogue']);
Route::get('/catalogue/{id}', [CatalogueController::class, 'getCatalogueSelected']);
Route::post('/catalogue/postBorrowBook', [CatalogueController::class, 'postBorrowBook']);

Route::get('/preview', function () {
    return view('adminlog');
});
