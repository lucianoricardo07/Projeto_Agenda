<?php
include '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
    } else {
        $erro = "Erro ao cadastrar o usuário: " . $conn->error;
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
            <h2>Cadastro de Usuário</h2>
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="form-group mt-2">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group mt-2">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            </br>
            <button type="submit" class="cadastrar btn">Cadastrar</button>
            <button type="Reset" class="limpar btn">Limpar</button>
            <button type="Cancelar" class="voltar btn" onclick="javascript:window.location='login.php'">Voltar</button>
        </form>
    </div>
    </div>

      <footer>
        <?php include '../templates/footer.php'; ?>
      </footer>
    </div>
    </body>
    </html>