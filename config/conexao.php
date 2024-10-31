<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agenda";

// Criando conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
