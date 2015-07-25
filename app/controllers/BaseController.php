<?php

namespace Controller;

class BaseController {

    /**
     * @var Slim\Slim
     */
    protected $app;

    public function __construct()
    {
        $this->app = \Slim\Slim::getInstance();
    }
}