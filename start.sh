compose_args=''; 
while getopts f: flag
do
    case "${flag}" in
        f) compose_args+=' --build';;
    esac
done

echo "docker-compose up $compose_args";
docker-compose up $compose_args