<?php

namespace App\Util\FileUpload\Events;

use Symfony\Contracts\EventDispatcher\Event;

final class FileUploadErrorEvent extends Event
{
    private string $responseMessage;
}
