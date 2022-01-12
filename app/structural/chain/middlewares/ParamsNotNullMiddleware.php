<?php

namespace App\Structural\Chain\Middlewares;

use App\Structural\Chain\Request;
use App\Structural\Chain\Middleware;
use App\Exceptions\ParamIsNullException;

class ParamsNotNullMiddleware extends Middleware
{
    public function handle(Request $request)
    {
        if(!isset($request->params)) throw new ParamIsNullException();
        
        // dd('params');
        return $this->next($request);
    }
}