<?php

namespace App\Structural\Chain\Middlewares;

use App\Structural\Chain\Middleware;
use App\Structural\Chain\Request;
use Exception;

class AuthenticatedMiddleware extends Middleware
{
    public function handle(Request $request)
    {
        if($request->authenticated) throw new Exception('User not authenticated exception');

        return $this->next($request);
    }
}