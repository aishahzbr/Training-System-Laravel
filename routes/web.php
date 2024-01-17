<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\DepartmentsController; //add DepartmentsController
use App\Http\Controllers\AssignController;

use App\Models\Training;



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

// Route::get('/', function () {
//     return view('/welcome');
// });

Route::get('/', function () {
    $trainings = Training::all();
    return view('landingpage')->with(compact('trainings'));
});

Route::get('auth/google', [GoogleController::class, 'googlepage']);

Route::get('auth/google/callback', [GoogleController::class, 'googlecallback']);

Auth::routes();

// admin route list
Route::middleware(['auth', 'user-access:admin'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:trainer'])->group(function () {
    Route::get('/trainer/home', [HomeController::class, 'trainerhome'])->name('trainer.home');
});


// routes/web.php
// route for training module
// Route::get('/trainings', [App\Http\Controllers\TrainingController::class, 'index']) -> name ('training:index');
// Route::get('/trainings/create', [App\Http\Controllers\TrainingController::class, 'create']) -> name ('training:create');
// Route::post('/trainings/create', [App\Http\Controllers\TrainingController::class, 'store']) -> name ('training:store');

// group routing TrainingController
Route::group([
    'middleware' => 'auth', // lock this route group only for authenticated users
    'prefix' => 'trainings',
    'as' => 'training:',
], function(){
  
    Route::get('/', [App\Http\Controllers\TrainingController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\TrainingController::class, 'create']) -> name ('create'); // create form
    Route::post('/create', [App\Http\Controllers\TrainingController::class, 'store']) -> name ('store'); // upload file so use post 
    Route::get('/{training}', [App\Http\Controllers\TrainingController::class, 'show']) -> name ('show'); // upload file so use post 
    Route::get('/{training}/edit', [App\Http\Controllers\TrainingController::class, 'edit']) -> name ('edit'); // form to edit
    Route::post('/{training}', [App\Http\Controllers\TrainingController::class, 'update']) -> name ('update'); // form to edit
    Route::post('/{training}/delete', [App\Http\Controllers\TrainingController::class, 'delete']) -> name ('delete'); // form to delete

    Route::get('/getTrainers/{id}', [App\Http\Controllers\TrainingController::class, 'getTrainers']);
});

//LandingController
Route::group([
    'middleware' => 'auth', // lock this route group only for authenticated users
    'prefix' => 'search',
    'as' => 'search:',
], function(){
  
    Route::get('/', [App\Http\Controllers\LandingController::class, 'search'])->name('search');  
});


// TrainerController
Route::group([
    'middleware' => 'auth', // lock this route group only for authenticated users
    'prefix' => 'trainers',
    'as' => 'trainer:',
], function(){
  
    Route::get('/', [App\Http\Controllers\TrainerController::class, 'trainer'])->name('trainer'); 
    Route::get('/create', [App\Http\Controllers\TrainerController::class, 'create']) -> name ('create'); // create form
    Route::post('/create', [App\Http\Controllers\TrainerController::class, 'store']) -> name ('store'); // upload file so use post 
    Route::get('/{trainer}', [App\Http\Controllers\TrainerController::class, 'detail']) -> name ('detail'); // 
    Route::get('/{trainer}/edit', [App\Http\Controllers\TrainerController::class, 'edit']) -> name ('edit'); // form to edit
    Route::post('/{trainer}', [App\Http\Controllers\TrainerController::class, 'update']) -> name ('update'); // form to edit

    Route::post('/{trainer}/delete', [App\Http\Controllers\TrainerController::class, 'delete']) -> name ('delete'); // form to delete
});

//AssignController
Route::group([
    'middleware' => 'auth', // lock this route group only for authenticated users
    'prefix' => 'assigns',
    'as' => 'assign:',
], function(){
  
    Route::get('/create', [App\Http\Controllers\AssignController::class, 'create'])->name('create');  
    Route::post('/create', [App\Http\Controllers\AssignController::class, 'store']) -> name ('store'); // upload file so use post 
    Route::get('/fullcalendar', [App\Http\Controllers\AssignController::class, 'fullcalendar']) -> name('fullcalendar');
    Route::get('/getEvents', [App\Http\Controllers\AssignController::class, 'getEvents']);
    Route::delete('/schedule/{id}', [App\Http\Controllers\AssignController::class, 'deleteEvent']);
    Route::put('/schedule/{id}', [App\Http\Controllers\AssignController::class, 'update']);


    Route::get('/getTrainers/{trainingName}', [App\Http\Controllers\AssignController::class, 'getTrainers']);

});




