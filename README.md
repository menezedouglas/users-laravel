# Users Laravel 😉

> This is a simple API Rest Full with Laravel Framework


## To run this API, you need... 👍
<table>
    <tbody>
        <tr>
            <td>GIT</td>
            <td>^2.24.x</td>
        </tr>
        <tr>
            <td>PHP</td>
            <td>^7.4</td>
        </tr>
        <tr>
            <td>Composer</td>
            <td>^2.1.x</td>
        </tr>
        <tr>
            <td>MySQL Database</td>
            <td>^8.0.x</td>
        </tr>
    </tbody>
</table>

## All Right? Now, follow the instructions below... 👌

> Clone this project in your computer... Use the command below to this!
>
> ```
> git clone https://github.com/menezedouglas/users-laravel.git
> ```

> Go to folder the project...
>
> ```
> cd users-laravel
> ```

> With the project cloned in your computer, duplicate and rename the file .env.example
>
> ```
> cp .env.example .env  
> ```

> Configure your database in .env file
>
> ``` 
> DB_DRIVER=mysql
> DB_HOST=localhost
> DB_PORT=3306
> DB_NAME=users_laravel
> DB_USER=root
> DB_PASSWORD=
> ```
>
> If you like, adjust the name of API and Base URL
>
> ```
> APP_NAME=users_php 
> APP_URL=http://localhost
> ```
> 
> Then, our to go create APP_KEY... Please, run this in base folder of project:
> ```
> php artisan key:generate
> ```

## Good! Now, we are to go create tables and views in your database

> Please, create a new schema to use in project... On the app database management, run:
> ```
> create schema users_laravel collate utf8mb4_general_ci;
> ```
> 
>
> ### Await and pay attention this!
>
> The DB_NAME is set in your .env file, new equal to schema name...
> 
>  Ex:
> ```
>--- Creating database
> create schema users_laravel collate ...
> 
> --- Configuring database in .env file
> DB_NAME=users_laravel
> ```
> 
> Run the migrations
> 
> ```
> cd ~/users_laravel
> 
> php artisan migrate
> ```
> 

## Fine! Now, we are to go install all dependencies of project
> In the base path of project, run this:
>
> ```
> composer install
> ```

## Finally! We are go start the API...
> Go to public folder
>
> ```
> cd public
> ```
>
> And start PHP server using this:
>
> ```
> php -S localhost:80
> ```
> 
> or, in base path of project, run:
> 
> ```
> php artisan serve
> ```

## Success!!
> Now you can follow the API documentation in the [POSTMAN](https://documenter.getpostman.com/view/9336516/U16bvULL)!
> 
> See more about [LARAVEL](https://laravel.com)!
>
> I see you later, Dev!


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
