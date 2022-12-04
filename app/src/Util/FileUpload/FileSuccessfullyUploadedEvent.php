<?php

namespace App\Util\FileUpload;

use App\Util\FileUpload\Interfaces\FileToUploadInterface;
use App\Util\FileUpload\Interfaces\FileUploadEventInterface;
use App\Util\FileUpload\Interfaces\UploadResponseInterface;
use Symfony\Contracts\EventDispatcher\Event;

final class FileSuccessfullyUploadedEvent extends Event implements FileUploadEventInterface
{
    public const NAME = 'fileupload.success';

    public function __construct(
        private FileToUploadInterface $file,
        private UploadResponseInterface $uploadResponse,
    ) {}

    public function getUploadResponse(): UploadResponseInterface
    {
        return $this->uploadResponse;
    }

    public function getTargetFile(): FileToUploadInterface
    {
        return $this->file;
    }
}
