# Installing
* Install Composer
* Clone this repo
* Browse to the root directory of the project (the one this file resides in)
* Run this command to install all the laravel dependencies:
````
composer install
````
* Set the Document Root to the public directory of the application, eg: /path/to/csnades-website/public

# Environment Configuration
Browse to /path/to/csnades. Create a copy of .env.php.sample, name it
.env.local.php, and change the values accordingly. On the production server, the
file will be named .env.php, and the environment.php file will need to say
'production' rather than 'local'.

# Database Seeding
Laravel has a tool that allows us to put a bunch of data into our database. This
certainly comes in handy when needing data to run our app! From the command
line, navigate to the root directory of the project and run:
````
php artisan migrate
php artisan db:seed
````

This will create all the tables and add in default data for maps and pop spots.

# Notes
Remember to make sure that your user is in the www-data group (or whatever group
your webserver uses). Laraval creates its own files, which will be owned by the
webserver's user and group. Make sure that the umask sets rw permissions
for the web server group (umask 002 is commonly used). To accomplish this in
Apache, just put umask 002 in /etc/apache2/envvars (this is for unix systems). 