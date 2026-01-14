<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Payment routes
$router->post('/payments', 'PaymentController@processPayment');
$router->get('/payments/{id}', 'PaymentController@getPayment');
$router->get('/payments/order/{orderId}', 'PaymentController@getPaymentsByOrder');
$router->post('/payments/{id}/refund', 'PaymentController@processRefund');
$router->get('/payments/user/{userId}', 'PaymentController@getPaymentsByUser');
