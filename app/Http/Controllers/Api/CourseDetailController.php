<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Orion\OrionRelationController;
use App\Http\Controllers\Controller;

class CourseDetailController extends OrionRelationController
{
    protected $model = \App\Models\Course::class;

    protected $pivotFillable = ['qualification'];
    protected $pivotJson = ['qualification'];

    protected $relation = 'students';
    protected $request = \App\Http\Requests\Api\CourseStudentsRequest::class;
    protected $resource = \App\Http\Resources\Api\CourseStudentResource::class;
}
