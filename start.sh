compose_args=''; 
while getopts frd flag
do
    case "${flag}" in
        f) compose_args+=' --build';;
        r) compose_args+=' --force-recreate';;
        d) compose_args+=' --detach';;
    esac
done

RED="\e[31m"
BLUE="\e[34m"
GREEN="\e[32m"
ENDCOLOR="\e[0m"

echo -e "Running:$BLUE docker-compose up$ENDCOLOR$GREEN $compose_args$ENDCOLOR";
docker-compose up $compose_args