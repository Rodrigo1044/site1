<?php
    $imagem = isset($_GET['imagem']) ? $_GET['imagem'] : '';
    $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : '';
    $valorI = isset($_GET['valorI']) ? $_GET['valorI'] : 0; 
    $valorM = isset($_GET['valorM']) ? $_GET['valorM'] : 0;
    $contadorM = isset($_GET['contadorM']) ? $_GET['contadorM'] : 0;
    $contadorI = isset($_GET['contadorI']) ? $_GET['contadorI'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

    <form action="" method="GET">
        <!-- Preservando valores ao selecionar "Crédito" ou "Débito" -->
        <input type="hidden" name="imagem" value="<?php echo htmlspecialchars($imagem); ?>">
        <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>">
        <input type="hidden" name="valorI" value="<?php echo htmlspecialchars($valorI); ?>">
        <input type="hidden" name="valorM" value="<?php echo htmlspecialchars($valorM); ?>">
        <input type="hidden" name="contadorI" value="<?php echo htmlspecialchars($contadorI); ?>">
        <input type="hidden" name="contadorM" value="<?php echo htmlspecialchars($contadorM); ?>">
        
        <button type="submit" name="aba" value="Crédito">Crédito</button>
        <button type="submit" name="aba" value="Débito">Débito</button>
    </form>

    <?php
        if(isset($_GET['aba'])){
            $abacartao = $_GET['aba'];
            
            if($abacartao == 'Crédito'){
                    echo '<form action="" method="POST">
                        <input type="number" name="cartao" placeholder="Número Cartão"><br>
                        <input type="number" name="validade" placeholder="Data de validade"><br>
                        <input type="number" name="CVV" placeholder="CVV"><br>
                        <input type="text" name="titular" placeholder="Nome do Titular">
                    </form>';
            }elseif($abacartao == 'Débito'){
                    echo '<form action="" method="POST">
                        <input type="number" name="cartao" placeholder="Número Cartão"><br>
                        <input type="number" name="validade" placeholder="Data de validade"><br>
                        <input type="number" name="CVV" placeholder="CVV"><br>
                        <input type="text" name="titular" placeholder="Nome do Titular">
                    </form>';

            }
        }

        echo '<h3>Resumo do pedido</h3>';
        echo '<img src="'.$imagem.'" width="200px" height="300px">';
        echo '<h4>' .$titulo. '</h4>';
        echo '<p>NORMAL</p>';
        echo '<p>DUBLADO</p>';
        echo '<hr>';
        echo 'Ingresso<br>';
        echo ''.$contadorI.'X Inteira R$'.$valorI.'<br>';
        echo ''.$contadorM.'X Meia R$'.$valorM.'';
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
</header>
</body>
</html>
