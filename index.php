<?php

require ("routing.php");
require ("controllers/userController.php");
require ("functions/function.php");

session_start();

$controller = new Controller();
$router = new router();

$router->get('/','list');
$router->post('/login','login');
$router->post('/logout','logout');
$router->post('/add_music','add_music');
$router->post('/add_artist','add_artist');



$router->routing();