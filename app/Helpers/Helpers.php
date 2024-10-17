<?php

function view(string $view, array $data = [])
{

    // Set views folder
    $path = dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'Views';

    // Create new Plates instance
    $templates = new League\Plates\Engine($path);

    // Render a template
    print $templates->render($view, $data);

}

function dump($variable)
{
    print '<pre>';
    print ' <code>';
    print_r($variable);
    print ' </code>';
    print '</pre>';
}

function dd($variable)
{
    dump($variable);
    die;
}
