<?php
include './core/Controller.php';
include './core/DB.php';
include './core/Route.php';
new Route($_SERVER['REQUEST_URI']);

