<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    sleep(0.5);
    return Inertia::render('Home', [
        'users' => User::when($request->search, function($query, $search) use ($request) {
            $query->where('name', 'like', "%". $request->search ."%")
                ->orWhere('email', 'like', "%{$search}%");
        })->paginate(5)->withQueryString(),
        'searchTerm' => $request->search,
    ]);
})->name('home');

Route::get('/about', function () {
    sleep(0.5);
    return Inertia::render('About', ['user' => 'Pheak']);
})->name('about');

Route::get('/service', function () {
    sleep(0.5);
    return Inertia::render('Service');
})->name('service');

// middleware protected route
Route::middleware('auth')->group(function(){
Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


//middelware guest
Route::middleware('guest')->group(function(){
Route::inertia('/register', 'Auth/Register')->name('register');
Route::inertia('/login', 'Auth/Login')->name('login');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
});







