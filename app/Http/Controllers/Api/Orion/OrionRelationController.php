<?php

namespace App\Http\Controllers\Api\Orion;

use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;

class OrionRelationController extends RelationController
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
}
