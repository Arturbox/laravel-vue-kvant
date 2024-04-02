docker compose up -d --force-recreate

docker compose exec php composer install

docker compose exec web npm install

docker compose exec web npm run dev