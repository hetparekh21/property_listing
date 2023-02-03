## Installation

Before running the project you need to install some softwares. You can find installers here

-   [Xampp](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.0.25/xampp-windows-x64-8.0.25-0-VS16-installer.exe)
-   [composer](https://getcomposer.org/Composer-Setup.exe)

Run the installers in this prefered order : 

1. Xampp 
2. composer

## Install Xampp

After installing Xampp move the project folder 'property_listing' to C:\Xampp\htdocs or {installed path}\\..\Xampp\htdocs

add path 'C:/Xampp/php' or '{installed path}/../Xampp/php' to your system variables , [see here](https://dinocajic.medium.com/add-xampp-php-to-environment-variables-in-windows-10-af20a765b0ce) .

run xampp control panel and start Apche and MySql servers

you need to create a database in phpmyadmin. You can do this by opening the browser and navigating to http://localhost/phpmyadmin.

click on console an run these two commands

    ```bash
    set global net_buffer_length = 1000000;
    set global max_allowed_packet = 1000000000;
    ```

Then create a database named "property_listing" and click on the import tab. Then select the file named "property_listing.sql" in the database folder project folder and click on the import button.
## Install Composer

while installing composer the installer will ask for php path , most of the time it will automatically find the path , but if not then give the above path and append '\php.exe' in the end

tick the checkbox below that asks 'Add this PHP to your path ?'

After installing the composer, you need to install the project dependencies. To do this, open the command prompt and navigate to the project folder. Then run the following command

```bash
composer install
```

After installing the dependencies,you need to run the project. To do this, open the command prompt and navigate to the project folder. Then run the following command

```bash
php artisan serve
```

After running the project, you can open the browser and navigate to http://localhost:8000. You can now use the project.

## Project Description

This project is a property listing website. It has the following features

-   admin panel
-   admin login
-   admin logout
-   Displaying rotating images on the homepage
-   search properties, and view properties category wise
-   browse properties by category
-   pagination system for search results

## Admin access

To access the admin panel, you need to login.To login , simply add '/admin' to the url above

The default admin credentials are :

-   email : admin@gmail.com
-   password : 12345678
