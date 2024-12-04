# Creates a log file with request information

[![Latest Version on Packagist](https://img.shields.io/packagist/v/buckhamduffy/laravel-request-log.svg?style=flat-square)](https://packagist.org/packages/buckhamduffy/laravel-request-log)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/buckhamduffy/laravel-request-log/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/buckhamduffy/laravel-request-log/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/buckhamduffy/laravel-request-log/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/buckhamduffy/laravel-request-log/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/buckhamduffy/laravel-request-log.svg?style=flat-square)](https://packagist.org/packages/buckhamduffy/laravel-request-log)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-request-log.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-request-log)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require buckhamduffy/laravel-request-log
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-request-log-config"
```

This is the contents of the published config file:

```php
return [
	'enable' => env('REQUEST_LOG_ENABLE', true),
	'json_mode' => env('REQUEST_LOG_JSON_MODE', false),
	'log_file' => env('REQUEST_LOG_FILE', storage_path('/logs/requests.log')),
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-request-log-views"
```

## Usage

The package creates a custom logging channel called requests, 
you can overwrite it's settings by adding a `requests` channel
to config/logging.php in your Laravel project.

Add `BuckhamDuffy\LaravelRequestLog\Middleware\RequestLogMiddleware::class` to the `web` 
and `api` middleware groups in `app/Http/Kernel.php`

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Aaron Florey](https://github.com/aaronflorey)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
