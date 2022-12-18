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
Route::get('/admin/add/borrowings', [AdminController::class, 'getAddBorrowing']);
Route::post('/admin/add/borrowings', [AdminController::class, 'postAddBorrowing']);

Route::get('/admin/add/books', [AdminController::class, 'getAddBooks']);
Route::post('/admin/add/books', [AdminController::class, 'postAddBooks']);

Route::get('/admin/edit/books/{id}', [AdminController::class, 'getEditBookDetailView']);
Route::post('/admin/edit/books', [AdminController::class, 'postBookEditView']);
Route::post('/admin/edit/books/delete', [AdminController::class, 'postBookDelete']);

Route::get('/logout', [AuthenticateController::class, 'userLogout']);
Route::get('/admin/logout', [AuthenticateController::class, 'adminLogout']);

Route::get('/admin/books', [AdminController::class, 'getBookView']);
