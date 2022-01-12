<?php

namespace App\Exceptions;

use Exception;

class ParamIsNullException extends Exception
{
    protected $message = "Required parameter is not set or is empty.";
}