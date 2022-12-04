<?php

namespace App\Util\FileUpload\Interfaces;

use Throwable;

interface FileNotFoundExceptionInterface extends Throwable
{
    public function getFilePath(): string;
}
