# Laravel Ticket System (WIP)
This ticket system is based on laravel framework with SB Admin 2 Bootstrap template.

## Features

- Authorization-System (Login, Register, Reset Password)
- Profile Page
- Group- & Permission-System
- Tickets
- Ticket Tags
- Ticket Status 

## Installation

Laravel-Tickets requires PHP 7.2+, composer and npm.

Install dependencies
```sh
git clone https://github.com/JanKrb/Laravel-Tickets
cd Laravel-Tickets
npm install
composer install
```

Setup project

- Copy .env.example to file .env
- Fill out fields in .env
    - If you don't know what to fill with, leave it out
    - The Debug variable should be false in production use
    - The Key variable will be generated later
- Run command ``php artisan key:generate`` for key generating
- Run command ``php artisan storage:link`` for accessing the image
- Run command ``php artisan migrate --seed`` for generating the database

Generate files for production usage:
```sh
npm run production
```

Generate files for development usage:
```sh
npm run development
```

Watch for file updates
```sh
npm run watch
```

## Development

Want to contribute? Great!

Make a change in your file and instantaneously see your updates!

Done with your updates? Just create a new pull request I will take a took and merge it as soon as possible.

## Credits
Laravel - [Framework](https://laravel.com/)
LaravelEasyNav - [DevMarketer](https://github.com/DevMarketer/LaravelEasyNav)
SB Admin 2 - [StartBootstrap](https://github.com/startbootstrap/startbootstrap-sb-admin-2)
SB Admin 2 Laravel - [AlecKrh](https://github.com/aleckrh/laravel-sb-admin-2)
## License

MIT
