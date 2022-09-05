<?php

namespace App\Http\Requests\Api;

use Orion\Http\Requests\Request;

class TutorRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

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
            'job' => 'required|string|max:255'
        ];
    }
}
