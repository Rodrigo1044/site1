<?php
$filmes = [
    ['titulo' => 'Venom: A Última Rodada', 'descricao' => 'Em Venom: A Última Rodada...', 'genero' => 'Ação, Aventura, Ficção, Suspense', 'diretor' => 'Kelly Marcel', 'distribuidor' => 'Sony Pictures', 'duracao' => '135 min', 'imagem' => 'img/venom.png', 'botao' => '<a href="compra.php"><button>Comprar Ingresso</button></a>', 'idade' => '14', 'trailer' => 'trailer/venom.mp4'],
    ['titulo' => 'Terrifier 3', 'descricao' => 'Os fãs de terror vão mergulhar...', 'genero' => 'Terror', 'diretor' => 'Damien Leone', 'distribuidor' => 'Diamond', 'duracao' => '124 min', 'imagem' => 'img/terrifierr.jpg', 'botao' => '<a href="compra.php"><button>Comprar Ingresso</button></a>', 'idade' => '18','trailer' => 'trailer/terrifier.mp4'],
    ['titulo' => 'Coringa: Delírio A Dois', 'descricao' => 'Após os eventos do primeiro filme...', 'genero' => 'Drama, Suspense', 'diretor' => 'Todd Phillips', 'distribuidor' => 'Warner Bros', 'duracao' => '138 min', 'imagem' => 'img/coringafilme.png', 'botao' => '<a href="compra.php"><button>Comprar Ingresso</button></a>', 'idade' => '16','trailer' => 'trailer/coringa.mp4'],
    ['titulo' => 'Sorria 2', 'descricao' => 'Prestes a embarcar em uma turnê mundial...', 'genero' => 'Terror', 'diretor' => 'Parker Finn', 'distribuidor' => 'Paramount', 'duracao' => '127 min', 'imagem' => 'img/sorria.jpg', 'botao' => '<a href="compra.php"><button>Comprar Ingresso</button></a>', 'idade' => '18','trailer' => 'trailer/sorria.mp4'],
    ['titulo' => 'O Telefone Preto', 'descricao' => 'Um garoto de 13 anos é sequestrado...', 'genero' => 'Suspense, Terror', 'diretor' => 'Scott Derrickson', 'distribuidor' => 'Universal Pictures Brasil', 'duracao' => '102 min', 'imagem' => 'img/telefone.jpg', 'botao' => '<a href="compra.php"><button>Comprar Ingresso</button></a>', 'idade' => '16','trailer' => 'trailer/telefone.mp4'],
    ['titulo' => 'Os Fantasmas Ainda Se Divertem', 'descricao' =>  'Nesta nova história, família Deetz se unem após uma tragédia...','genero' => ' Comédia, Fantasia, Terror', 'diretor' => 'Tim Burton', 'distribuidor' => 'Warner Bros', 'duracao' => '98 min', 'imagem' => 'img/fantasma.jpg', 'botao' => '<a href="compra.php"><button>Comprar Ingresso</button></a>', 'idade' => '14','trailer' => 'trailer/suco.mp4'],
    ['titulo' => 'A Substância', 'descricao' => 'Após ser demitida da TV por ser considerada “velha demais"...', 'genero' => 'Drama, Terror', 'diretor' => 'Coralie Fargeat', 'distribuidor' => 'Imagems Filmes', 'duracao' => '140 min', 'imagem' => 'img/substancia.jpg', 'botao' => '<a href="compra.php"><button>Comprar Ingresso</button></a>', 'idade' => '18','trailer' => 'trailer/substancia.mp4'],
    ['titulo' => 'Longlegs - Vínculo Mortal', 'descricao' => 'um serial killer que é perseguido por uma agente do FBI, Lee Harker (Monroe)...', 'genero' => 'Suspense, Terror', 'diretor' => 'Oz Perkins', 'distribuidor' => 'Diamond / Galeria', 'duracao' => '101 min', 'imagem' => 'img/longlegs.png', 'botao' => '<a href="compra.php"><button>Comprar Ingresso</button></a>', 'idade' => '18','trailer' => 'trailer/longlegs.mp4']
];


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
    <title>Ticket Zone - Catálogo</title>
    <link rel="stylesheet" href="stylecatalogo.css">
    <link rel="shortcut icon" type="imagem/png" href="img/bora.png">
    <style>

            body {
                font-family: Arial, sans-serif;
                margin: 0;
                background-color: #000000;
                color: #ffffff;
            }


            header {
                background-color: #000;
                padding: 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                color: #fff;
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

            .filme-lista {
                padding: 20px;
                background-color: #f0f0f0;
                display: flex;
                justify-content: center;
                
                    background: url('img/fundo2.jpg') no-repeat center center fixed !important;
                    background-size: cover !important;
                    width: 100% !important;
                    min-height: 100vh !important;
                    overflow: hidden;
                    z-index: -1;
                    
            }
            .card-filme {
                position: relative;
                width: 100%;
                height: 100%;
                border-radius: 8px;
                overflow: hidden;
            }


            .grid-filmes {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                grid-gap: 8px;
                position: relative;
            }

            .filme-item {
                background-color: #fff;
                border-radius: 10px;
                padding: 0;
                cursor: pointer;
                position: relative;
                transition: transform 0.3s ease;
                overflow: hidden;
                width: 90%;
                height: 390px;
                display: flex;
                flex-direction: column;
                position: relative; 
            }
            .filme-item:hover {
                transform: scale(1.05);
            }
            .filme-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                border-radius: 10px;
                transition: transform 0.3s ease;
            }

            .filme-overlay {
                position: absolute;
                bottom: 10px; /* Posiciona no canto inferior */
                left: 10px; /* Posiciona no canto esquerdo */
                background-color: rgba(0, 0, 0, 0.6); /* Fundo escuro semi-transparente para melhor legibilidade */
                padding: 5px 8px;
                border-radius: 4px;
                display: flex;
                align-items: center;
                gap: 5px; /* Espaço entre o título e a idade */
            }

            .filme-titulo, .idade {
                margin-bottom: 5px;
                text-align: left; /* Alinhar à esquerda */
            }


            .filme-titulo {
                font-size: 18px;
                font-weight: bold;
                color: #ffffff;
                margin: 0;
            }
            .filme-descricao {
                display: none;
                margin-top: 10px;
                color: #000000;
                background-color: rgba(0, 0, 0, 0.7);
                padding: 10px;
                border-radius: 10px;
                position: absolute; 
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                color: #ffffff;
                z-index: 10;
            }

            .filme-descricao h2 {
                font-size: 18px;
                color: #fff;
            }
            .idade {
                font-size: 14px;
                font-weight: bold;
                width: 23px;
                height: 23px;
                display: inline-block;
                text-align: center;
                line-height: 25px;
                border-radius: 5px;
                margin-bottom: 5px;
            }




            .idade-14 {
                background-color: #ff6b00; 
                color: #ffffff;
            }

            .idade-16 {
                background-color: #ff0000; 
                color: #ffffff;
            }

            .idade-18 {
                background-color: #000000; 
                color: #ffffff;
            }


            .botao-compra {
                margin-top: 10px;
                padding: 12px 60px;
                background-color: #d9d9d9;
                color: #e65b00;
                text-decoration: none;
                text-align: center;
                border-radius: 18px;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }

            .botao-compra:hover {
                background-color: #cacaca;
                transform: scale(1.07); 
            }


            .filme-0 {
                grid-column: 1 / 2;
                grid-row: 1 / 2;
            }

            .filme-1 {
                grid-column: 4 / 5;
                grid-row: 1 / 2;
            }

            .filme-2 {
                grid-column: 1 / 2;
                grid-row: 2 / 3;
            }

            .filme-3 {
                grid-column: 3 / 4;
                grid-row: 2 / 3;
            }

            .filme-4 {
                grid-column: 4 / 5;
                grid-row: 2 / 3;
            }
            .filme-5 {
                grid-column: 3 / 2;
                grid-row: 2 / 3;
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

            footer {
                background-color: #000; 
                padding: 20px;
                text-align: center;
            } 
            footer {
                background-color: #000;
                color:  #FFFFFF;
                text-align: center;
                padding: 10px 0;
                margin: 0; 
                width: 100%; 
            }
            .footer-links a {
                color: #ffffff;
                text-decoration: none;
                margin: 0 15px;
            }

            .footer-links a:hover {
                text-decoration: underline;
            } 

    </style>
</head>
<body>
<script>
function toggleMovieDetails(index) {
    var details = document.getElementById("movie-details-" + index);
    var overlay = document.querySelector(".filme-" + index + " .filme-overlay");

    if (details.style.display === "none" || details.style.display === "") {
        details.style.display = "block";
        overlay.style.display = "none"; // Esconde o título e idade
    } else {
        details.style.display = "none";
        overlay.style.display = "flex"; // Mostra o título e idade
    }
}
</script>
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
<main class="filme-lista">
    <div class="grid-filmes">
        <?php
            foreach ($filmes as $index => $filme) {
                echo '<div class="filme-item filme-' . $index . '" onclick="toggleMovieDetails(' . $index . ')">';
                echo '<img src="' . $filme['imagem'] . '" alt="' . $filme['titulo'] . '">';
                echo '<div class="filme-overlay">';
                echo '<div class="filme-titulo">' . $filme['titulo'] . '</div>';
                echo '<div class="idade idade-' . $filme['idade'] . '">' . $filme['idade'] . '</div>';
                echo '</div>';
                echo '<div class="filme-descricao" id="movie-details-' . $index . '">';
                echo '<h2>' . $filme['titulo'] . '</h2>';
                echo '<div class="idade idade-' . $filme['idade'] . '">' . $filme['idade'] . '</div>';
                echo '<p><strong>Gênero:</strong> ' . $filme['genero'] . '</p>';
                echo '<p><strong>Diretor:</strong> ' . $filme['diretor'] . '</p>';
                echo '<p><strong>Distribuidor:</strong> ' . $filme['distribuidor'] . '</p>';
                echo '<p><strong>Duração:</strong> ' . $filme['duracao'] . '</p>';
                //aq ele ira pegar as variaveis do array puxando-as e eviando para a pagina de compra 
                echo '<a class="botao-compra" href="compra.php?imagem=' . urlencode($filme['imagem']) . '&titulo=' . urlencode($filme['titulo']) . '&descricao=' . urlencode($filme['descricao']) . '&idade=' . urlencode($filme['idade']) . '&duracao=' . urlencode($filme['duracao']) . '&trailer=' . urlencode($filme['trailer']) . '">Comprar Ingresso</a>';
                //aq ele ira pegar as variaveis do array puxando-as e eviando para a pagina de compra 
                echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
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

