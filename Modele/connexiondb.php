<?php
    $server = "localhost";
    $db = "gestion_absance";
    $port = "3306";
    $user = "root";
    $password = "";
    try 
    {
        $conn = new PDO("mysql:host=$server;dbname=$db;port=$port", "$user", "$password");

    } catch ( PDOException $e)
    {
        print_r($e->getMessage());
    }