
<?php

require "../Core/Router.php";
$url = $_SERVER["QUERY_STRING"];

//Instanciation de la class Router
$router = new Router();

//Ajout des formats de routes qu'on accepte
$router->add('', ['controller' => 'Home', 'action' => 'login']);
$router->add("{controller}/{action}");
$router->add("admin/{controller}/{action}");
$router->add("admin/{controller}/{id:\d+}/{action}");
$router->add("{controller}/{id:\d+}/{action}");

// var_dump($router->match($url));
$router->dispatch($url);
// var_dump($router->getmatch($url));

// echo"<pre>";
// var_dump($router->getadd($url));
// echo"</pre>";

?>
