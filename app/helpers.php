<?php

declare(strict_types=1);

use App\Exceptions\SwaggerException;

/**
 * @param  null  $asset
 * @return bool|string
 * @throws SwaggerException
 */
function swagger_ui_dist_path($asset = null)
{
    $allowed_files = [
        'favicon-16x16.png',
        'favicon-32x32.png',
        'oauth2-redirect.html',
        'swagger-ui-bundle.js',
        'swagger-ui-bundle.js.map',
        'swagger-ui-standalone-preset.js',
        'swagger-ui-standalone-preset.js.map',
        'swagger-ui.css',
        'swagger-ui.css.map',
        'swagger-ui.js',
        'swagger-ui.js.map',
    ];

    $path = base_path('vendor/swagger-api/swagger-ui/dist/');

    if (!$asset) {
        return realpath($path);
    }

    if (!in_array($asset, $allowed_files)) {
        throw new SwaggerException(sprintf('(%s) - this Swagger asset is not allowed', $asset));
    }

    return realpath($path.$asset);
}

/**
 * @param $asset
 * @return string
 * @throws SwaggerException
 */
function swagger_asset($asset): string
{
    $file = swagger_ui_dist_path($asset);

    if (!file_exists($file)) {
        throw new SwaggerException(sprintf('Requested Swagger asset file (%s) does not exists', $asset));
    }

    return route('swagger.asset', $asset).'?v='.md5_file($file);
}

/**
 * @param $date
 * @return bool
 */
function beforeToday($date): bool
{
    $today = date('Y-m-d');

    return $today > $date;
}
