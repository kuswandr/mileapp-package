<?php

namespace App\Exceptions;

use Exception;

class ServiceException extends Exception
{
    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        return true;
    }
}
