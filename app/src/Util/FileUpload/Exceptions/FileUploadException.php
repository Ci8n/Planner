<?php

namespace App\Util\FileUpload\Exceptions;

use App\Util\FileUpload\Interfaces\FileToUploadInterface;
use App\Util\FileUpload\Interfaces\UploaderExceptionInterface;
use Exception;

class FileUploadException extends Exception implements UploaderExceptionInterface
{
    public function __construct(
        string $message,
        private FileToUploadInterface $targetFile
    ) {
        parent::__construct($message);
    }

    public function getTargetFile(): FileToUploadInterface
    {
        return $this->targetFile;
    }
}
