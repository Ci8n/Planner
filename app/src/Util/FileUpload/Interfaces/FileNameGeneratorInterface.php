<?php

namespace App\Util\FileUpload\Interfaces;

interface FileNameGeneratorInterface
{
    public function generateNewName(string $filePath): string;    
}
