<?php

namespace App\Util\FileUpload;

use App\Util\FileUpload\Interfaces\FileToUploadInterface;

final class FileToUpload implements FileToUploadInterface
{
    public function __construct(
        private string $filePath,
        private string $uploadName,
    ) {}

    public function getFilePath(): string
    {
        return $this->filePath;
    }

    public function getUploadName(): string
    {
        return $this->uploadName;
    }
}
