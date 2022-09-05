<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Orion\OrionRelationController;

class TutorStudentsController extends OrionRelationController
{
    protected $model = \App\Models\Tutor::class;
    protected $relation = 'students';
    protected $request = \App\Http\Requests\Api\StudentRequest::class;
    protected $resource = \App\Http\Resources\Api\StudentResource::class;
}
