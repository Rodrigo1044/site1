<?php
    
    /*esse função ira verificar se a sessão ja foi iniciada
    O PHP_SESSION_NONE Irá ver se ha uma sessão ativa, caso não tenha ele ira iniciar uma*/
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Zone</title>
    <link rel="shortcut icon" type="imagem/png" href="img/bora.png">
    <style>
        body {
        font-family: Arial, sans-serif;
        margin: 0;
        background-color: #000000;
        color: #ffffff;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #000000; 
            padding: 10px 20px;
        }

        .footer {
            display: flex;
            align-items: center;          
            justify-content: space-between;
            padding: 10px 20px;          
            width: 100%;
            box-sizing: border-box;
        }

        .FAQ, .cartas-icon {
            display: flex;
            align-items: center;
        }

        .FAQ img, .cartas-icon img {
            width: 90px;
            height: 90px;
            object-fit: cover;
        }

        .logo img {
            height: 60px; 
            width: auto;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        nav ul li a {
            color: #FFFFFF;
            text-decoration: none;
            font-size: 1rem;
        }

        nav ul li a:hover {
            color: #f0f0f0; 
        }

        .user-icon {
            display: flex;
            align-items: center; 
            gap: 5px;   
        }

        .user-icon img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .user-icon span {
            color: #FFFFFF; 
            font-size: 1rem; 
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .login-button {
            border: 1px solid #FFFFFF;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .title-image {
            text-align: center; 
            margin-bottom: 20px; /* Espaço abaixo da imagem */
        }

        .title-image img {
            max-width: 100%; 
            height: auto; 
            width: 600%; 
        }

        .banner {
            background-color: #d9d9d9;
            color: #000000;
            padding: 0; 
            display: flex;
            justify-content: space-between;
            align-items: stretch; 
        }

        .banner-content {
            max-width: 500px; 
            text-align: center; 
            margin-right: 20px; 
            margin-left: auto; 
            margin-right: auto; 
            font-size: 1.4rem; 
            line-height: 1.6; 
            color: #000000; 
        }

        .banner-content p {
            font-size: 1rem;
            line-height: 1.6;
            margin-top: 10px;
        }


        .banner-content h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #490000; 
            text-shadow: 2px 2px #000; 
            text-align: center; 
        }


        .coringa-image {
            height: 900px; 
            overflow: hidden;
            margin: 0; 
            padding: 0; 
        }

        .coringa-image img {
            height: 100%; 
            width: auto; 
            max-width: none;
            margin: 0; 
        }

        footer {
            background-color: #000;
            color: #FFFFFF;
            text-align: center;
            padding: 10px 0;
            margin: 0; 
            width: 100%; 
        }


        .footer-links a {
            color: #FFFFFF;
            text-decoration: none;
            margin: 0 15px;
        }

        .footer-links a:hover {
            text-decoration: underline;
}
    </style>
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
</header>
    <main>
    <section class="banner">
    <div class="banner-content">
    <div class="title-image">
        <img src="img/lago.png" alt="Logo Ticket Zone">
    </div>
     <?php
            echo "O Ticket Zone é um site desenvolvido como projeto universitário por estudantes da Faculdade UNICID, com o objetivo de criar uma plataforma para compra e venda de ingressos de maneira prática e intuitiva. Idealizado por uma turma do curso de Tecnologia da Informação, o site oferece uma experiência de navegação simples e eficiente, onde usuários podem acessar, visualizar e comprar ingressos para uma variedade de eventos, desde shows e festas até espetáculos culturais."
        ?>
 </div>
         <div class="coringa-image">
            <img src="img/coringab.png" alt="Imagem do Coringa">
        </div>
    </section>
</main>

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
