<?php

namespace App\Helpers;

trait HttpResponses
{
    public function okResponse($response = '')
    {
        return response($response, 200);
    }

    public function createdResponse($response = '')
    {
        return response($response, 201);
    }

    public function noContentResponse()
    {
        return response('', 204);
    }

    public function badRequestResponse($response = '')
    {
        return response($response, 400);
    }

    public function unauthorizedResponse($response = '')
    {
        return response($response, 401);
    }
}
