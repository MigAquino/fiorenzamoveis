<?php

include('conexao.php');

if(!isset($_SESSION)) {
    session_start();
}




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<!-- Meta tags Obrigatórias -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv= “refresh” content=”3; URL=’ produto.php/ ‘ “/>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" >

<!--CSS Nosso-->
<link rel="stylesheet" href="css/1.css">

<!--Menu-->
<link rel="stylesheet" type="text/css" href="css/estilo.css">

<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


<title>Fiorenza Móveis</title>
</head>
<body>

<div class="main">

    <nav class="nav-bar">
        <nav class="nav-list">
            <ul>
                <li>Whatsapp:+55 21 96980-9913</li>
                <li>Telefone:+55 21 96980-9913</li>
            </ul>
        </nav>
    </nav>
    <div class="Top">
            <div class="navDiv">
            <div class="btnAbre"><span class="material-symbols-outlined">menu</span></div>
            <nav class="menu">
                            <div class="titulo">Menu<span class="material-symbols-outlined btnFecha" >close</span></div>
                                    <ul>
                                        <li><a class="quarto" href="painel.php">Painel<span class="material-symbols-outlined seta1">
                                            arrow_right
                                            </a>
                                      

                                        
                                       

                           
                                    </div>
                            </ul>
                            </nav>
                            <div class="navDiv" id="logoDiv">
                                <label class="logo"><img src="img/fiorenza.png"></label>
                            </div>
                            <div class="navDiv">
                                <div class="navDiv searchDiv">
                                    <input type="text" class="search-text" placeholder="Pesquisar...">
                                    <div class="btn2">
                                        <a href="#">
                                            <img class="lupa" src="img/lupa.png">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="navDiv buttons">

                            <div class="iconsDiv">
                                <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="carrinho2" src="img/carrinho.png">
                                </a>
                                <div class="dropdown-menu" name="tabela" aria-labelledby="dropdownMenuLink">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Foto</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        

                                        $sql_item_carrinho = "SELECT * FROM item_pedido i INNER JOIN moveis m on  i.idMovel = m.idmovel  
                                                            where idPedido IS NULL and idUsuario =".$_SESSION['id'].";";

                                        $sql_item_soma = "SELECT sum(preco) as soma FROM item_pedido i INNER JOIN moveis m on  i.idMovel = m.idmovel  
                                                            where idPedido IS NULL and idUsuario =".$_SESSION['id'].";";
                                        
                                        $result_carrinho = $mysqli->query($sql_item_carrinho);
                                        $result_soma = $mysqli->query($sql_item_soma);

                                        echo " <form method=POST action=produto.php>";
                                            echo"<tr>";
                                        while($dadoitem = mysqli_fetch_assoc($result_carrinho))
                                            {
                                                echo "<tr>";
                                                echo "<td>".$dadoitem['Nome']."</td>";
                                                echo "<td>".$dadoitem['preco']."</td>";
                                                echo "<td>"."<img class=imagemprods src=".$dadoitem['EndImagem'].">"."</td>";
                                                echo "</tr>";

                                            }
                                            $dadosoma = mysqli_fetch_assoc($result_soma);
                                            $soma = $dadosoma['soma'];
                                            echo "<td>"."<label >"." Total = ".$soma."</label>"."</td>" ;
                                            echo "<input type=hidden name=soma id=soma value=".$soma.">";
                                            echo "<td>"."</td>";  
                                            echo "<td>"."<input type=submit name=submitPedido value=Enviar>"."</td>";
                                            echo "</tr>";
                                            echo "</form>";
                                    ?>
                                    </tbody>
                                    </table>
                                                                                                                
                                </div>
                            </div>    
                                <div class="iconsDiv">
                                <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="imgconta" src="img/conta.png">
                                </a>
                                            
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-item"><?php
                                        $nome = $_SESSION['nome'];
                                        echo($nome);
                                    ?></div>
                                    <div class="dropdown-item"><?php
                                        $email = $_SESSION['email'];
                                        echo($email); 
                                    ?></div>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                                        
                            </div>
                                </div>
            
        </div>
                                    
    </div>


<div class="baixo1">

<div class="banner">
    <img class="banner1" src="img/banner2.png">
</div>

<?php
 $idUsuario = $_SESSION['id'];

    $sql_query = "SELECT * FROM moveis";
    $result = $mysqli->query($sql_query);
    
    
?>
        <div class="produtosmain">
            
                <?php
                if(isset($idUsuario)){
                    $sql_Pedidos = "SELECT * FROM pedido p inner join item_pedido i on p.idPedido =  i.idPedido 
                    inner join moveis m on i.idMovel = m.idmovel WHERE p.idUsuario = $idUsuario";
                    $resultPedidos =  $mysqli->query($sql_Pedidos); 
                ?>

                
                <table class="table" >
                                    <thead>
                                        <td colspan = 5 style="text-align:center; font-size: 30px;">Pedidos</td>
                                        <tr>
                                        <th scope="col">Móvel</th>
                                        <th scope="col">imagem</th>
                                        <th scope="col">Preço</object></th>
                                        <th scope="col">Codigo pedido</th>
                                        <th scope="col">Valor do Pedido</th>
                                        </tr>
                                    </thead>
                <tbody> 
                <?php
                        while($dadoPedidos = mysqli_fetch_assoc($resultPedidos))
                            {
                            echo "<tr>";
                            echo "<td>".$dadoPedidos['Nome']."</td>";
                            echo "<td>"."<img class=imagemprods src=".$dadoPedidos['EndImagem'].">"."</td>";
                            echo "<td>".$dadoPedidos['preco']."</td>";
                            echo "<td>".$dadoPedidos['idPedido']."</td>";
                            echo "<td>".$dadoPedidos['valorPedido']."</td>";
                            echo "</tr>";

                                        }
                                        }     
                    ?>           
                </tbody>
                </table>
        </div>
</div>                                   
</div>  




<!-- JavaScript (Opcional) -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="js/bootstrap.min.js" ></script>
<script src="js/script1.js"></script>
</body>
</html>