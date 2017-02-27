<?php
function __autoload($class) {

    preg_match_all('/[A-Z][^A-Z]*/', $class, $results);
    $results =  end($results[0]);
    $pathToClassFile = __DIR__ . '/../'. strtolower($results). '/' . $class.'.php';
    if (file_exists($pathToClassFile)) {
        require_once $pathToClassFile;
    }
}


ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(E_ALL);

return [
    'layout' => 'layout',
    'exceptionController' => 'error',
    'exceptionAction' => 'error',
    'title' => "User Registration",
    'db' => [
        'host' => 'localhost',
        'name' => 'registration',
        'user' => 'root',
        'password' => ''
    ]
];