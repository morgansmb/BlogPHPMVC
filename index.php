<?php

session_start();

require_once (__DIR__.'/config/config.php');

require_once (__DIR__.'/config/Autoload.php');
Autoload::charger();

$admin;
new FrontController();
