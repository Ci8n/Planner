<?php

namespace App\Util\FileUpload;

use App\Util\FileUpload\Events\FileUploadErrorEvent;
use App\Util\FileUpload\Interfaces\FileToUploadInterface;
use App\Util\FileUpload\Interfaces\UploaderInterface;
use App\Util\FileUpload\Interfaces\UploadResponseInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;

final class HttpFileUploader implements UploaderInterface
{
    private string $fileUploadUrl;

    public function __construct(
        string $fileUploadUrl,
        private EventDispatcherInterface $eventDispatcher,
        private HttpClientInterface $httpClient,
    ) {
        if ($fileUploadUrl[strlen($fileUploadUrl) - 1] !== '/') {
            $fileUploadUrl .= '/';
        }

        $this->fileUploadUrl = $fileUploadUrl;
    }

    public function sendFileFromLocal(FileToUploadInterface $fileToUpload): UploadResponseInterface
    {
        $formData = new FormDataPart([
            'myFile' => DataPart::fromPath(
                $fileToUpload->getFilePath(),
                $fileToUpload->getUploadName()
            )
        ]);

        $response = $this->httpClient->request(
            'POST',
            $this->fileUploadUrl,
            [
                'headers' => $formData->getPreparedHeaders()->toArray(),
                'body' => $formData->bodyToIterable()
            ]
        );

        $uploadResponse = new FileUploadResponse(
            $response->getStatusCode() === 200,
            $fileToUpload->getUploadName(),
            $response->getStatusCode(),
            $fileToUpload,
            $response->getContent(false)
        );

        if ($response->getStatusCode() !== 200) {
            $this->eventDispatcher->dispatch(new FileUploadErrorEvent($fileToUpload, $uploadResponse));
        } else {
            $this->eventDispatcher->dispatch(new FileSuccessfullyUploadedEvent($fileToUpload, $uploadResponse));
        }
        
        return $uploadResponse;
    }

}
