<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\VideoController;
use App\Models\Video;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    if (Auth::check()) {
        // User is logged in, render the dashboard
        $videos = Video::latest()->take(15)->get();
        return Inertia::render('Dashboard', ['videos' => $videos]);
    } else {
        // User is not logged in, render the login component or redirect to login route
        return redirect()->route('login');
    }
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        $videos = Video::latest()->take(15)->get();
        return Inertia::render('Dashboard', ['videos' => $videos]);
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/tags', 'TagController@index')->name('tags.index');
    Route::post('/tags', 'TagController@store')->name('tags.store');
    Route::put('/tags/{tag}', 'TagController@update')->name('tags.update');
    Route::delete('/tags/{tag}', 'TagController@destroy')->name('tags.destroy');

    Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
    Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');
});

require __DIR__.'/auth.php';
