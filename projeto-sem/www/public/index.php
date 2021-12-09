<?php
use Pecee\SimpleRouter\SimpleRouter;

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__.'/../config/route.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

SimpleRouter::start();