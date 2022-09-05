<?php

namespace App\Http\Controllers\Api\Orion;

use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class OrionBaseController extends Controller
{
    use DisableAuthorization;

    /**
    * Default pagination limit.
    *
    * @return int
    */
    public function limit() : int
    {
        return 100;
    }

    /**
     * The attributes that are used for sorting.
     *
     * @return array
     */
    public function sortableBy() : array
    {
        return ['id'];
    }
}
