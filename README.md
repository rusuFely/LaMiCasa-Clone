# LaMiCasa-Clone

mkdir app, config, database, docker, public
mkdir app/Controllers, app/Models, app/Services

New-Item Dockerfile -ItemType File
New-Item docker-compose.yml -ItemType File
New-Item .gitignore -ItemType File
New-Item docker/apache.conf -ItemType File
New-Item database/schema.sql -ItemType File
New-Item public/index.php -ItemType File

docker compose up -d --build