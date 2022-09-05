<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Orion\OrionBaseController as Controller;

class CourseController extends Controller
{
    protected $model = \App\Models\Course::class;
}
