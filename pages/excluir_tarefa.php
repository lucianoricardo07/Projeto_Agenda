<?php
include '../config/conexao.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$sql = "DELETE FROM tarefas WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header("Location: home.php");
} else {
    echo "Erro ao excluir a tarefa: " . $conn->error;
}
?>
