# Laravel 5.8

This project is a login control with admin and user permissions.
You can control 2 kinds of users with permission in a group of routes.
#Middleware, MySQL

------------------------------------------------------------------------------------------------
*Don't forget congig your email in a .env file:  
MAIL_DRIVER=smtp  
MAIL_HOST=smtp.gmail.com  
MAIL_PORT=587  
MAIL_USERNAME=yourEmail@gmail.com  
MAIL_PASSWORD=yourPassword  
MAIL_ENCRYPTION=tls  

*After made log in, you can redirect the user form out own page:
app\Http\Middleware\RedirectIfAuthenticated.php
public function handle

