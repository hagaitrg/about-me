<?php

use App\Http\Controllers\Admin\AboutController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('main.index');
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.admin-home');
    })->name('admin-home');

    Route::prefix('about')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('admin-about');

        Route::get('/add-about', function () {
            return view('admin.abouts.add-about');
        })->name('add-about');

        Route::post('/store-about', [AboutController::class, 'store']);

        Route::get('/edit-about/{id}', [AboutController::class, 'edit']);

        Route::patch('/update-about/{id}', [AboutController::class, 'update']);

        Route::delete('/delete-about/{id}', [AboutController::class, 'destroy']);
    });
});
