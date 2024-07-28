

<p align="right">
    <a href="https://packagist.org/packages/laravel/framework" target="_blank">
        <img src="https://laravel.com/assets/img/components/logo-laravel.svg">
    </a>
</p>

<p align="right">
    <a href="https://opensource.org/licenses/MIT" target="_blank">
        <img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License of Laravel">
    </a>
</p>


## How To Run The App

First of all:
(you can jump over it or preset your device other way if you understand what you're doing)

- install docker desktop if it's still absent on your host machine

- start the docker desktop application

- stop all other services under the docker app if they up

Execute the following commands in your terminal:

- cd ~/Projects

- git clone git@github.com:gnidkoav/testing-tasks--on-laravel--blog-api.git

- cd testing-tasks--on-laravel--blog-api

- git checkout dockerized

- cp .env.example .env

- docker compose up -d

- docker compose exec web ./composer.phar install

- docker compose exec web php artisan key:generate

- docker compose exec web php artisan jwt:secret --force

- docker compose exec web php artisan migrate

- docker compose exec web php artisan db:seed

Click <a href="http://localhost/" target="_blank">here</a> and enjoy!

