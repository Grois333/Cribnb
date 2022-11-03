# CriBnb App

### Link to App: https://cribnb.000webhostapp.com/

#### Developed with:
 #### Backend: Laravel 8, MSQL
 #### PHP Version Required: 7.4
 #### Scaffolding Frontend: Vue.js, Bootstrap

![Main]()


### Home:

![Home]()



### Commands:

Create Laravel Porject:
composer create-project --prefer-dist laravel/laravel laravelbnb


Start Server:
```php artisan serve```


Install Laravel UI:
composer require laravel/ui --dev


Generate Scaffolding Frontend:
// Generate basic scaffolding...
php artisan ui bootstrap
php artisan ui vue
php artisan ui react



Install required JS libraries:
npm install

Bundle all stylsheets and libraries into single files for our Frontend page:
npm run dev

(Note): If npm run dev has error, delete node modules folder, do npm install
and then npm run dev, will fix the issue.


Install Vue Router:
npm install vue-router


Vue Watcher:
npm run watch




DATABASE:

A Model Class Represents a Database Table

Defining Models(m for making migrations): 
php artisan make:model Bookable -m
php artisan make:model Booking -m
php artisan make:model Review -m
php artisan make:model Address -m

Create Migration in DB:
php artisan migrate


Fake Data:

Installe Lagacy Factory for new Laravel Versions:
composer require laravel/legacy-factories

Create Factory:
php artisan make:factory BookableFactory --model=Bookable
php artisan make:factory BookingFactory
php artisan make:factory ReviewFactory

Generate a Database Seeder:
php artisan make:seeder BookablesTableSeeder
php artisan make:seeder BookingsTableSeeder
php artisan make:seeder ReviewsTableSeeder
php artisan make:seeder UsersTableSeeder

Run Seed (adds new data un top of exsiting data, mostly for production):
php artisan db:seed

Migrations:
php artisan make:migration addReviewKeyToBookingsTable
php artisan make:migration addPriceToBookablesTable
php artisan make:migration addPriceAndAdressToBookingsTable

Refresh the DB and run all database seeds (run this only on development):
php artisan migrate:refresh --seed




API:

Get all API's:
php artisan route:list

Check data in url:
http://localhost:8000/api/bookables


Create Controllers (Groups Http Request of the same type):
php artisan make:controller Api/BookableController
php artisan make:controller Api/BookableAvailabilityController --invokable
php artisan make:controller Api/BookableReviewController --invokable
php artisan make:controller Api/ReviewController
php artisan make:controller Api/BookingByReviewController --invokable
php artisan make:controller Api/BookablePriceController --invokable
php artisan make:controller Api/CheckoutController --invokable

(Controllers need to be referenced by Route in api.php)
http://localhost:8000/api/bookables/1/availability
http://localhost:8000/api/bookables/1/availability?from=2022-08-01&to=2022-08-24


Create Resources for fetching specific data:
php artisan make:resource BookableIndexResource
php artisan make:resource BookableShowResource
php artisan make:resource BookableReviewIndexResource
php artisan make:resource ReviewResource
php artisan make:resource BookingByReviewShowResource
php artisan make:resource BookingByReviewBookableShowResource



Laravel Debugger:
composer require barryvdh/laravel-debugbar --dev


Moment Js:
https://momentjs.com/
npm install moment --save 

Fontawesome:
npm install --save-dev @fortawesome/fontawesome-free



Global State:
Installing VUEX:

npm install vuex --save


User Authentication:

//install
composer require laravel/sanctum

//vendor
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

php artisan migrate

//Generate Auth Folder
php artisan ui:auth




Deploy for Production:

npm run production

Apply changes to .env file:
APP_ENV=production
APP_DEBUG=false

change required db connection credentials

In hosting Whats inside  public folder goes to public_html or htdocs, the res goes to the root in laravel folder
Make the connection:
public/index.php
require __DIR__.'/../laravel/vendor/autoload.php';
$app = require_once __DIR__.'/../laravel/bootstrap/app.php';


How to deploy: https://www.youtube.com/watch?v=GQknBIMk_40&list=PLJieq08ITki_1q3R1i4pJ6g7mm5vQ_RVJ&index=3






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
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
