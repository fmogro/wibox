
<p  align="center"><a  href="https://laravel.com"  target="_blank"><img  src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"  width="400"></a></p>

  
<a  href="https://packagist.org/packages/laravel/framework"><img  src="https://img.shields.io/packagist/l/laravel/framework"  alt="License"></a>
  

# Welcome to wiBox 😎👨‍💻

This app allows the user to upload files to their Dropbox ☁️ folder. It allows you to manage them, (upload, download, delete, and open the public url in a new tab)

This app is built in ***Laravel 8*** and is configured with webpack to compile style sheets (css) and Javascript (js).

In addition, the [DropZoneJs](https://www.dropzonejs.com/) library has been used to use a newer uploader that allows the user a better experience. [Bootstrap](https://getbootstrap.com/) was used for styles.
  

# Installation 🤖

First on a new terminal execute opened on the project folder:

    composer install
after execute this:

    npm install

If the project show the error _"RuntimeException No application encryption key has been specified."_ execute:


`php artisan key:generate`

## Configuration 😬🤯
We just have to create an application in Dropbox (Click [here](https://www.dropbox.com/developers/apps/create)) to allow all scopes. Put the Dropbox api key generated and in the Laravel .env file 

    CLOUD_TOKEN= Paste Dropbox generated token

 After, execute

  

    php artisan migrate
    php artisan db:seed --class=CreateAdminUserSeeder
    php artisan db:seed --class=PermissionTableSeeder

  

## Usage

  

The way to use it is very simple, first use the user and password created on **_CreateAdminUserSeeder_** after upload the files and enjoy.

    cuentapruebafmo1@gmail.com
    admin123
    
## Additional Information

The application uses php and the view controller model provided by Laravel.

Two libraries were used for roles, one library for the use of Dropbox and the last one was used to translate Laravel native message to spanish

       laravelcollective/html
       spatie/flysystem-dropbox
       spatie/laravel-permission
       laradevs/spanish

To avoid mixing technologies, VueJs were not used for the views, in this case they used the native ones and the classic Laravel Blades.

The application in the particular case takes advantage of the cloud, and does not use the native filestorage.

Dropbox was added as an additional disk.🧑‍💻 
