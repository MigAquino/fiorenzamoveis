<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['senha'] = $usuario['senha'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<img src="img/logo2.png" alt="Logo" id="image-logo">
<div class="login-form" id="form">
    <form action="" method="POST" >
        <h1>Acesse Sua Conta</h1>
    <div class="content">
        <div class="input-field">
            <input type="text" name="email" placeholder="Email">
        </div>
        <div class="input-field">
            <input type="password" name="senha" placeholder="Senha">
        </div>
    </div>
    <div class="action">
        <button type="submit">Entrar</button>
    </div>
    </form>
    <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
</div>
    <script  src="js/script.js"></script>
</body>
</html>
