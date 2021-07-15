# Mountcak Apps API

## Installing
### 1. Sofware required
Before installing, make sure your device has installed this software.
* Composer : you can download it [here](https://getcomposer.org/)

### 2. Installing
* Run `composer install`
* Run `copy .env.example .env`
* Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
* Run `php artisan key:generate`
* Run `php artisan migrate`
* Run `php artisan db:seed`
* Last, run `php artisan serve`, then the API is ready to use with prefix url `http://127.0.0.1:8000/api/`

## Docs
API url: https://mountcak-apps.herokuapp.com/api/. 

## Account
#### Superadmin
* Email : superuser@superuser.com
* Password : superuser

## Built with
* [Laravel v 8](https://laravel.com/docs/8.x)
