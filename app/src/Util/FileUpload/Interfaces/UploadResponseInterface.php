<?php

namespace App\Util\FileUpload\Interfaces;

interface UploadResponseInterface
{
    public function isSuccess(): bool;

    public function getUri(): ?string;

    public function getResponseCode(): int;

    public function getUploadedFile(): FileToUploadInterface;

    public function getResponseMessage(): ?string;
}
