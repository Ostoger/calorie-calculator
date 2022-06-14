BASEDIR=$(dirname "$0")
cd "$BASEDIR" || exit

docker-compose -f "docker-compose-php.yml" up -d --build
