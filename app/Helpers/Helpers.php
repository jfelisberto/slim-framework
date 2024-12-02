<?php
/**
 * Globals Helpers Functions
 */

use app\Database;
use Jenssegers\Blade\Blade;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../../config/database.php';

if (!function_exists('dbConnection')) {
    function dbConnection() {
        $connection = new Database;
        return $connection;
    }
}

if (!function_exists('base_path'))
{
    function base_path($path='') {
        return __DIR__ . "/../{$path}";
    }
}

if (!function_exists('app_path')) {
    function app_path($path = '')
    {
        return base_path("app/{$path}");
    }
}

if (!function_exists('config_path')) {
    function config_path($path = '')
    {
        return base_path("config/{$path}");
    }
}

if (!function_exists('public_path')) {
    function public_path($path = '')
    {
        return base_path("public/{$path}");
    }
}

if (!function_exists('resources_path')) {
    function resources_path($path = '')
    {
        return base_path("resources/{$path}");
    }
}

if (!function_exists('routes_path')) {
    function routes_path($path = '')
    {
        return base_path("/{$path}");
    }
}

if (!function_exists('storages_path')) {
    function storages_path($path = '')
    {
        return base_path("storages/{$path}");
    }
}

if (!function_exists('')) {
}

if (!function_exists('view')) {
    function viewBlade(Response $response, string $template, array $with=[]) {

         $cache = __DIR__ . '/../../storage/framework/cache';

        $views = __DIR__ . '/../../resources/views';

        $blade = (new Blade($views, $cache))->make($template, $with);

        $response->getBody()->write($blade->render());

        return $response;
    }

    function view(string $view, array $data = [])
    {

        // Set views folder
        $path = dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'Views';

        // Create new Plates instance
        $templates = new League\Plates\Engine($path);

        // Render a template
        print $templates->render($view, $data);

    }
}

if (!function_exists('dump')) {
    function dump($variable)
    {
        print '<pre>';
        print ' <code>';
        print_r($variable);
        print ' </code>';
        print '</pre>';
    }
}

if (!function_exists('dd')) {
    function dd($variable)
    {
        dump($variable);
        die;
    }
}

if (!function_exists('maskCnpjCpf')) {
    function maskCnpjCpf($document)
    {
        $document = str_pad($document, 11, 0, STR_PAD_LEFT);
        $document = preg_replace("/\D/", '', $document);

        if (strlen($document) === 11) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $document);
        }

        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $document);
    }
}

if (!function_exists('maskZipcode')) {
    function maskZipcode($zipcode)
    {

        $zipcode = str_pad($zipcode, 8, 0, STR_PAD_LEFT);
        $zipcode = preg_replace("/\D/", '', $zipcode);

        return preg_replace("/(\d{5})(\d{3})/", "\$1-\$2", $zipcode);
    }
}
