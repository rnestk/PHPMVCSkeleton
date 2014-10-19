<?php

/**
 * 
 * Author: Piotr Ernest Klimaszewski
 * Email: rnestk@interia.pl
 * Copyright: Piotr Ernest Klimaszewski
 * Aplikacja jest udostępniana jako dodatek do CV.
 * Może być kopiowana lub modyfikowana wyłącznie w celach rekrutacyjnych.
 * 
 */

/* PHPMVCSkeleton's MySQLi extension works only with MySQL version 4.1.13 or newer.
 * Due to the use namespaces PHP 5.3.0 or later is required.
 */

if (version_compare(PHP_VERSION, '5.3.0') < 0) {
    echo 'PHP version newer than 5.3.0 require.</br>';
    echo 'Your version of PHP is ' . PHP_VERSION . '.</br>';
    echo 'Application has been terminated.';
    exit;
}

require 'app/loader.php';

$app = new app\lib\Application();
$app->run();

