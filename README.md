# Budget Quiz - Government Budget Simulation

## How to run

### Docker

1. In folder app/docker/postgres copy .env.example as .env, you can edit the default values

2. In app folder run `docker-compose up`.

3. In folder app/src copy .env.example as .env, you can edit the default values in here, don't forget to edit the database credentials and database name to your selected ones in first step.

4. If you want to change default admin password in .env file, then open CLI in container `php-apache` and run `php artisan password:hash YOUR_PASSWORD_GOES_HERE` and then copy the generated hash to the .env file.
5. 
6. Open CLI in container `php-apache` and run `php artisan key:generate` and then run `php artisan migrate:fresh --seed`.

7. In case you get errors regarding storage permissions, run CLI in container `php-apache` and run command `chmod -R 755 storage`.
