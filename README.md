# Usage

`start.sh` starts the application.
Unless stated otherwise it will copy the .local.env file into the app folder

It may take following options:
- `-f` ReBuilds the images
- `-r` Forces the images to be forcibly recreated
- `-d` Runs it deamonized
- `-n` Runs it without copying the env file
- `-e NAME` Runs it copying env file with provived argument as name of env file to be copied