<?php

namespace App\Util\FileUpload\Interfaces;

use Throwable;

interface FileUploadExceptionInterface extends Throwable
{
    public function getTargetFile(): FileToUploadInterface;
}
