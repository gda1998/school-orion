<?php

namespace App\Http\Requests\Api;

use Orion\Http\Requests\Request;

class CourseStudentsRequest extends Request
{
    /**
     * Get the common rules validations.
     *
     * @return array<string, mixed>
     */
    public function commonRules() : array
    {
        return [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'tutor_id' => 'required|numeric|integer|exists:tutors,id',
            'pivot' => 'required',
            'pivot.qualification' => 'required|numeric|between:0,10'
        ];
    }
}
