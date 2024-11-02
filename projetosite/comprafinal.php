<?php
    session_start();
    $imagem = isset($_GET['imagem']) ? $_GET['imagem'] : '';
    $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="sesao">
<header>
    <div class="logo">
       <img src="img/teicket.png" alt="Logo Ticket Zone">
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="catalogo.php">Catálogo</a></li>
            <li><a href="#">Institucional</a></li>
        </ul>
    </nav>
    <?php
    if(isset($_SESSION["id"])){
        echo '<div class="user-icon">
            <a href="conta.php" style="text-decoration: none;"><img src="img/user-icon.png" alt=""></a> 
        </div>';
    }else{
        echo '<div class="user-icon">
        <a href="login.php" style="text-decoration: none;"><img src="img/user-icon.png" alt=""></a>
        <a href="login.php" style="text-decoration: none;"><span style="color: #FFFFFF;">Entre ou Cadastre-se</span></a>
    </div>';
    }
    ?>
</header>
    <?php
    $contadorI = 0;
    $contadorM = 0;

        echo 'Escolha o tipo de Ingresso: ';

        
        if(isset($_POST['contadorI'])){
            $contadorI = $_POST['contadorI'];

                if(isset($_POST['maisI'])){
                    $contadorI++;
                }elseif(isset($_POST['menosI']) && $contadorI > 0){
                    $contadorI--;
                }
        }

        if(isset($_POST['contadorM'])){
            $contadorM = $_POST['contadorM'];

                if(isset($_POST['maisM'])){
                    $contadorM++;
                }elseif(isset($_POST['menosM']) && $contadorM > 0){
                    $contadorM--;
                }
        }

    ?>
        <form action="#sesao" method="POST">
            <input type="hidden" name="imagem" value="<?php echo ($imagem); ?>">
            <input type="hidden" name="titulo" value="<?php echo ($titulo); ?>">
            
            <!--Inteira-->
            <?php
            echo '<input type="hidden" name="contadorI" value="'.$contadorI.'"/>';
            ?>
            <label> Inteira: </label><br>
            <label> R$30,00 </label>
            <button type="submit" name="menosI">-</button>
            <?php
            echo '<label>'.$contadorI.'</label>';
            ?>
            <button type="submit" name="maisI">+</button><br>
            <!--Inteira-->

            <!--Meia-->
            <?php
            echo '<input type="hidden" name="contadorM" value="'.$contadorM.'"/>';
            ?>
            <label> Meia: </label><br>
            <label> R$15,00 </label>
            <button type="submit" name="menosM">-</button>
            <?php
            echo '<label>'.$contadorM.'</label>';
            ?>
            <button type="submit" name="maisM">+</button>
            <!--Meia-->
        </form>
</div>

        <?php
            echo '<h3>Resumo do pedido</h3>';
            echo '<img src="'.$imagem.'" width="200px" height="300px">';
            echo '<h4>' .$titulo. '</h4>';
            echo '<p>NORMAL</p>';
            echo '<p>DUBLADO</p>';
            echo '<hr>';
            echo 'Ingresso<br>';
            $valorI = 30 * $contadorI;
            if($contadorI >= 1){
                echo ''.$contadorI.'x Inteiro';
                echo '  R$'.$valorI.'<br>';
            }
            $valorM = 15 * $contadorM;
            if($contadorM >= 1){
                echo ''.$contadorM.'x Meia';
                echo '  R$'.$valorM.'<br>';
            }
            $valorTotal = $valorI + $valorM;
            echo '<hr>';
            echo '<p><strong>TOTAL</strong></p>';
            if($valorTotal >= 1){
            echo '<p>R$'.$valorTotal.'</p>';
            }
            
            echo '<a href="catalogo.php"><button>Voltar</button></a>';
            echo '<a href="finalizacao.php?imagem='.$imagem.'&titulo='.$titulo.'&valorTotal='.urlencode($valorTotal).'&valorM='.urlencode($valorM).'&valorI='.urlencode($valorI).'&contadorM'.urlencode($contadorM).'&contadorI='.urlencode($contadorI).'"><button>Finalizar</button></a>';

        ?>
        


<footer class="footer">
    <div class="spacer"></div>
    <div class="FAQ">
        <img src="img/FAQ.png" alt="FAQ" />
        <a href="FAQ.php">FAQ</a>
    </div>
    <div class="cartas-icon">
        <img src="img/cartas.png" alt="Cartas" />
    </div>
</footer>
</body>
</html>
