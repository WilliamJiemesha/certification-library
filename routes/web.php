<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\AdminController;

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

Route::get('/admin/login', [AuthenticateController::class, 'getAdminAuthenticate']);
Route::post('/admin/login', [AuthenticateController::class, 'postAdminAuthenticate']);


Route::get('/', [CatalogueController::class, 'getCatalogue']);
Route::get('/catalogue/{id}', [CatalogueController::class, 'getCatalogueSelected']);
Route::post('/catalogue/postBorrowBook', [CatalogueController::class, 'postBorrowBook']);

Route::get('/admin', function () {
    return redirect('/admin/log');
});
Route::get('/admin/log', [AdminController::class, 'getLog']);
Route::get('/admin/add', [AdminController::class, 'getAddBorrowing']);
Route::post('/admin/add', [AdminController::class, 'postAddBorrowing']);
