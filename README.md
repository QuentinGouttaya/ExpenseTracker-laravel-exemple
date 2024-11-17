## HOW TO RUN

Just git clone the project and cd into the directory. You need to have either docker desktop or docker engine installed.

chmod -x ./set_user_id_and_start

It will check your UID and echo it into the .env file then it will start docker compose up --build.

entrypoint.sh should not be touched as it will generate an API_KEY for your laravel app to start and migrate:fresh (DB will be wiped then seeded).

if you want to keep the data at startup you need to remove the line artisan migrate:refresh (As it drops the tables)

This is a project for educationnal purpose only to work with docker and composer.
