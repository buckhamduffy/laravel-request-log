<?php

namespace BuckhamDuffy\LaravelRequestLog\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RequestLogMiddleware
{
	public function handle(Request $request, Closure $next)
	{
		if (filter_var(config('request-log.json_mode'), \FILTER_VALIDATE_BOOL)) {
			$this->handleJson($request);

			return $next($request);
		}

		$this->handleText($request);

		return $next($request);
	}

	private function handleJson(Request $request): void
	{
		$text = json_encode([
			'ts'         => microtime(true),
			'method'     => $request->getMethod(),
			'url'        => $request->url(),
			'query'      => $request->query(),
			'user_id'    => auth()->id() ?: 0,
			'ip'         => $request->ip(),
			'user_agent' => $request->userAgent(),
		]);

		Log::channel('requests')->debug($text);
	}

	private function handleText(Request $request): void
	{
		$text = \sprintf(
			'%s - %s - %s',
			$request->getMethod(),
			auth()->id() ?: 0,
			$request->fullUrl()
		);

		Log::channel('requests')->debug($text);
	}
}
