<?php

use App\Models\Ocid;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/ecosystem', function () {
    return view('ocids');
})->name('ecosystem');

Route::get('/ecosystem/{ocid}', function (Ocid $ocid) {
    return view('show-ocid', ['ocid' => $ocid]);
})->name('ocid.show');

Route::get('/create-ocid', function () {
    return view('create-ocid');
})->name('create-ocid');
