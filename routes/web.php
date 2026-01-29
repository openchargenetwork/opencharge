<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::livewire('ecosystem', 'pages::ecosystem.index')->name('ecosystem.index');
Route::livewire('ecosystem/{ocid}', 'pages::ecosystem.show')->name('ecosystem.show');

require __DIR__.'/settings.php';
