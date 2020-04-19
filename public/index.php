<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../lib/bootstrap.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {

    $response->getBody()->write("HELLO WELCOME TO TEST_WALLET API");

    return $response->withHeader('Content-Type', 'application/json');
});

/* =========================================================================
 * = USERS
 * =========================================================================
**/
$app->get('/users/{id}', function (Request $request, Response $response, $args) {

    $id = $args['id'];

    $result = DB::find('users', $id);

    $response->getBody()->write(json_encode($result));

    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
