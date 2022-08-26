<?php

function load_folder($path)
{
    if(file_exists($path) && is_dir($path))
        $result = scandir($path);
        $files = array_diff($result, array('.', '..'));
        if(count($files) > 0)
            foreach($files as $file)
                require $path . DIRECTORY_SEPARATOR . $file;
}

function load_storage($type, $name)
{
    $path = PATHDEFAULT . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR . "{$name}.php";
    if (file_exists($path))
        require "$path";
}

function Model($name){
    $path = PATHDEFAULT . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . "{$name}Model.php";
    if (file_exists($path))
        require "$path";
}

function Controller($name){
    $path = PATHDEFAULT . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . "{$name}Controller.php";
    if (file_exists($path))
        require "$path";
}

function __Include($name, $data = []){
    $arr_name = explode('.', $name);
    $path_view = $name;
    if(count($arr_name) > 1) {
        $path_view = implode(DIRECTORY_SEPARATOR, $arr_name);
    }
    $path = PATHDEFAULT . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'view'. DIRECTORY_SEPARATOR .$path_view.'View.php';
    if (file_exists($path)) {
        require "$path";
    }
}

function asset($name){
    $source = '/public/asset/';
    // , $type = 0
    // if ($type) {
    //     $source =  $_SERVER['HTTP_HOST'] . '/public/';
    // }
    $path = $source . $name;
    return "$path";
}

function session($name){
    $message = false;
    if (isset($_SESSION[$name])) {
        $message = $_SESSION[$name];
        unset($_SESSION[$name]);
    }
    return $message;
}


function old($post = null, $data = null){
    $result = $data;
    if($data == null) {
        $result =  !empty($_POST[$post]) ? $_POST[$post] : null;
    }
    return $result;
}