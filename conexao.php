<?php
    $host = 'localhost';
    $port="3306";
    $user="root";
    $senha="root";
    $banco="Pessoa";

        try {
        $conn = new PDO("mysql:host=$host;dbname=$banco;charset=utf8", $user, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }
?>