# Budget Quizz - Government Budget Simulation

## How to run

### Docker

1. In folder app/docker/postgres copy .env.example as .env, you can edit the default values

2. In app folder run `docker-compose up`.

3. In folder app/src copy .env.example as .env, you can edit the default values in here, dont forget to edit the database credentials and database name to your selected ones in first step.

4. Open CLI in container `php-apache` and run `php artisan key:generate` and then run `php artisan migrate`