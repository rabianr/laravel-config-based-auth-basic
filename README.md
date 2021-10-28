# Config file based HTTP Basic Authentication Middleware for Laravel

## Installation

```sh
composer require rabianr/laravel-config-based-auth-basic 
```

## Configuration

Publish the config to copy the file to your own config:
```sh
php artisan vendor:publish --tag="authbasic"
```

## Usage

Set `auth.basic.cb` middleware to any route that require Basic Auth.

Define credentials in `config/authbasic.php` config file.
```php
'credentials' => [
    [ 'user', 'password' ],
],
```
or in `.env` file
```
AUTHBASIC_USERS=user1:pass1,user2:pass2
```
