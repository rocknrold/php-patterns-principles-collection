<?php 

namespace App\Exceptions;

use Exception;

class TokenNotMatchException extends Exception
{
    protected $message = "Token does not match exception";
}
