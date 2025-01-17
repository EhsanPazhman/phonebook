<?php
function site_url($uri = '')
{
    return $_ENV['DOMAIN'] . $uri;
}
function asset_url($uri = '')
{
    return site_url('assets/' . $uri);
}
function view($path, $data = [])
{
    extract($data);
    $path = str_replace('.','/',$path);
    $view_full_path = BASEPATH . "views/$path.php";
    include_once $view_full_path;
}
function view_die($path,$data = []){   # error.404
    view($path,$data);
    die();
}