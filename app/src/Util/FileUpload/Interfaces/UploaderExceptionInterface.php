<?php

namespace App\Util\FileUpload\Interfaces;

interface UploaderExceptionInterface
{
    public function getTargetFile(): FileToUploadInterface;
}
