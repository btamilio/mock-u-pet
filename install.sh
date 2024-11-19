#!/usr/bin/env bash

if [ -f .env ]; then
    set -a 
    source .env
    set +a
else
    echo "ERROR: cannot find .env file"
    exit;
fi


composer i
npm i


./artisan db:seed
./artisan db:seed BreedSeeder