<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\OverviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', OverviewController::class)->name('overview');
Route::get('/channel', ChannelController::class)->name('channel');
