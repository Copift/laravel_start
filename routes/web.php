<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormControl;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [FormControl::class, 'showForm'])->name('form.show');
Route::post('/form', [FormControl::class, 'submitForm'])->name('form.submit');

Route::get('/data', [FormControl::class, 'showData'])->name('data.show');
