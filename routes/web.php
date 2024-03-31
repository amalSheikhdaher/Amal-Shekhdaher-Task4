<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('users.create', [HomeController::class, 'create'])->name('users.create');
Route::post('users.store', [HomeController::class, 'store'])->name('users.store');
Route::get('users.edit/{user}', [HomeController::class, 'edit'])->name('users.edit');
Route::put('users.update/{user}', [HomeController::class, 'update'])->name('users.update');
Route::delete('users.delete/{user}', [HomeController::class, 'delete'])->name('users.delete');
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin-home', [HomeController::class, 'adminHome'])->name('admin.home');
    
});


