<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Controller\ZooController;

$controller = new ZooController();
$controller->run();
