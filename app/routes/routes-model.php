<?php

include ('../app/middleware/route-middleware.php');

class Routes
{
    private $routes = array();

    public function Create($route, $file, $auth_rute)
    {
        $array = array('route'=>$route, 'file'=>$file, 'auth'=>$auth_rute);
        array_push($this->routes, $array);
    }

    public function GetRoute($routeS)
    {
        $find = '404';
        foreach ($this->routes as $route) {
            if ($route['route'] === $routeS) {
                $find = $route;
                break;
            }
        }

        if($find === '404')
        {
            return $find;
        }

        $correct_route = true;
        $middleware = new routes_middleware();
        $class = 'routes_middleware';

        if($find['auth'] != null)
        {
            for ($i=0; $i < count($find['auth']); $i++) {
                $method = $find['auth'][$i];
                if(call_user_func([$middleware, $method]) == false)
                {
                    $correct_route = false;
                    $find = '403';
                    break;
                }
           }
        }

        return $find;
    }
}

?>