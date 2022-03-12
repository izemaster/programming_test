## Programming Test
## Instructions

- Run elasticsearch
<code>docker compose-up ./elasticsearch-docker/docker-compose.yml</code>
- Install dependencies
<code>composer install</code>
- Run migrations
<code>php artisan migrate:fresh --seed</code>
- Run application
<code>php artisan serve</code>



