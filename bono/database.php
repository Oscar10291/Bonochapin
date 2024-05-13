<?php  
    $server = 'localhost';
    $username = 'root';
    $password =  '';
    $database = 'php_bono';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    }   catch (PDOException $e) {
        die ('Could not connect to: ' . $e->getMessage());
    }
?>
