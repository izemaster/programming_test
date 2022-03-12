## Programming Test
## Instructions

- Run elasticsearch
<code>cd ./elasticsearch-docker</code>
<code>docker compose-up </code>
- Configure and rename .env.example to .env
- Install dependencies
<code>composer install</code>
- Run migrations
<code>php artisan migrate:fresh --seed</code>
- Create symlink
<code>php artisan storage:link</code>
- Run application
<code>php artisan serve</code>



## Client User
>User: client@email.com
>Password : 123456

## Admin User
>User: admin@email.com
>Password : 123456




