<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\JadwalAbsenController;
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
// * Jadwal Presensi
Route::controller(JadwalAbsenController::class)->group(function() {
    Route::get('/jadwalAbsen','index')->name('jadwalAbsen.index');
    Route::get('/jadwalAbsen/create','create')->name('jadwalAbsen.create');
    Route::post('/jadwalAbsen/store','store')->name('jadwalAbsen.edit');
    Route::get('/jadwalAbsen/show', 'show')->name('jadwalAbsen.show');
    Route::get('/jadwalAbsen/edit', 'edit')->name('jadwalAbsen.edit');
    Route::post('/jadwalAbsen/update/{id}', 'update')->name('jadwalAbsen.update');
    Route::post('/jadwalAbsen/delete/{id}', 'update')->name('jadwalAbsen.delete');
});
// * Absen
Route::controller(AbsenController::class)->group(function() {
    Route::get('/absen','index')->name('absen.index');
    Route::get('/absen/create','create')->name('absen.create');
    Route::post('/absen/store','store')->name('absen.edit');
    Route::get('/absen/show', 'show')->name('absen.show');
    Route::get('/absen/edit', 'edit')->name('absen.edit');
    Route::post('/absen/update/{id}', 'update')->name('absen.update');
    Route::post('/absen/delete/{id}', 'update')->name('absen.delete');
});
