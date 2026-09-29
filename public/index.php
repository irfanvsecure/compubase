<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// The site is served from /compubase while the files live in /compubase/public.
// Tell Laravel the public URL prefix so routes stay /about instead of /public/about.
$documentRoot = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'] ?? '') ?: '');
$scriptFile = str_replace('\\', '/', realpath($_SERVER['SCRIPT_FILENAME'] ?? '') ?: '');
if ($documentRoot !== '' && $scriptFile !== '' && str_starts_with($scriptFile, $documentRoot)) {
    $projectPrefix = preg_replace('#/public/index\.php$#', '', substr($scriptFile, strlen($documentRoot)));
    $requestUri = strtok($_SERVER['REQUEST_URI'] ?? '', '?') ?: '';
    if (is_string($projectPrefix) && $projectPrefix !== '' && ! str_contains($requestUri, '/public/') && str_starts_with($requestUri, $projectPrefix)) {
        $_SERVER['SCRIPT_NAME'] = $projectPrefix.'/index.php';
        $_SERVER['PHP_SELF'] = $projectPrefix.'/index.php';
    }
}

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
