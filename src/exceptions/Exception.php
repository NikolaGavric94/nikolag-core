<?php
namespace Nikolag\Core\Exceptions;

use \Exception as BaseException;

class Exception extends BaseException
{
    public function __construct(string $message = null, int $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
