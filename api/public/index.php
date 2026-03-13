<?php
require_once '../config/database.php';
require_once '../src/Core/response.php';
require_once '../src/Models/Product.php';
require_once '../src/Controllers/ProductController.php';
require_once '../src/Core/Router.php';

Router::handle();
  