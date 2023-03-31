# GeeksJo Assignment


## System Requirements
```
- php 8 or above
- apache
- mysql
```
## Installation

First clone this repository, install the dependencies, and setup your .env file.

```
git clone https://github.com/mohamedegila/geeksJo-assignment.git
composer install
cp .env.example .env
set database credentials

```

Then create the necessary database.

```
create database geeksjo_db

```

And run the initial migrations and seeders.

```
php artisan migrate --seed

OR

php artisan migrate
php artisan db:seed

```

Then Run Passport Command

```
php artisan passport:install

```

Import Postman File

```
geeksJo-assignment.postman_collection.json

```

Login credentials

```
email : admin@admin.com
password: admin

```

API That gets countries's cities by country id 

```
showCountry EndPoint 
GET : 
http://127.0.0.1:8000/api/v1/countries/id

```


Use Register and Login EndPoints to generate token to use all endpoints in Postman

```
Register EndPoint 
POST : 
http://127.0.0.1:8000/api/v1/register/

Login EndPoint 
POST : 
http://127.0.0.1:8000/api/v1/login/

```
