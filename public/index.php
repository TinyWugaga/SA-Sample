<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\ServerRequestCreatorFactory;
use App\ResponseEmitter;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/_bootstrap.php';

$app->add($response);

// Create Request object from globals
$serverRequestCreator = ServerRequestCreatorFactory::create();
$request = $serverRequestCreator->createServerRequestFromGlobals();

// Add Routing Middleware
$app->addRoutingMiddleware();

// Run App & Emit Response
$response = $app->handle($request);
