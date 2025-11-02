<?php

use App\Livewire\Counter;
use App\Livewire\Users;
use App\Livewire\Home;
use App\Livewire\About;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);

Route::get('/counter', Counter::class);

// ! Versi blade
// Route::get('/users', function () {
//     return view('users');
// });

// ! Versi full page component livewire
Route::get('/users', Users::class);

Route::get('/about', About::class);
