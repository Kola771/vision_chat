<?php

class Router {
    protected $routes = [];
    protected $parametres = [];

    public function add($url, $param = []) {
        $route = preg_replace("/\//", "\/", $url);
        $route = preg_replace("/\{([a-z-]+)\}/", "(?'\\1'[a-z-]+)", $route);
        $route = preg_replace("/\{([a-z-]+):([^\}]+)\}/", "(?'\\1'\\2)", $route);

        $route = "/^" . $route . "\$/i";

        $this->routes[$route] = $param;
    }

    public function explode($url) {
        if(preg_match("/&/i", $url, $matches)) {
            $url = explode("&", $url);
            $url = $url[0];
            return $url;
        } else {
            return $url;
        }
    }
    
    public function match($url) {
        $url = $this->explode($url);
        foreach ($this->routes as $route => $params) {
            if(preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if(is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->parametres = $params;
                return true;
            }
        }
        return false;
    }

    public function convertToPascalCase($url) {
        return preg_replace("/-/", "", ucwords($url, "-"));
    }

    public function convertToCamelCase($url) {
        return lcfirst($this->convertToPascalCase($url));
    }

    public function autoload($classname) {
        return spl_autoload_register(function($classname) {
            $root = "../App/Controllers";
            $file = $root . "/$classname" . ".php";
            if(is_readable($file)) {
                require ("../App/Controllers/" . $classname . ".php");
            } else {
                header("Location:/error/page-error");
                exit();
            }
        } 
        );
    }


    public function dispatch($url) {
        if($this->match($url)) {
            $controller = $this->parametres["controller"];
            $controller = $this->convertToPascalCase($controller);
            if($this->autoload($controller)) {
                $controller_object = new $controller();
                $action = $this->parametres["action"];
                $action = $this->convertToCamelCase($action);
                
                if(method_exists($controller, $action)) {
                        $controller_object->$action();
                } else {
                   echo "La page que vous recherchez n'existe pas. Veuillez revoir le chemin que vous avez entré:";
                   exit();
                }
            } else {
                header("Location:/error/page-error");
                exit();
            }
        } else {
            header("Location:/error/page-error");
            exit();
        }
    }

    public function getadd() {
        return $this->routes;
    }

    public function getmatch() {
        return $this->parametres;
    }
}

?>