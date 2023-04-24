<?php
// bootstrap.php

require_once 'database/Database.php';
require_once 'src/business/SneakerService.php';
require_once 'src/business/UserService.php';

$db = Database::getInstance();
$sneakerService = new SneakerService($db);
$userService = new UserService($db);
