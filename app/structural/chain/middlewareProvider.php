<?php

namespace App\Structural\Chain;

class MiddlewareProvider
{
    /**
     * Register all middleware classes that will be executed from first element to last element
     * 
     * @var array $middlewares
     */
    protected $middlewares = [
        'auth' => \App\Structural\Chain\Middlewares\AuthenticatedMiddleware::class,
        'token' => \App\Structural\Chain\Middlewares\TokenIsValidMiddleware::class,
        'params' => \App\Structural\Chain\Middlewares\ParamsNotNullMiddleware::class,
    ];

    /**
     * Will hold result of the getMiddlewareClasses function.
     * 
     * @var $middlewares_values
     */
    protected $middlewares_values;

    public function resolver(Request $request)
    {   
        // Get first middleware and create a new object then pass the variable name on the _middleware;
        $_firstMiddleware = new $this->middlewares[array_key_first($this->middlewares)]();
        
        // Is a string that will hold the concatenated chain command, as seen the first component in the chain
        // is stored initially in this middleware.
        $_middleware = '$_firstMiddleware->';

        // Loop through the middleware values starting from index 1 
        // as we are going to skip the first element that is previously instantiated
        for ($i = 1; $i < count($this->getMiddlewareClasses()); $i++)
        {
            // Create a string of command;
            $_middleware = $_middleware."then(new \\{$this->middlewares_values[$i]}())->";
        }
        
        // Evaluate the _middleware (string) as a command then execute;
        eval(substr($_middleware,0,-2).";");

        // to actually begin the operation pass the request variable. 
        $_firstMiddleware->next($request);
    }
    
    /**
     * Get all the middleware class values for resolver;
     * 
     * @func getMiddlewareClasses
     */
    public function getMiddlewareClasses()
    {
        $this->middlewares_values = array_values($this->middlewares);
        
        // Assign to the local variable middleware values;
        return $this->middlewares_values;
    }
}