<?php

namespace App\Console;

use App\Util\FileUpload\HttpFileUploader;
use App\Util\FileUpload\Interfaces\FileAccessorInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:upload-file',
    description: 'Uploads a file to static server',
    hidden: false,
    aliases: ['app:send-file']
)]
final class UploadFileCommand extends Command
{
    public function __construct(
        private HttpFileUploader $httpFileUploader,
        private FileAccessorInterface $fileAccessor
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $file = $this->fileAccessor->accessFile(dirname(dirname(__DIR__)) . '/.gitignore');

        $send = $this->httpFileUploader->sendFileFromLocal($file);

        $output->writeln($send->getUploadedFile()->getUploadName());
        $output->writeln($send->getResponseCode());

        if ($send->isSuccess()) {
            $output->writeln('HIT: ' . $send->getUri());
        } else {
        }
        $output->writeln($send->getResponseMessage() ?? 'nope');

        return Command::SUCCESS;
    }
}
