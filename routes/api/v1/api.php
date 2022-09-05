<?php

use App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [Api\AuthController::class, 'login']);


Route::middleware('auth:api')->group(function(){
    Orion::resource('tutors', Api\TutorController::class)->withSoftDeletes();
    Orion::hasManyResource('tutors', 'students', Api\TutorStudentsController::class)
    ->withSoftDeletes();

    Orion::resource('students', Api\StudentController::class)->withSoftDeletes();
    Orion::belongsToResource('students', 'tutors', Api\StudentTutorController::class)
    ->withSoftDeletes()
    ->withoutBatch();

    Route::get('/students/getStudent/{student}', [Api\StudentController::class, 'getStudent']);
    Route::get('/students/getStudentFull/{student}', [Api\StudentTutorController::class, 'getStudentWithTutor']);

    Route::resource('courses', Api\CourseController::class);
    Orion::belongsToManyResource('courses', 'students', Api\CourseDetailController::class)
    ->withSoftDeletes();
});