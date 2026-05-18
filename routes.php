<?php

// This makes it so that the router variable is available in this file, and we can use it to define our routes.

/** @var mixed $router */

// $router->get('/', 'controllers/home.php');
// $router->get('/listings', 'controllers/listings/index.php');
// $router->get('/listing', 'controllers/listings/show.php');
// $router->get('/listings/create', 'controllers/listings/create.php');

$router->get('/', 'HomeController@index');
$router->get('/listings', 'ListingController@index');
$router->get('/listings/create', 'ListingController@create');
$router->get('/listing', 'ListingController@show');
