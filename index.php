<?php

require_once "functions.php";
require_once "Database.php";
require_once "Validator.php";

$config = require "config.php";
$db = new Database($config["database"]);

require "router.php";