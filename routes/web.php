<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
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
    Route::get('/', [DashboardController::class, 'index'])->name('admin-home');

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

    Route::prefix('skill')->group(function () {
        Route::get('/', [SkillController::class, 'index'])->name('admin-skill');

        Route::get('/add-skill', function () {
            return view('admin.skills.add-skill');
        })->name('add-skill');

        Route::post('/store-skill', [SkillController::class, 'store']);

        Route::get('/edit-skill/{id}', [SkillController::class, 'edit']);

        Route::patch('/update-skill/{id}', [SkillController::class, 'update']);

        Route::delete('/delete-skill/{id}', [SkillController::class, 'destroy']);
    });

    Route::prefix('project')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('admin-project');

        Route::get('/add-project', function () {
            return view('admin.projects.add-project');
        })->name('add-project');

        Route::post('/store-project', [ProjectController::class, 'store']);

        Route::get('/edit-project/{id}', [ProjectController::class, 'edit']);

        Route::patch('/update-project/{id}', [ProjectController::class, 'update']);

        Route::delete('/delete-project/{id}', [ProjectController::class, 'destroy']);
    });
});
