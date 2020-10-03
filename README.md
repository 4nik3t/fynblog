# Fynblog - Blog Application Built in Laravel

Assignment by Fyntune to build a blog application

## Installation

1. First, clone the repository.

2. Run `composer install` to install the dependencies.

3. Duplicate the .env.example file with the name as .env and fill in the necessary credentials

4. Run the migrations.

    `php artisan migrate` OR 

    You can also run the seed command to seed some sample data which automatically creates a user, 100 blogs and 10 categories.

    `php artisan migrate --seed`

5. Also the project makes use of tailwindcss library so you have to run the `npm install` && `npm run production` command to compile the js and css.

If you have seeded the sample data you can make use of the following user to login to the system.

Email Adress : admin@example.com
Password: password