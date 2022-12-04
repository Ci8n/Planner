<?php

namespace App\Util\FileUpload\Interfaces;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface ResponseResolverInterface
{
    public function wasUploadSuccessful(ResponseInterface $response): bool;
}
