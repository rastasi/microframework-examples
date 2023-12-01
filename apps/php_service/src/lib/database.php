<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
   "driver" => env("DATABASE_ENGINE", "mysql"),
   "host" => env("DATABASE_HOST", "mysql"),
   "database" => env("DATABASE_NAME", "mysql"),
   "username" => env("DATABASE_USER", "root"),
   "password" => env("DATABASE_PASSWORD", "toor"),
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();