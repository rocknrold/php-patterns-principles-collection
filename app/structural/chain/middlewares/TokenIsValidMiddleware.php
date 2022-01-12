<?php

namespace App\Structural\Chain\Middlewares;

use App\Structural\Chain\Middleware;
use App\Structural\Chain\Request;
use App\Exceptions\TokenNotMatchException;

class TokenIsValidMiddleware extends Middleware
{

    const TOKEN = "asd123ASXHBXYbsoetf941nUWhaas";

    public function handle(Request $request)
    {
        if(self::TOKEN !== $request->token) throw new TokenNotMatchException();

        return $this->next($request);
    }
}