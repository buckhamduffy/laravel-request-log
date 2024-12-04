<?php

namespace BuckhamDuffy\LaravelRequestLog;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use BuckhamDuffy\LaravelRequestLog\Support\LogFormatter;

class LaravelRequestLogServiceProvider extends PackageServiceProvider
{
	public function configurePackage(Package $package): void
	{
		/*
		 * This class is a Package Service Provider
		 *
		 * More info: https://github.com/spatie/laravel-package-tools
		 */
		$package
			->name('laravel-request-log')
			->hasConfigFile();
	}

	public function bootingPackage(): void
	{
		$config = config('logging.channels.requests') ?: [];

		$config = array_merge([
			'driver'     => 'daily',
			'path'       => config('request-log.log_file', storage_path('logs/requests.log')),
			'level'      => 'debug',
			'days'       => 7,
			'permission' => 0666,
			'tap'        => config('request-log.json_mode') ? [LogFormatter::class] : [],
		], $config);

		config()->set('logging.channels.requests', $config);
	}
}
