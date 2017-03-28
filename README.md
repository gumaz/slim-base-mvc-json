# slim-base-mvc-json
Base setup for Slim MVC with a class for simple and fast JSON response,
Laravel's Eloquent ORM as Model and Twig PHP template engine as View.

### Features
* Simple MVC implementation with namespaces and psr-4 autoload
* JSON response with HTTP status code handling resource data and success or error messages
* Clean project structure with separated public folder

### Install
Simply clone or download this repo and install with Composer

### Configuration
Import `database.sql` into your MySQL database then
edit `app/database/config.php` with your database config

### How it works
This base implementation contains little example code to make you understand how the components
works togheter. When adding models and controllers be sure to set the appropriate namespace.

##### Models
Put your models in `app/models` following the pre-existing. Laravel's Eloquent is used so you can refer to [http://laravel.com/docs/eloquent](http://laravel.com/docs/eloquent).
The example already contains
* `Users.php` - the model of the `users` database table with some user informations
* `Messages.php` - the model of the `messages` database table with message title and body and user's foreign key

##### Controllers
Put your controllers in `app/controllers`. You can access the Slim instance provided by `BaseController` using `$this->app` in your class.
The example already contains
* `MessageController.php` - the standard methods for displaying resource details

##### Views
Put your views in `app/views` following the pre-existing
* `home.html` - the home view
* `not-found.html` - custom view rendered by `$app->notFound()`. Displays an error message passed as parameter using Twig

##### Routes
Put your routers in `routers/` and name it like `someName.router.php`

Route to controller

    $app->get('/', 'Controller\MyBeautifulController:someMethod');

##### Run
Just test the app with two existing public routes
* `/messages` - returns the list of all messages
* `/messages/:id` - returns a message details with author informations

### JSON Response
The class `include/Response.php` is responsible for sending a JSON output.
You just have to call one of its three methods

    $messages = Message::all();
    return Response::jsonResponse(200,$messages);
to easy return your data

    return Response::respondWithError(404,"Message not found");
to easy return an error message

    return Response::respondWithSuccess(201,"Resource created with success");
to easy return a success message
