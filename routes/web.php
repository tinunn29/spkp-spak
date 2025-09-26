<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.login');
});

Route::get('/admin.dashboard_admin', function () {
    return view('admin.dashboard_admin');
})->name('admin.dashboard_admin');

Route::get('/admin.manajemen_pertanyaan_survei', function () {
    return view('admin.manajemen_pertanyaan_survei');
})->name('admin.manajemen_pertanyaan_survei');

Route::get('/admin.hasil_survei', function () {
    return view('admin.hasil_survei');
})->name('admin.hasil_survei');

Route::get('/admin.export_data', function () {
    return view('admin.export_data');
})->name('admin.export_data');

Route::get('/admin.aspirasi', function () {
    return view('admin.aspirasi');
})->name('admin.aspirasi');

Route::get('/admin.detail', function () {
    return view('admin.detail');
})->name('admin.detail');

Route::get('/admin.profile', function () {
    return view('admin.profile');
})->name('admin.profile');

Route::get('/admin.notif', function () {
    return view('admin.notif');
})->name('admin.notif');

Route::get('/user.dashboard_user', function () {
    return view('user.dashboard_user');
})->name('user.dashboard_user');

Route::get('/user.survei', function () {
    return view('user.survei');
})->name('user.survei');

Route::get('/user.aspirasi', function () {
    return view('user.aspirasi');
})->name('user.aspirasi');