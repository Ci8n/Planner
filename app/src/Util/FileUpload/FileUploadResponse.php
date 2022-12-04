<?php

namespace App\Util\FileUpload;

use App\Util\FileUpload\Interfaces\FileToUploadInterface;
use App\Util\FileUpload\Interfaces\UploadResponseInterface;

final class FileUploadResponse implements UploadResponseInterface
{
    public function __construct(
        private bool $success,
        private ?string $uri,
        private int $responseCode,
        private FileToUploadInterface $uploadedFile,
        private ?string $message
    ) {}

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function getResponseCode(): int
    {
        return $this->responseCode;
    }

    public function getUploadedFile(): FileToUploadInterface
    {
        return $this->uploadedFile;
    }

    public function getResponseMessage(): ?string
    {
        return $this->message;
    }
}
