<?php
namespace Nikolag\Core\Exceptions;

use Nikolag\Core\Exceptions\Exception;

class InvalidConfigurationException extends Exception
{
    public function __construct(string $message = null, int $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
