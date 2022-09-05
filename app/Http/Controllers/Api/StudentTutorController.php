<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Orion\OrionRelationController;
use App\Models\Student;

class StudentTutorController extends OrionRelationController
{
    protected $model = Student::class;
    protected $relation = 'tutor';
    protected $request = \App\Http\Requests\Api\TutorRequest::class;
    protected $resource = \App\Http\Resources\Api\TutorResource::class;

    public function getStudentWithTutor(Student $student)
    {
        return $student->with('tutor')
        ->where('id', '=', $student->id)
        ->first();
    }
}
