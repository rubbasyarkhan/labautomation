<?php
require_once 'env_loader.php';

try {
    $env = loadEnv('../.env');
    $servername = $env['DB_HOST'];
    $username = $env['DB_USERNAME'];
    $password = $env['DB_PASS'];
    $dbname = $env['DB_NAME'];
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
