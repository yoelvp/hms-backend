# Hotel Management Software (HMS)

Robust and scalable backend for the Hotel Management System (HMS), designed to streamline processes, manage data securely, and enable efficient management of reservations, services, and resources in the hotel industry. 


## Stack

- PHP
- Laravel
- MySQL
- Laravel Sanctum


## Installation

To install and run the project, you can follow the following steps:

1. Clone the repository to your workspace:
```
git clone https://github.com/yoelvp/hms-backend.git
```

2. Move to the project directory:
```
cd hms-backend
```

3. Install dependencies with **composer**:
```
composer install
```


## Testing

Run application test in the development environment

1. Copy the `.env.example` to `.env.testing`.

2. Change `DB_` environment variables to a test database.
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hms_testing
DB_USERNAME=root
DB_PASSWORD=[PASSWORD]
```

3. Run the migrations on the test database
```
php artisan migrate --env=testing
```

4. If you have already done the migrations, `rollback` or `fresh`
```
php artisan migrate:rollback --env=testing

# or

php artisan migrate:fresh --env=testing
```

5. Run the test
```
php artisan test --env=testing
```


## Documentation

In the following documents you will find detailed documentation for each service that has the Rest API.

| Module          | Documentation                             |
|-----------------|-------------------------------------------|
| Authentication  | [AUTHENTICATION](./doc/AUTHENTICATION.md) |
| Rooms           | [ROOMS](./doc/ROOMS.md)                   |


## Collaborators

- [yoelvp](https://github.com/yoelvp)


## License

The following service is under the [MIT License](./LICENSE)
