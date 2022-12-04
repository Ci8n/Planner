<?php

namespace App\Util\FileUpload\Interfaces;

interface FileUploadEventInterface
{
    public function getUploadResponse(): UploadResponseInterface;

    public function getTargetFile(): FileToUploadInterface;
}
