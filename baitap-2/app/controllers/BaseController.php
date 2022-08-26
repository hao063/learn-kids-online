<?php


class BaseController
{
    public function hello() {
        echo "hello";
        return $this;
    }

    public function load_view($name, $data = []){
        $arr_name = explode('.', $name);
        $path_view = $name;
        if(count($arr_name) > 1) {
            $path_view = implode(DIRECTORY_SEPARATOR, $arr_name);
        }
        $path = PATHDEFAULT . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'view'. DIRECTORY_SEPARATOR .$path_view.'View.php';
        if (file_exists($path)) {
            require "$path";
        }
        return $this;
    }

    public function back($data) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        return $this;
    }

    public function with($array) {
        foreach ($array as $key => $value) {
            $_SESSION[$key] = $value;
        }
        return $this;
    }

    public function redirect($name) {
        header('Location: ' . $name);
        return $this;
    }
}