<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::group(['middleware'=>['auth','is_admin']],function (){
//    Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('index');
   //All crud routes for students
    Route::get('/',[App\Http\Controllers\StudentController::class,'index'])->name('students.index');
    Route::get('/students/create',[App\Http\Controllers\StudentController::class,'create'])->name('students.create');
    Route::get('/students/edit/{id}',[App\Http\Controllers\StudentController::class,'edit'])->name('students.edit');
    Route::delete('/students/destroy/{student}',[App\Http\Controllers\StudentController::class,'destroy'])->name('students.destroy');
    Route::post('/student/create',[App\Http\Controllers\StudentController::class,'store'])->name('students.store');
    Route::post('/student/update/{id}',[App\Http\Controllers\StudentController::class,'update'])->name('students.update');
    Route::get('/student/show/{id}',[App\Http\Controllers\StudentController::class,'show'])->name('students.show');

    //All crud routes for groups
    Route::get('/groups',[App\Http\Controllers\GroupController::class,'index'])->name('group.index');
    Route::get('/group/create',[App\Http\Controllers\GroupController::class,'create'])->name('group.create');
//    Route::get('/group/edit/{id}',[App\Http\Controllers\GroupController::class,'edit'])->name('group.edit');
    Route::delete('/group/destroy/{group}',[App\Http\Controllers\GroupController::class,'delete'])->name('group.destroy');
    Route::post('/group/create',[App\Http\Controllers\GroupController::class,'store'])->name('group.store');
//    Route::post('/group/update/{id}',[App\Http\Controllers\GroupController::class,'update'])->name('group.update');
    Route::get('/group/show/{id}',[App\Http\Controllers\GroupController::class,'show'])->name('group.show');

    //CRUD for all topics
    Route::get('/topics',[App\Http\Controllers\TopicController::class,'index'])->name('topic.index');
    Route::get('/topic/create',[App\Http\Controllers\TopicController::class,'create'])->name('topic.create');
    Route::get('/topic/edit/{id}',[App\Http\Controllers\TopicController::class,'edit'])->name('topic.edit');
    Route::delete('/topic/destroy/{topic}',[App\Http\Controllers\TopicController::class,'delete'])->name('topic.destroy');
    Route::post('/topic/create',[App\Http\Controllers\TopicController::class,'store'])->name('topic.store');
    Route::post('/topic/update/{id}',[App\Http\Controllers\TopicController::class,'update'])->name('topic.update');
//    Route::get('/topic/show/{id}',[App\Http\Controllers\TopicController::class,'show'])->name('topic.show');


    Route::get('/evaluation',[App\Http\Controllers\EvaluationController::class,'index'])->name('evaluation.index');
    Route::get('/evaluation/{group_id}',[App\Http\Controllers\EvaluationController::class,'getStudents'])->name('evaluation.students');
    Route::get('/evaluation/score/{student_id}',[App\Http\Controllers\EvaluationController::class,'scoreStudent'])->name('evaluation.score');
    Route::post('evaluation/score/{student_id}',[App\Http\Controllers\EvaluationController::class,'store'])->name('evaluation.store');
    Route::get('/evaluation/{first_score}/{second_score}/{group_id}',[App\Http\Controllers\EvaluationController::class,'findScores'])->name('evaluation.find.score');
    Route::get('/evaluation/correlation/group',[App\Http\Controllers\EvaluationController::class,'correlationGroup'])->name('evaluation.correlation.group');
    Route::get('/evaluation/correlation/topic',[App\Http\Controllers\EvaluationController::class,'correlationTopic'])->name('evaluation.correlation.topic');

});
