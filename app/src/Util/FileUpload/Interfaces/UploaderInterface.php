<?php

namespace App\Util\FileUpload\Interfaces;

interface UploaderInterface
{
    public function sendFileFromLocal(FileToUploadInterface $fileToUpload): UploadResponseInterface;
}
