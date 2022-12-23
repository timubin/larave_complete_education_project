<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProjctController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class, 'HomeIndex'])->middleware('LoginCheck');
Route::get('/visitor',[VisitorController::class, 'VisitorIndex'])->middleware('LoginCheck');


//Admin Panel Service Managaement
Route::get('/service',[ServiceController::class, 'ServiceIndex'])->middleware('LoginCheck');
Route::get('/getServiceData',[ServiceController::class,'getServiceData'])->middleware('LoginCheck');
Route::post('/ServiceDelete',[ServiceController::class,'ServiceDelete'])->middleware('LoginCheck');
Route::post('/ServiceDetails',[ServiceController::class,'getServiceDetails'])->middleware('LoginCheck');
Route::post('/ServiceUpdate',[ServiceController::class,'ServiceUpdate'])->middleware('LoginCheck');
Route::post('/ServiceAdd',[ServiceController::class,'ServiceAdd'])->middleware('LoginCheck');



//Admin Panel Courses Managaement
Route::get('/courses',[CoursesController::class, 'CoursesIndex'])->middleware('LoginCheck');
Route::get('/getCoursesData',[CoursesController::class,'getCoursesData'])->middleware('LoginCheck');
Route::post('/getCoursesDetails',[CoursesController::class,'getCoursesDetails'])->middleware('LoginCheck');
Route::post('/CoursesDelete',[CoursesController::class,'CoursesDelete'])->middleware('LoginCheck');
Route::post('/CoursesUpdate',[CoursesController::class,'CoursesUpdate'])->middleware('LoginCheck');
Route::post('/CoursesAdd',[CoursesController::class,'CoursesAdd'])->middleware('LoginCheck');



//Admin Panel Project Managaement
Route::get('/project',[ProjctController::class, 'projctIndex'])->middleware('LoginCheck');

Route::get('/getProjectData',[ProjctController::class,'getProjectData'])->middleware('LoginCheck');
Route::post('/getProjectDetails',[ProjctController::class,'getProjectDetails'])->middleware('LoginCheck');
Route::post('/ProjectDelete',[ProjctController::class,'ProjectDelete'])->middleware('LoginCheck');
Route::post('/ProjectUpdate',[ProjctController::class,'ProjectUpdate'])->middleware('LoginCheck');
Route::post('/ProjectAdd',[ProjctController::class,'ProjectAdd'])->middleware('LoginCheck');

/* Admin Panel Review Manager  */
Route::get('review',[ReviewController::class, 'ReviewIndex'])->middleware('LoginCheck');
Route::get('/getReviewData',[ReviewController::class,'getReviewData'])->middleware('LoginCheck');

Route::post('/getReviewDetails',[ReviewController::class,'getReviewDetails'])->middleware('LoginCheck');
Route::post('/ReviewDelete',[ReviewController::class,'ReviewDelete'])->middleware('LoginCheck');
Route::post('/ReviewUpdate',[ReviewController::class,'ReviewUpdate'])->middleware('LoginCheck');
Route::post('/ReviewAdd',[ReviewController::class,'ReviewAdd'])->middleware('LoginCheck');

// Admin Panel contact Manager 

Route::get('/contact',[ContactController::class, 'ContactIndex'])->middleware('LoginCheck');
Route::get('/getContactData',[ContactController::class, 'getContactData'])->middleware('LoginCheck');
Route::post('/contactDelete',[ContactController::class, 'contactDelete'])->middleware('LoginCheck');


/* Admin Login Area */
Route::get('/login',[LoginController::class, 'LoginIndex']);
Route::post('/onLogin',[LoginController::class, 'onLogin']);
Route::get('/logout',[LoginController::class, 'Logout']);


/* Admin Photo Gallery  */

Route::get('/photo',[PhotoController::class, 'PhotoIndex'])->middleware('LoginCheck');
Route::post('/PhotoUplod',[PhotoController::class, 'PhotoUplod'])->middleware('LoginCheck');
Route::get('/PhotoJSON',[PhotoController::class, 'PhotoJSON'])->middleware('LoginCheck');
Route::get('/PhotoJSONByID/{id}',[PhotoController::class, 'PhotoJSONByID'])->middleware('LoginCheck');
Route::post('/photoDelete',[PhotoController::class, 'photoDelete'])->middleware('LoginCheck');

