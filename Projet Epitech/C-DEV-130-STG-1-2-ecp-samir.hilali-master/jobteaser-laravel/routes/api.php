<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ApiJobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Candidate;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/



Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


//Route::get('/job', 'ApiJobController@index');
//Route::get('/job/{id}', 'ApiJobController@show');
//Route::post('/job/store', 'ApiJobController@store');
//Route::post('/job/update/{id}', 'ApiJobController@update');
//Route::delete('/job/delete/{id}', 'ApiJobController@delete');



Route::get('/job', [ApiJobController::class, 'index']);
Route::get('/job/{id}', [ApiJobController::class, 'show']);
Route::post('/job/store', [ApiJobController::class, 'store']);
Route::post('/job/update/{id}', [ApiJobController::class, 'update']);
Route::delete('/job/delete/{id}', [ApiJobController::class, 'delete']);
Route::resource('candidates','CandidateController');

Route::middleware('auth:sanctum')->group(function(){
    Route::get('user', [AuthController::class, 'user']);


    Route::resource('company', 'CompanyController');
    Route::post('logout', [AuthController::class, 'logout']);

});



