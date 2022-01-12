<?php

namespace Test;

use App\Exceptions\TokenNotMatchException;
use App\Structural\Chain\MiddlewareProvider;
use App\Structural\Chain\Request;
use App\Structural\Chain\Middlewares\AuthenticatedMiddleware;
use App\Structural\Chain\Middlewares\TokenIsValidMiddleware;
use App\Structural\Chain\Middlewares\ParamsNotNullMiddleware;
use PHPUnit\Framework\TestCase;

class ChainOfResponsibilityTest extends TestCase
{
    public function test_chain_is_working_not_null_on_next()
    {
        $request = new Request();

        $auth = new AuthenticatedMiddleware();
        $token = new TokenIsValidMiddleware();
        $params = new ParamsNotNullMiddleware();

        $auth->then($token)->then($params);
        
        // dd($auth);
        
        $auth->next($request);
    
        $this->assertNotNull($params);
    }

    public function test_chain_break_on_token_middleware()
    {
        $this->expectException(TokenNotMatchException::class);

        $request = new Request();
        $request->token = "replacetokentobreakthechain";

        $mid = new MiddlewareProvider();

        $mid->resolver($request);
    }
}