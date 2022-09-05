<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Orion\OrionBaseController as Controller;

class TutorController extends Controller
{
    protected $model = \App\Models\Tutor::class;
    protected $request = \App\Http\Requests\Api\TutorRequest::class;
    protected $resource = \App\Http\Resources\Api\TutorResource::class;
}
