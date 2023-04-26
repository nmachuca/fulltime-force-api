## About Fulltime-Force-API

This is an API  application developed with the purpose of connect with the github API and retrieve a list of commits of a given repository.

## API Documentation

This API consists of two endpoints:

1. /repos GET => list repos
2. /commits/{$repository_id} GET => list commit of given repository ID.

## Local environment

In order to set up locally is recommended to have docker and docker compose. This project was made using the sail Laravel utility.
With these requirements out of the way you need to execute:

- Clone repository
- ```cd localpath/gulltime-force-api```
- ```cp .env.example .env```
- Set the following variables in the .nv file
```
GITHUB_BASE_URL=https://api.github.com/
GITHUB_USER=nmachuca
GITHUB_API_VERSION=2022-11-28
DEFAULT_USER_NAME=nmachuca
DEFAULT_USER_PASS=qwerty123
DEFAULT_USER_EMAIL=nmachuca@protonmail.com
IS_SECURED=false
```
- Execute
```
docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php82-composer:latest composer install --ignore-platform-reqs
```
- ```alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'```
- ```sail artisan key:generate```
- ```sail aritsan migrate```
- ```sail artisan db:seed```
- ```sail up -d```

