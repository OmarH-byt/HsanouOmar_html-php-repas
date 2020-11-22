<?php
define('USUARIO', 'root');
define('CONTRA', '');
define('HOST', 'localhost');
define('DATABASE', 'omar');
 
try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USUARIO, CONTRA);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>