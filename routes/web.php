<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::livewire('directory', 'pages::directory.index')->name('directory.index');
Route::livewire('directory/{ocid}', 'pages::directory.show')->name('directory.show');

require __DIR__.'/settings.php';
