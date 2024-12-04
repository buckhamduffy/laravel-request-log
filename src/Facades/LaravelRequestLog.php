<?php

namespace BuckhamDuffy\LaravelRequestLog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BuckhamDuffy\LaravelRequestLog\LaravelRequestLog
 */
class LaravelRequestLog extends Facade
{
	protected static function getFacadeAccessor(): string
	{
		return \BuckhamDuffy\LaravelRequestLog\LaravelRequestLog::class;
	}
}
