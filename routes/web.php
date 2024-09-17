<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

/**
 * front Routes
 */

Route::prefix('/')->name('front.')->group(function () {
    //==============================================Index Page
    Route::view('', 'front.index')->name('index');

    //==============================================about Page
    Route::view('about', 'front.about')->name('about');

    //==============================================contact Page
    Route::view('contact', 'front.contact')->name('contact');

    //==============================================projects Page
    Route::view('projects', 'front.projects')->name('projects');

    //==============================================Services Page
    Route::view('services', 'front.services')->name('services');

    //==============================================Team Page
    Route::view('team', 'front.team')->name('team');

    //==============================================Testmonials Page
    Route::view('testmonials', 'front.testmonials')->name('testmonials');
});
/**
 * Admin Routes
 */

Route::prefix('/admin/')->name('admin.')->group(function () {

    Route::middleware('admin')->group(function () {

        //==============================================Index Page
        Route::view('', 'admin.index')->name('index');

        //==============================================Settings Page
        Route::view('settings', 'admin.settings.index')->name('settings');

        //==============================================Skills Page
        Route::view('skills', 'admin.skills.index')->name('skills');

        //==============================================Subscribers Page
        Route::view('subscribers', 'admin.subscribers.index')->name('subscribers');

        //==============================================Counters Page
        Route::view('counters', 'admin.counters.index')->name('counters');

        //==============================================Services Page
        Route::view('services', 'admin.services.index')->name('services');

        //==============================================Messages Page
        Route::view('messages', 'admin.messages.index')->name('messages');

        //==============================================Categories Page
        Route::view('categories', 'admin.categories.index')->name('categories');

        //==============================================Projects Page
        Route::view('projects', 'admin.projects.index')->name('projects');
    });

    //==============================================Index Page
    Route::view('/login', 'admin.auth.login')->middleware('guest:admin')->name('login');
});
