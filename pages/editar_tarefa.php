<?php
include '../config/conexao.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM tarefas WHERE id = $id";
$tarefa = $conn->query($sql)->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $sql = "UPDATE tarefas SET descricao = '$descricao', data = '$data', horario = '$horario' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: home.php");
    } else {
        $erro = "Erro ao editar a tarefa: " . $conn->error;
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
                <h2>Editar Tarefa</h2>
                <div class="form-group">
                    <label>Descrição</label>
                    <input type="text" name="descricao" class="form-control" value="<?php echo $tarefa['descricao']; ?>" required>
                </div>
                <div class="form-group mt-2">
                    <label>Data</label>
                    <input type="date" name="data" class="form-control" value="<?php echo $tarefa['data']; ?>" required>
                </div>
                <div class="form-group mt-2">
                    <label>Horário</label>
                    <input type="time" name="horario" class="form-control" value="<?php echo $tarefa['horario']; ?>" required>
                </div>
                </br>
                <button type="submit" class="btn btn-primary">Salvar</button>
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
