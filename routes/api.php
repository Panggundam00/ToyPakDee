<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserCollectionController;
use App\Http\Controllers\UserDataController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/contents', [ContentController::class, 'index']) ;
Route::get('/courses', [CourseController::class, 'index']) ;
Route::get('/courses/library/{id}', [CourseController::class, 'getById']) ;
Route::get('/contents/getByCourseID/library/{id}', [ContentController::class, 'getByCourseID']) ;
Route::get('/contents/library/{id}', [ContentController::class, 'getById']) ;
Route::get('/courses/getByOwnerID/{id}', [CourseController::class, 'getByOwnerId']);
Route::get('/courses/getToStore/{id}', [CourseController::class, 'getToStore']);
Route::get('/courses/getLearnCourse/{id}', [CourseController::class, 'getLearnCourse']);
Route::get('/profile/{id}', [UserDataController::class, 'getUserById']) ;
Route::get('/img/profile/{id}', [UserCollectionController::class, 'getUserCollectionById']) ;
Route::post('/editProfile/{id}', [UserDataController::class, 'editProfile']);
Route::post('/createCourse/{id}', [CourseController::class, 'createCourse']) ;
Route::get('/editContent/{id}', [ContentController::class, 'getByCourseID']) ;
Route::get('/getCourse/editContent/{id}', [CourseController::class, 'getById']) ;
Route::get('/editSelectContent/{id}', [ContentController::class, 'getById']);
Route::post('/send/editSelectContent/{id}', [ContentController::class, 'editContent']) ;
Route::get('/store/preview/{id}', [CourseController::class, 'getById']);
Route::post('/send/editCourse/{id}', [CourseController::class, 'editCourse']);
Route::post('/login', [UserDataController::class, 'login']);
Route::post('/register', [UserDataController::class, 'register']) ;
Route::post('/contents/', [ContentController::class, 'createContent']) ;
Route::get('/find/CreateContent/{id}', [CourseController::class, 'getById']);
Route::post('/send/CreateContent/{id}', [ContentController::class, 'createContent']);
Route::get('/get/store/buy/{id}', [CourseController::class, 'getById']) ;
Route::post('/buy/{id}', [CourseController::class, 'buyCourse']) ;
Route::post('/addCollection', [UserCollectionController::class, 'addCollection']) ;
