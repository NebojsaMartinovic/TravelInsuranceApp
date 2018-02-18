<?php

session_start();

$GLOBALS['config'] = array(
    'DB' => array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => 'root',
        'dbname' => 'otinsurance'
    )

);

define('APPROOT', dirname(dirname(__FILE__)));

define('URLROOT', 'http://localhost:8888/onlinetravelinsurance');
