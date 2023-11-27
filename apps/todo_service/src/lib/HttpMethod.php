<?php

namespace App\Lib;

enum HTTPMethod {
    case OPTIONS;
    case GET;
    case POST;
    case PUT;
    case PATCH;
    case DELETE;
}