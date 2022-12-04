<?php

namespace App\Util\FileUpload\Interfaces;

use App\Util\FileUpload\Exceptions\FileNotFoundException;

interface FileAccessorInterface
{
    /**
     * @throws FileNotFoundException
     */
    public function accessFile(string $filePath): FileToUploadInterface;    
}
