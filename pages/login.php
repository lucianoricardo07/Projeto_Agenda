<?php
session_start(); // A sessão deve ser iniciada no topo
include '../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara a consulta para evitar SQL Injection
    $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Armazena o ID e o nome do usuário na sessão
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome']; // Nome armazenado

        header("Location: home.php");
        exit();
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>

<html>
<?php
include '../templates/head.php';
?>    

<body>
<div class="wrapper">
    <header>
        <?php include '../templates/header.php'; ?>
    </header>
    <div class="content">
        <div class="container">
            <form class='form-login' method="POST" action="">
                <h2>Acesse sua Agenda:</h2>
                <?php if (isset($erro)) echo "<p class='text-danger'>$erro</p>"; ?>
                <div class="form-group mb-2">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                </div>
                </br>
                <button type="submit" class="entrar btn">Entrar</button>
                <button type="Reset" class="limpar btn">Limpar</button>
                </br>   
                <a href="cadastro_usuario.php">Ainda não tem conta? Cadastre-se</a>
            </form>
        </div>
    </div>

    <footer>
        <?php include '../templates/footer.php'; ?>
    </footer>
</div>
</body>
</html>