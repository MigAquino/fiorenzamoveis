<?php
    if (isset($_POST['submit'])){

        include_once('conexao.php');
        
    
        $nome  = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $result = mysqli_query($mysqli, "INSERT INTO usuarios(nome,email,senha) 
        VALUES ('$nome','$email','$senha')");
        $mysqli->close();
        header("location: index.php"); 
    }
    


?> 

<htmL> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
        <link rel="stylesheet" href="css/cadastro2.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
    </head>
    <body>
        <img src="img/logo2.png" alt="Logo" id="image-logo">
        <div class="login-form">
        <h1>Faça Seu Cadastro:</h1>
            <form method="POST" action=""> 
                <label for="nome" class="content"></label> 
                <input type="text" name="nome" id="nome" class="inpuUser" required placeholder="Nome">
                <br> 
                <label for="email" class="content"></label> 
                <input type="text" name="email" id="email" class="inpuUser" required placeholder="Email">
                <br> 
                <label for="senha" class="content"></label> 
                <input type="password" name="senha" id="senha" class="inpuUser" required placeholder="Senha">
                <br>
                <input type="submit" type="reset" name="submit" id="submit">
                <input type="reset" id="submit2">
                <p>Já tem uma conta? <a href="index.php">Faça login</a></p>
            </form>  
    </body>
</html> 