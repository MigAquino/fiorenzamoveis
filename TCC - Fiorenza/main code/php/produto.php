<! DOCTYPE html>

<html>

<head>

        

</head>

<body>

   
<?php
            include('conexao.php');
            if(!isset($_SESSION['id'])){
                session_start();
            }

            $idUsuario = $_SESSION['id'];

            if (isset($_POST['submitPedido'])){
                                                    
                $soma = $_POST['soma'];                               
                
                $resultPedido = mysqli_query($mysqli, "INSERT INTO Pedido(idUsuario,valorPedido) 
                VALUES ('$idUsuario','$soma')");

                $idPedido = mysqli_insert_id($mysqli);
                                                
                // $sql_item_carrinho = "SELECT * FROM item_pedido i INNER JOIN moveis m on  i.idMovel = m.idmovel  
                // where idPedido IS NULL and idUsuario =".$idUsuario.";";
                // $result_carrinho = $mysqli->query($sql_item_carrinho);

                $sqlup = "UPDATE item_pedido SET idPedido ='$idPedido' WHERE idUsuario= $idUsuario AND idPedido IS NULL";
                
                //mysqli_query($mysqli, "UPDATE item_pedido SET idPedido =$idPedido where idUsuario =$idUsuario AND idPedido IS NULL;"); 

                if (mysqli_query($mysqli, $sqlup)){
                    echo "  <script>".
                            "alert('Pedido finalizado com sucesso!;');".   
                            "window.location.replace('painel.php');".
                            "</script>";
                  }else{
                    echo "  <script>".
                    "alert('Pedido não finalizado!;');".   
                    "window.location.replace('painel.php');".
                    "</script>";
                  }

                
               

            }

            if (isset($_POST['submit'])){
                                          
                             
                $idmovel  = $_POST['idmovel'];
                $preco = $_POST['precoh'];

                                
                $result1 = mysqli_query($mysqli, "INSERT INTO item_pedido(idmovel, valorMovel, idUsuario) 
                VALUES ('$idmovel','$preco','$idUsuario')");

                echo "<script>".
                "alert('Item adicionado no carrinho!');".   
                "window.location.replace('painel.php');".
                "</script>";

                
            } 

            
        ?>


</head>
<body>



</body>

</html>