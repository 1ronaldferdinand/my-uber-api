# UberPigeon™

## Documentation

[API Documentation](https://documenter.getpostman.com/view/27591109/2sA3QqfXfH)

## Requirements

| Tech Stack | Version |
| --- | --- |
| PHP | 8.1^ |
| Laravel | 10.0 |
| MySQL | 8.0^ |
| Composer | 2.6.6 |


## Installation

#### 1. Install project with composer

```bash
  run composer install
  php artisan key:generate
```

#### 2. Create & setting project's environment

```bash
  copy .env.example to .env
  set your database in .env
```

#### 3. Run Table's Migrations

```bash
  php artisan migrate:refresh --seed
```
## Run Locally

```bash
  php artisan serve
```



## Usage/Examples

You can just check the API documentations or create new request in any API Management Tools with this requirements :

- Method : POST
- URL : HOST/api/v1/order
- Body : form-data

And input distance & deadline inside the form-data with this spesification :

- distance : Numeric
- deadline : Datetime (Y-m-dTH:i:s)

Example :

- distance : 400
- deadline : 2024-05-24T12:00:00


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