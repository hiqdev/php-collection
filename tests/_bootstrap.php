<?php

/// ensure we get report on all possible php errors
error_reporting(-1);

$_SERVER['SCRIPT_NAME']     = '/' . __DIR__;
$_SERVER['SCRIPT_FILENAME'] = __FILE__;
$loader = require_once(__DIR__ . '/../vendor/autoload.php');
$loader->add('tests\\', __DIR__ . '/../');

