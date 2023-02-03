<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\admin;
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

Route::any('/', [Controller::class, 'index'])->name('index');

Route::any('/clear', [Controller::class, 'clear'])->name('clear');

Route::get('/add_to_session/{category_id}', [Controller::class, 'add_to_session'])->name('add_to_session');

Route::get('/remove_from_session/{category_id}', [Controller::class, 'remove_from_session'])->name('remove_from_session');

Route::group(["prefix" => '/admin'], function () {

    Route::get('/', [Controller::class, 'index'])->name('admin.dashboard')->middleware('admin_auth');
});

Route::get('/get_category', [admin::class, 'get_category'])->name('get_category');

Route::post('/admin', function (Request $req) {

    $req->validate(["
            
            'email' => 'required|email',
    
            'password' => 'required|min:8'
    "]);

    $credentials = request()->only('email', 'password');

    if (Auth::attempt($credentials)) {

        if (Auth::user()->id == 1) {

            return redirect()->route('admin.dashboard');
        }
    }

    return redirect()->route('admin.login');
})->name('admin.login');

Route::get('/logout', function () {

    Auth::logout();

    return redirect()->route('index');
})->name('admin.logout');
