<?php
class Routes
{
    private $routes = array();

    public function Create($route, $file)
    {
        $array = array('route'=>$route, 'file'=>$file);
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
        return $find;
    }
}

?>