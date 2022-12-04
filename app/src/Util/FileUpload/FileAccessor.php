<?php

namespace App\Util\FileUpload;

use App\Util\FileUpload\Exceptions\FileNotFoundException;
use App\Util\FileUpload\Interfaces\FileAccessorInterface;
use App\Util\FileUpload\Interfaces\FileToUploadInterface;
use App\Util\FileUpload\Interfaces\FileNameGeneratorInterface;

final class FileAccessor implements FileAccessorInterface
{
    public function __construct(private FileNameGeneratorInterface $fileNameGenerator)
    {
    }

    public function accessFile(string $filePath): FileToUploadInterface
    {
        if (!file_exists($filePath)) {
            throw new FileNotFoundException($filePath);
        }

        return new FileToUpload($filePath, $this->fileNameGenerator->generateNewName($filePath));
    }
}
