<?php

/**
 * Used to store website configuration information.
 *
 * @var string or null
 */
function config($key = '')
{
    $config = [
        'name' => 'Fuel Predictions',
        'site_url' => '',
        'pretty_uri' => false,
        'nav_menu' => [
            '' => 'Home',
            'fuelquote' => 'Get a Fuel Quote',
            'fuelhistory' => 'Get your Fuel History',
            'Login' => 'Login',
            'Registration' => 'Join!',
            'ClientProfileManagement' => 'Client',
        ],
        'template_path' => 'template',
        'content_path' => 'content',
        'version' => 'v3.1',
    ];

    return isset($config[$key]) ? $config[$key] : null;
}
