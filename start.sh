#!/usr/bin/env bash
compose_args=''; 

RED="\e[31m"
BLUE="\e[34m"
GREEN="\e[32m"
ENDCOLOR="\e[0m"

copy_env="./.local.env";

while getopts frdpne: flag
do
    case "${flag}" in
        f) compose_args+=' --build';;
        r) compose_args+=' --force-recreate';;
        d) compose_args+=' --detach';;
        e) copy_env=$OPTARG;;
        n) unset copy_env;; 
    esac
done

if [ ! -z $copy_env ]; then
    
    if cp $copy_env ./.env && cp $copy_env ./app/.env ;then
        echo -e $BLUE"Copied env file:$ENDCOLOR$GREEN $copy_env$ENDCOLOR";
    else
        echo -e $RED"Couldn't copy file $BLUE$copy_env$ENDCOLOR"
        
        exit;
    fi;
fi

echo -e "Running:$BLUE docker-compose up$ENDCOLOR$GREEN $compose_args$ENDCOLOR";

docker-compose up $compose_args