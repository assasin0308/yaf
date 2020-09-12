<?php
ini_set('display_errors',1);

/* 定义这个常量是为了在application.ini中引用*/
define('APPLICATION_PATH', dirname(__FILE__));

$application = new Yaf_Application( APPLICATION_PATH . "/conf/application.ini");

// 使用命名空间
// $application = new Yaf\Application( APPLICATION_PATH . "/conf/application.ini");

$application->bootstrap()->run();
?>
