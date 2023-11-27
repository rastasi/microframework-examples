<?php

namespace App\Lib;

use Slim\Factory\AppFactory;
use Slim\App;

class HTTPServer {

    private App $app;

    public function __construct()
    {
        $this->app = AppFactory::create(); 
    }

    public function addMiddleware(string $path, $handler)
    {
        $this->app->add($handler);
    }

    public function addRoute(HttpMethod $method, string $path, $handler)
    {
        switch($method) {
            case HttpMethod::OPTIONS:
                  $this->app->options($path, $handler);
                  break;
            case HttpMethod::GET:
                  $this->app->get($path, $handler);
                  break;
            case HttpMethod::POST:
                  $this->app->post($path, $handler);
                  break;
            case HttpMethod::PUT:
                  $this->app->put($path, $handler);
                  break;
            case HttpMethod::PATCH:
                  $this->app->patch($path, $handler);
                  break;
            case HttpMethod::DELETE:
                  $this->app->delete($path, $handler);
                  break;
        }
    }

    public function run() {
        $this->app->run();
    }

}