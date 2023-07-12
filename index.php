<?php

require "routing.php";
require "controllers/user_controller.php";
require "functions/function.php";

session_start();

$controller = new Controller();
$router = new router();
unset($_SESSION['Artist']);
unset($_SESSION['Album']);
$router->get('/','list');
$router->post('/login','login');
$router->post('/logout','logout');
$router->post('/add_music','add_music');
$router->post('/add_artist','add_artist');
$router->post('/music_list','music_list');
$router->post('/artist_list','artist_list');
$router->post('/add_playlist','add_playlist');
$router->post('/add_playlist_album','add_playlist_album');
$router->post('/add_playlist_artist','add_playlist_artist');
$router->post('/request_premium','request_premium');
$router->post('/check_request','check_request');
$router->post('/approve','approve');














$router->routing();