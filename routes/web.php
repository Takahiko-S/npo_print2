<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/', function () {return view('contents.index');});

Route::get('/kanri_top', function () {return view('admin.kanri_top');})->middleware(['auth', 'verified'])->name('kanri_top');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //カラー
    Route::get('/color_set',[PageController::class,'colorSet'])->name('color_set');
    Route::post('/save_color',[PageController::class,'saveColor'])->name('save_color');
    Route::post('/new_color',[PageController::class,'saveColorNew'])->name('new_color');
    
    //表紙上
    Route::get('/hyosijo',[PageController::class,'hyosiJo'])->name('hyosijo');
    Route::get('/e_hyosi',[PageController::class,'e_Hyosi'])->name('e_hyosi');
    Route::get('/n_hyousijo',[PageController::class,'n_Hyosijo'])->name('e_hyosi');
    Route::post('/s_hyosi',[PageController::class,'s_Hyosi'])->name('s_hyosi');
    Route::post('/n_hyosi',[PageController::class,'n_Hyosi'])->name('n_hyosi');
    
    Route::get('/', function () {return view('contents.index');})->name('index');
    Route::get('/naka',[PageController::class,'naka'])->name('naka');
    Route::post('/naka_mitsumori',[PageController::class,'nakaMitsumori'])->name('naka_mitsumori');
});

require __DIR__.'/auth.php';
