<?php

namespace BuckhamDuffy\LaravelRequestLog\Support;

use Illuminate\Log\Logger;
use Monolog\Formatter\LineFormatter;

class LogFormatter
{
	public function __invoke(Logger $logger): void
	{
		$driver = config('logging.channels.requests.driver');

		if (!\in_array($driver, ['daily', 'single'])) {
			return;
		}

		foreach ($logger->getLogger()->getHandlers() as $handler) {
			$handler->setFormatter(
				new LineFormatter('%message%' . \PHP_EOL, null, true)
			);
		}
	}
}
