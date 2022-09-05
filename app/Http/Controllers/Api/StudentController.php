<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Orion\OrionBaseController;
use App\Models\Student;

class StudentController extends OrionBaseController
{
    protected $model = Student::class;
    protected $request = \App\Http\Requests\Api\StudentRequest::class;
    protected $resource = \App\Http\Resources\Api\StudentResource::class;

    /**
    * The relations that are loaded by default together with a resource.
    *
    * @return array
    */
    public function alwaysIncludes() : array
    {
        return ['tutor'];
    }

    public function getStudent(Student $student){
        return $student;
    }
}
