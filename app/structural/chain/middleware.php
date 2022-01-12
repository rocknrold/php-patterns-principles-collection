<?php

namespace App\Structural\Chain;

abstract class Middleware
{
    protected $_next;

    // public function then(Middleware $handler)
    // {
    //     $this->_next = $handler;

    //     // return $this->_next;
    // }

    public function then(Middleware $handler) : ?Middleware
    {
        $this->_next = $handler;

        return $this->_next;
    }

    public abstract function handle(Request $request);

    public function next(Request $request)
    {
        if(!$this->_next) return null;

        return $this->_next->handle($request);
    } 
}



// $request = new Request();

// $auth = new AuthenticatedMiddleware();
// $token = new TokenIsValidMiddleware();
// $params = new ParamsNotNullMiddleware();

// $auth->then($token)->then($params);