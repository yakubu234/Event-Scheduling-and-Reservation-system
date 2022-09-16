<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;
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

Route::post('register', [AuthController::class, 'register']);
Route::post('signin', [AuthController::class, 'signin']);
Route::get('all-events', [EventController::class, 'all']);

Route::post('reservation', [ReservationController::class, 'makeReservation']);

Route::post('preview-reservation', [ReservationController::class, 'previewReservation']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/sign-out', [AuthController::class, 'logout']);

    Route::group(['prefix' => 'event'], function () {
        Route::get('', [EventController::class, 'all']);
        Route::get('my-events', [EventController::class, 'myEvent']);
        Route::post('create', [EventController::class, 'create']);


        Route::post('update', [EventController::class, 'update']);
        Route::post('delete', [EventController::class, 'delete']);
        Route::post('create-ticket', [EventController::class, 'createTicket']);
    });
});
