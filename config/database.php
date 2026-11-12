<?php
// Use Railway environment variables in production, fallback to localhost for development
define('DB_HOST', getenv('MYSQLHOST')     ?: 'localhost');
define('DB_USER', getenv('MYSQLUSER')     ?: 'root');
define('DB_PASS', getenv('MYSQLPASSWORD') ?: '');
// Railway uses 'railway' as default DB name, local uses 'astrojyoti'
define('DB_NAME', getenv('MYSQLDATABASE') ?: 'astrojyoti');
define('DB_PORT', getenv('MYSQLPORT')     ?: 3306);

function getDB() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, (int)DB_PORT);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $conn->set_charset("utf8mb4");
    return $conn;
}
?>

