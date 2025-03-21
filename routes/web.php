<?php

use App\Http\Controllers\PresensiController;
use App\Http\Controllers\DetailPresensiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//* Users
Route::controller(UserController::class)->group(function() {
    Route::get('/user','index')->name('user.index');
    Route::get('/user/create','create')->name('user.create');
    Route::post('/user/store','store')->name('user.edit');
    Route::get('/user/show', 'show')->name('user.show');
    Route::get('/user/edit', 'edit')->name('user.edit');
    Route::post('/user/update/{id}', 'update')->name('user.update');
    Route::post('/user/delete/{id}', 'update')->name('user.delete');
});
// * Ortu
Route::controller(OrtuController::class)->group(function() {
    Route::get('/ortu','index')->name('ortu.index');
    Route::get('/ortu/create','create')->name('ortu.create');
    Route::post('/ortu/store','store')->name('ortu.edit');
    Route::get('/ortu/show', 'show')->name('ortu.show');
    Route::get('/ortu/edit', 'edit')->name('ortu.edit');
    Route::post('/ortu/update/{id}', 'update')->name('ortu.update');
    Route::post('/ortu/delete/{id}', 'update')->name('ortu.delete');
});
// * Kelas
Route::controller(KelasController::class)->group(function() {
    Route::get('/kelas','index')->name('kelas.index');
    Route::get('/kelas/create','create')->name('kelas.create');
    Route::post('/kelas/store','store')->name('kelas.edit');
    Route::get('/kelas/show', 'show')->name('kelas.show');
    Route::get('/kelas/edit', 'edit')->name('kelas.edit');
    Route::post('/kelas/update/{id}', 'update')->name('kelas.update');
    Route::post('/kelas/delete/{id}', 'update')->name('kelas.delete');
});
// * Detail Presensi
Route::controller(DetailPresensiController::class)->group(function() {
    Route::get('/detailPresensi','index')->name('detailPresensi.index');
    Route::get('/detailPresensi/create','create')->name('detailPresensi.create');
    Route::post('/detailPresensi/store','store')->name('detailPresensi.edit');
    Route::get('/detailPresensi/show', 'show')->name('detailPresensi.show');
    Route::get('/detailPresensi/edit', 'edit')->name('detailPresensi.edit');
    Route::post('/detailPresensi/update/{id}', 'update')->name('detailPresensi.update');
    Route::post('/detailPresensi/delete/{id}', 'update')->name('detailPresensi.delete');
});
// * Presensi
Route::controller(PresensiController::class)->group(function() {
    Route::get('/presensi','index')->name('presensi.index');
    Route::get('/presensi/create','create')->name('presensi.create');
    Route::post('/presensi/store','store')->name('presensi.edit');
    Route::get('/presensi/show', 'show')->name('presensi.show');
    Route::get('/presensi/edit', 'edit')->name('presensi.edit');
    Route::post('/presensi/update/{id}', 'update')->name('presensi.update');
    Route::post('/presensi/delete/{id}', 'update')->name('presensi.delete');
});
