<?php


use PHPUnit\Framework\TestCase;

class FunctionsTests extends TestCase
{
    public function testName()
    {
            $nav_menu = '';
            $nav_items = config('nav_menu');

            foreach ($nav_items as $uri => $name) {
                $query_string = str_replace('page=', '', $_SERVER['QUERY_STRING'] ?? '');
                $class = $query_string == $uri ? ' active' : '';
                $url = config('site_url') . '/' . (config('pretty_uri') || $uri == '' ? '' : '?page=') . $uri;

                // Add nav item to list. See the dot in front of equal sign (.=)
                $nav_menu .= '<a href="' . $url . '" title="' . $name . '" class="item ' . $class . '">' . $name . '</a>' . $sep;
            }

            echo trim($nav_menu, $sep);
    }

    public function testName()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        $path = getcwd() . '/' . config('content_path') . '/' . $page . '.phtml';

        if (! file_exists($path)) {
            $path = getcwd() . '/' . config('content_path') . '/404.phtml';
        }
        echo file_get_contents($path);
    }


}
