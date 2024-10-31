<?php
include '../config/conexao.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$sql = "SELECT t.id, t.descricao, DATE_FORMAT(t.data, '%d/%m/%Y') AS data, DATE_FORMAT(t.horario, '%H:%i') AS horario, u.email FROM tarefas t, usuarios u WHERE t.usuario_id= u.id and t.usuario_id = $usuario_id order by data asc";
$tarefas = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include '../templates/head.php'; ?>
<body>
<div class="wrapper">
    <header>
        <?php include '../templates/header.php'; ?>
    </header>
    <div class="content">
        <div class="container">
        
            <h2>Agenda</h2>
            <a href="cadastro_tarefa.php" class="cadtarefa btn mb-3">Cadastrar Nova Tarefa</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Descrição</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($tarefa = $tarefas->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $tarefa['id']; ?></td>
                            <td><?php echo $tarefa['data']; ?></td>
                            <td><?php echo $tarefa['horario']; ?></td>
                            <td><?php echo $tarefa['descricao']; ?></td>
                            <td><?php echo $tarefa['email']; ?></td>
                            <td>
                                <a href="editar_tarefa.php?id=<?php echo $tarefa['id']; ?>" class="editar btn">Editar</a>
                                <a href="excluir_tarefa.php?id=<?php echo $tarefa['id']; ?>" class="excluir btn">Excluir</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>
</div>
</body>
</html>

