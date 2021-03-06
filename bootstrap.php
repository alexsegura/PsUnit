<?php

if (!defined('PRESTASHOP_PATH')) {
	define('PRESTASHOP_PATH', '../prestashop');
}

require_once 'Mockery/Loader.php';
require_once 'Hamcrest/Hamcrest.php';

$loader = new \Mockery\Loader;
$loader->register();

require_once PRESTASHOP_PATH . '/config/autoload.php';

require_once 'classes/PsUnit/MockUtils.php';
require_once 'classes/PsUnit/ReflectionUtils.php';