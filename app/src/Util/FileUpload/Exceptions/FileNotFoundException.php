<?php

namespace App\Util\FileUpload\Exceptions;

use App\Util\FileUpload\Interfaces\FileNotFoundExceptionInterface;
use Exception;

final class FileNotFoundException extends Exception implements FileNotFoundExceptionInterface
{
    public function __construct(private string $filePath)
    {
        parent::__construct(
            sprintf("Couldn't find file " . $filePath)
        );
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }
}
