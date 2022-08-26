<?php
class Route
{
    public static function get($url, $func)
    {   
   
     
        $data = Route::reponParameter($url, $_SERVER['REQUEST_URI']);
        if ($_SERVER['REQUEST_METHOD'] == 'GET' &&  $_SERVER['REQUEST_URI'] == $data['url_check']) {
            // $func(...$data['params']);
            $class = new $func[0];
            $func = $func[1];
            $class->$func(...$data['params']);
            die();
        }
    }

    public static function post($url, $func)
    {

        $data = Route::reponParameter($url, $_SERVER['REQUEST_URI']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == $data['url_check']) {
            // $func($request = $_POST, ...$data['params']);
            $class = new $func[0];
            $func = $func[1];
            $class->$func($request = $_POST,...$data['params']);
            die();
        }
    }

    public function reponParameter($url, $url_server){
        
        $arr_url_params = explode('/{', $url);
        $arr_url_server = explode('/', $url_server);
        
        $data = [
            'params' => [],
            'url_check' => ''
        ];
        $data['url_check'] = $url;  
        if(count($arr_url_params) > 1) {
            $data['url_check'] = $arr_url_params[0];
            unset($arr_url_params[0]);
            $arr_url_server = array_reverse($arr_url_server);
            if(count($arr_url_server) < count($arr_url_params)) {
                die("Lỗi rồi em ơi");
            }
            foreach ($arr_url_params as $key => $value) {
                $data['params'][] = $arr_url_server[$key - 1];
            }
            $data['params'] = array_reverse($data['params']);
            $data['url_check'] = $data['url_check'].'/'.implode('/', $data['params']);
        }
        return $data;
    }
}
