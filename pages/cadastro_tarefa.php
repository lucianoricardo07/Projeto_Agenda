<?php
include '../config/conexao.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $usuario_id = $_SESSION['usuario_id'];


    $sql = "INSERT INTO tarefas (descricao, data, horario, usuario_id) VALUES ('$descricao', '$data', '$horario', $usuario_id)";
    if ($conn->query($sql) === TRUE) {
        header("Location: home.php");
    } else {
        $erro = "Erro ao cadastrar a tarefa: " . $conn->error;
    }
}
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
            <?php if (isset($erro)) echo "<p class='text-danger'>$erro</p>"; ?>
            <form class='form-login' method="POST" action="">
                <h2>Cadastrar Tarefa</h2>
                <div class="form-group">
                    <label>Descrição</label>
                    <input type="text" name="descricao" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label>Data</label>
                    <input type="date" name="data" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label>Horário</label>
                    <input type="time" name="horario" class="form-control" required>
                </div>
                </br>
                <button type="submit" class="cadastrar btn">Cadastrar</button>
                <button type="Reset" class="limpar btn">Limpar</button>
                <button type="Cancelar" class="voltar btn" onclick="javascript:window.location='home.php'">Voltar</button>
            </form>
        </div>
    </div>

    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>
</div>
</body>
</html>