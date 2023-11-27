<?php

namespace App\Lib;

enum HttpMethod {
    case OPTIONS;
    case GET;
    case POST;
    case PUT;
    case PATCH;
    case DELETE;
}