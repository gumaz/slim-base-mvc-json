<?php
/**
 * Public routes
 */

$app->get('/', function () use ($app) {
    $app->render('home.html');
});

$app->get('/messages', 'Controller\MessageController:index');

$app->get('/messages/:id', 'Controller\MessageController:show');