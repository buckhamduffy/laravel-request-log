<?php

// config for BuckhamDuffy/LaravelRequestLog
return [
	'json_mode' => env('REQUEST_LOG_JSON_MODE', true),
	'log_file' => env('REQUEST_LOG_FILE', storage_path('/logs/requests.log')),
];
