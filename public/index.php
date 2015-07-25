<?php
ini_set('display_errors', 1);
define('BASE_DIR', __DIR__ . "/..");
require BASE_DIR . '/vendor/autoload.php';

// Slim application instance
$app = new \Slim\Slim(array(
    'view' => new \Slim\Views\Twig(),
    'templates.path' => BASE_DIR . '/app/views/'
));
$app->setName('gumaz/slim-base-mvc-json');

// Handling 404 error
$app->notFound(function () use ($app) {
    $message = [ 'message' => 'My custom error message!' ];
    $app->render('not-found.html', $message);
});

// Automatically load router files
$routers = glob(BASE_DIR . '/routers/*.router.php');
foreach ($routers as $router) {
    require $router;
}

$app->run();