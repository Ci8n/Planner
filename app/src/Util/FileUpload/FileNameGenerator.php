<?php

namespace App\Util\FileUpload;

use App\Util\FileUpload\Interfaces\FileNameGeneratorInterface;

final class FileNameGenerator implements FileNameGeneratorInterface
{
    public function generateNewName(string $filePath): string
    {
        [
            'extension' => $extension,
            'filename' => $fileName,
        ] = pathinfo($filePath);
        
        $suffix = '_' . random_int(1, 999);

        return $fileName . $suffix . '.' . $extension;
    }
}
