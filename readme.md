
### First time Installation
On your project folder, run this syntax:

php artisan vendor:publish --provider="Bican\Roles\RolesServiceProvider" --tag=config<br/>
php artisan vendor:publish --provider="Bican\Roles\RolesServiceProvider" --tag=migrations

php artisan migrate</br>
php artisan db:seed

### after installation
Please make sure your config is correct and dont forget setting config/mail.php so application can send email.

This laravel starter use https://github.com/romanbican/roles for controlling user auth and use https://github.com/kimlabs/gentelella as template.
