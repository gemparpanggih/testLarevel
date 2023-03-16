<?php

use App\Http\Controllers\KelurahanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', [AuthController::class, 'indexView']);

Route::get('/user', function () {
    return view('user.welcome', [
    ]);
})->middleware('checkRole:user');

Route::get('/admin', function () {
    return view('admin.welcome', [
    ]);
})->middleware('checkRole:admin');


//Route Login dan Register

Route::get('/user/{nama}', function ($name) {
    return view('user', ['name' => $name]);
});

Route::get('/login', [AuthController::class, 'loginView'])->name("login");
Route::get('/register', [AuthController::class, 'registerView'])->name("register");


Route::POST(
    '/action-register',
    [AuthController::class, 'actionRegister']
);

Route::POST(
    '/action-login',
    [AuthController::class, 'actionLogin']
);

Route::get('/logout', [AuthController::class, 'logout']);

//Route Utama
Route::get('/kelurahan', [KelurahanController::class, 'index'])->name('kelurahan.index');
Route::get('/kelurahan/create', [KelurahanController::class, 'create'])->name('kelurahan.create')->middleware('checkRole:user');
Route::post('/kelurahan/store', [KelurahanController::class, 'store'])->name('kelurahan.store')->middleware('checkRole:user');
Route::get('/kelurahan/show/{id}', [KelurahanController::class, 'show'])->name('kelurahan.show')->middleware('checkRole:user');
Route::get('/kelurahan/{id}/edit', [KelurahanController::class, 'edit'])->name('kelurahan.edit')->middleware('checkRole:user');
Route::put('/kelurahan/{id}', [KelurahanController::class, 'update'])->name('kelurahan.update')->middleware('checkRole:user');
Route::delete('/kelurahan/{id}', [KelurahanController::class, 'destroy'])->name('kelurahan.delete')->middleware('checkRole:user');