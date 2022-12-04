<?php

namespace App\Util\FileUpload\Interfaces;

interface FileToUploadInterface
{
    /**
     * Local path to file, SHOULD be absolute
     */
    public function getFilePath(): string;

    /**
     * Name this file MAY BE available under
     */
    public function getUploadName(): string;
}
