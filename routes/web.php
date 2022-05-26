<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Gate;
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
    return view('welcome');
});

Route::get('/allowed', function () {
    dump(auth()->user()->email);
    if (Gate::allows('isAdmin')) {
        dd('Admin Allowed');
    } else {
        dd('You are not Admin');
    }
});

Route::get('/allowed-2', function () {
    dump(auth()->user()->email);
    Gate::authorize('isAdmin');

    dump('hello');
});


Route::get('/denied', function () {
    dump(auth()->user()->email);
    if (Gate::denies('isAdmin')) {
        dd('You are not admin');
    } else {
        dd('Admin allowed');
    }
});


Route::get('/denied-2', function () {
    dump(auth()->user()->email);
    Gate::authorize('isAdmin');
    dump('hello');
});


Route::get('/allow/admin', function () {
    echo 'allowed admin';
})->middleware('can:isAdmin');

Route::get('/allow/user', function () {
    echo 'allowed user';
})->middleware('can:isUser');

Route::get('/allow/member', function () {
    echo 'allowed member';
})->middleware('can:isMember');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::resource('post', PostController::class)->except('index');
require __DIR__ . '/auth.php';
