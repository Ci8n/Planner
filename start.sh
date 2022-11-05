compose_args=''; 
while getopts f:r: flag
do
    case "${flag}" in
        f) compose_args+=' --build';;
        r) compose_args+=' --force-recreate';;
    esac
done

echo "docker-compose up $compose_args";
docker-compose up $compose_args