<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/ucapan/get', [App\Http\Controllers\RsvpController::class, 'ucapanGet'])->name('rsvp.ucapanGet');
Route::post('/ucapan/store', [App\Http\Controllers\RsvpController::class, 'ucapanStore'])->name('rsvp.ucapanStore');
