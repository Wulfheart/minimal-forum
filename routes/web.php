<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\OverviewController;
use App\Livewire\One;
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
Route::get('/discussion', DiscussionController::class)->name('discussion');
//Route::get('/channel', ChannelController::class)->name('channel');

Route::get('/one', One::class)->name('one');
Route::get('/two', \App\Livewire\Two::class)->name('two');
