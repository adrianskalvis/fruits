<?php

$uri = parse_url($_SERVER['REQUEST_URI']);

    $routes = require "routes.php";

    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    }
    else {
        http_response_code(404);
        echo "controllers/404.php";
        die();
    }