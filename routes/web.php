<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::view('/', 'welcome');

Route::get('dashboard', function(){
    // Mengambil semua pengguna yang ID-nya berbeda dari pengguna yang sedang login
    $users = User::where('id', '!=', auth()->user()->id)->get();

    // Mengembalikan view dashboard dengan data pengguna
    return view('dashboard', [
        'users' => $users
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('chat/{id}', function($id){

    return view('chat', [
        'id' => $id
    ]);
})->middleware(['auth', 'verified'])->name('chat');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
