<?php

require_once "Classes/Config/Settings.php";
require_once "Classes/Helpers/TextFormatter.php";
require_once "Classes/Interfaces/Deliverable.php";
require_once "Classes/Models/Client.php";
require_once "Classes/Models/Courier.php";
require_once "Classes/Models/User.php";
require_once "Classes/Traits/LoggerTrait.php";

use Classes\Config\Settings;
use Classes\Helpers\TextFormatter;
use Classes\Interfaces\Deliverable;
use Classes\Models\Client;
use Classes\Models\Courier;
use Classes\Models\User;
use Classes\Traits\LoggerTrait;

$client = new Client("lis", "lis@mail.com", "Geniev-street 41");
$courier = new Courier("fill", "fill@mail.com", "Bi-street 28");

//echo $client->getName() . PHP_EOL;
$client->deliver($client->adres);
$courier->deliver($courier->adres);
echo $client->setName(TextFormatter::formatName($client->getName()));
echo "Client name: {$client->getName()}";

echo "Country: " . Settings::DEFAULT_COUNTRY . PHP_EOL;



