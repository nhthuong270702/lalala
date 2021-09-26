<?php
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\GradeController;
use App\Http\Controllers\API\StudentController;
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
Route::middleware('auth:api')->group(function () {
    Route::resource('students', App\Http\Controllers\API\StudentController::class);
    Route::resource('grades', App\Http\Controllers\API\GradeController::class);
});


Route::group(['namespace' => 'API'], function()
{
    // Controllers Within The "App\Http\Controllers\API" Namespace

    Route::post('register', [UserController::class,'register']);
    Route::post('login',  [UserController::class,'login']);


    Route::post('restore/{grade}', [GradeController::class,'restore']);
    Route::get('count/{grade}', [GradeController::class,'countStudentInGrade']);
    Route::get('allstudents', [GradeController::class,'allClassStudent']);
    Route::get('showgrade/{grade}', [GradeController::class,'showStudentInGrade']);

    Route::get('countstudents', [StudentController::class,'countStudent']);
});
