<?php
    // Aq vai evitar de dar array indefinido
    $imagem = isset($_GET['imagem']) ? $_GET['imagem'] : '';
    $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : '';
    $descricao = isset($_GET['descricao']) ? $_GET['descricao'] : '';
    $duracao = isset($_GET['duracao']) ? $_GET['duracao'] : '';
    $idade = isset($_GET['idade']) ? $_GET['idade'] : '';
    $trailer = isset($_GET['trailer']) ? $_GET['trailer'] : '';
    
    /*esse função ira verificar se a sessão ja foi iniciada
    O PHP_SESSION_NONE Irá ver se ha uma sessão ativa, caso não tenha ele ira iniciar uma*/
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagem/png" href="img/bora.png">
    <title>Document</title>
    <style>
        
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
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


        .filme-container {
            display: flex;
            gap: 20px;
            background-color: #1d2025;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            position: relative;
        }

        .imagem-filme {
            position: relative;
            width: 200px;
        }

        .imagem-filme img {
            width: 100%;
            border-radius: 8px;
        }
         
        

        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.5em;
        }

        .descricao {
    font-size: 16px; 
    line-height: 1.5; 
    text-align: justify; 
    margin-top: 10px; 
    margin-bottom: 10px; 
    color: #ffffff; 
    max-width: 600px; 
    padding: 10px; 
}
        
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: #2c2c2c;
            padding: 20px;
            width: 90%;
            max-width: 600px;
            border-radius: 8px;
            text-align: center;
        }

        .modal-content h2 {
            margin-top: 0;
        }

        
        .close {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #fff;
        }

        
        .trailer-button {
            padding: 10px 20px;
            background-color: #1e90ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }

        .trailer-button:hover {
            background-color: #007acc;
        }

        .info-filme h2 {
            margin-top: 0;
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

        .close-button {
            background-color: #ff0000;
            color: #ffffff;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .day-container {
            background-color: #1d2025;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .day-container h2 {
            color: #cccccc;
            font-size: 1.5em;
            margin: 0;
        }

        .cinema-container {
            padding: 15px;
            background-color: #2b2f36;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .cinema-container h3 {
            font-size: 1.2em;
            margin: 0;
            color: #ffffff;
        }

        .cinema-container h5 {
            font-weight: 300;
            color: #aaaaaa;
            margin: 5px 0 10px;
        }

        .labels {
            margin: 10px 0;
        }

        .label {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.85em;
            color: #ffffff;
            margin-right: 5px;
        }

        .label.NORMAL {
            background-color: #0072ff;
        }

        .label.DUBLADO {
            background-color: #2c7d59;
        }

        .times {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .time {
            font-size: 1.2em;
            color: #ffffff;
            margin-right: 10px;
        }

        button {
            padding: 6px 12px;
            background-color: transparent;
            border: 1px solid #0072ff;
            color: #0072ff;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9em;
            transition: background-color 0.3s, color 0.3s;
        }

        button:hover {
            background-color: #0072ff;
            color: #ffffff;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            color: #ffffff;
        }

        .footer .FAQ, .footer .cartas-icon {
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

            .footer img {
            width: 40px;
            height: auto;
            margin-right: 10px;
        }

        .FAQ a {
            color: #FFFFFF;
            text-decoration: none;
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


<div class="modal" id="trailerModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Venom: A Última Rodada</h2>
        <div id="videoContainer">
            
            <video id="trailerVideo" width="100%" height="315" controls>
                <source src="<?php echo $trailer; ?>" type="video/mp4">
                Seu navegador não suporta o elemento de vídeo.
            </video>
        </div>
        <div>
            <button class="trailer-button" onclick="changeTrailer('path/to/your/video1.mp4')">Trailer 1</button>
        </div>
    </div>
</div>

<script>
    
    function openModal(videoSrc) {
        document.getElementById("trailerModal").style.display = "flex";
        changeTrailer(videoSrc); 
    }

    // Função para fechar a modal
    function closeModal() {
        document.getElementById("trailerModal").style.display = "none";
        const video = document.getElementById("trailerVideo");
        video.pause();         
        video.src = "";        
    }

    
    function changeTrailer(videoSrc) {
        const video = document.getElementById("trailerVideo");
        video.src = videoSrc; 
        video.play(); 
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

<div class="filme-container">
    <div class="imagem-filme">
        <?php echo '<img src="'.$imagem.'" alt="Imagem do Filme">'; ?>
        <button class="play-button" onclick="openModal('<?php echo $trailer; ?>')">▶</button>
    </div>
    <div class="info-filme">
        <?php 
            echo '<h2>' . $titulo . '</h2>';

           
            $idadeClass = '';
            if ($idade === '14') {
                $idadeClass = 'idade idade-14';
            } elseif ($idade === '16') {
                $idadeClass = 'idade idade-16';
            } elseif ($idade === '18') {
                $idadeClass = 'idade idade-18';
            } else {
                $idadeClass = 'idade'; 
            }

            echo '<p>Classificação: <span class="' . $idadeClass . '">' . $idade . '</span></p>';
            echo '<p>Duração: ' . $duracao . '</p>';

            echo '<div class="descricao">';
            echo '<p>Descrição: ' . $descricao . '</p>';
            echo '</div>';
        ?>
    </div>
</div>


<div id="sessao">  
    <form action="#sessao" method="GET">

        <input type="hidden" name="imagem" value="<?php echo ($imagem); ?>">
        <input type="hidden" name="titulo" value="<?php echo ($titulo); ?>">
        <input type="hidden" name="descricao" value="<?php echo ($descricao); ?>">
        <input type="hidden" name="duracao" value="<?php echo ($duracao); ?>">
        <input type="hidden" name="idade" value="<?php echo ($idade); ?>">
        <input type="hidden" name="trailer" value="<?php echo ($trailer); ?>">

        <button type="submit" name="aba" value="Segunda">Segunda</button>
        <button type="submit" name="aba" value="Terça">Terça</button>
        <button type="submit" name="aba" value="Quarta">Quarta</button>
        <button type="submit" name="aba" value="Quinta">Quinta</button>
        <button type="submit" name="aba" value="Sexta">Sexta</button>
    </form>
</div>

<?php
if (isset($_GET['aba'])) {
    $ababerta = $_GET['aba'];
} else {
    $ababerta = 'Segunda'; // Define 'Segunda' como o dia padrão
}

// Template para cada dia da semana
function exibirProgramacao($dia, $data, $programacao) {
    echo '<div class="day-container">';
    echo "<h2>$dia | $data</h2>";
    

    foreach ($programacao as $cinema) {
        echo '<div class="cinema-container">';
        echo "<h3>{$cinema['nome']}</h3>";
        echo "<h5>{$cinema['endereco']}</h5>";
        echo '<div class="labels">';
        foreach ($cinema['tags'] as $tag) {
            echo "<span class=\"label {$tag}\">$tag</span> ";
        }
        echo '</div>';
        echo '<div class="times">';
        foreach ($cinema['horarios'] as $horario) {
            $imagem = isset($_GET['imagem']) ? $_GET['imagem'] : '';
            $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : '';
            echo "<span class=\"time\">$horario</span>";
            echo '<a href="comprafinal.php?imagem='.$imagem.'&titulo='.$titulo.'"><button>Compre aqui</button></a>';
        }
        echo '</div>';
        echo '</div>';
    
    }

    echo '</div>'; // Fechando day-container
}
    
    if ($ababerta === 'Segunda') {
        exibirProgramacao("Segunda-Feira", "04/11", [

            [
                "nome" => "Cine Araújo Campo Limpo",
                "endereco" => "Estrada de campo limpo, 459 | Santo Amaro",
                "tags" => ["NORMAL", "DUBLADO"],
                "horarios" => ["15:20"],
            ],
            [
                "nome" => "Cineflix Cantareira",
                "endereco" => "Av. Raimundo Pereira de Magalhães, 11001 | São João",
                "tags" => ["NORMAL", "DUBLADO"],
                "horarios" => ["18:30"]
            ],
            [
                "nome" => "Cinemark Aricanduva",
                "endereco" => "Av. Aricanduva, 5555 | Vila Matilde",
                "tags" => ["NORMAL", "DUBLADO"],
                "horarios" => ["15:10", "18:20", "21:10"]
            ]
        ]);
    } elseif ($ababerta === 'Terça') {
        exibirProgramacao("Terça-Feira", "05/11", [
            [
                "nome" => "Cine Araújo Campo Limpo",
                "endereco" => "R. Gonçalves Crespo, S/N | Tatuapé",
                "tags" => ["NORMAL", "DUBLADO"],
                "horarios" => ["15:00", "17:45"]
            ],
            [
                "nome" => "Cinemark Center Norte",
                "endereco" => "Travessa Casalbuono, 127 | Vila Guilherme",
                "tags" => ["3D", "DUBLADO"],
                "horarios" => ["18:10", "21:00"]
            ],
            [
                "nome" => "Cinemark Central Plaza",
                "endereco" => "Av. Dr. Francisco Mesquita, 1000 | Ipiranga",
                "tags" => ["NORMAL", "DUBLADO"],
                "horarios" => ["15:40", "18:45", "21:30"]
            ]
        ]);
    } elseif ($ababerta === 'Quarta') {
        exibirProgramacao("Quarta-Feira", "06/11", [
            [
                "nome" => "Cinemark Móoca",
                "endereco" => "Rua Cap Pacheco e Chaves, 313 | Vila Prudente",
                "tags" => ["NORMAL", "DUBLADO"],
                "horarios" => ["19:00"]
            ],
            [
                "nome" => "Cinemark Pátio Higienópolis",
                "endereco" => "Av. Higienopolis, 646 | Higienópolis",
                "tags" => ["VIP", "DUBLADO"],
                "horarios" => ["16:10", "21:40"]
            ],
            [
                "nome" => "Cinemark Raposo",
                "endereco" => "Rodovia Raposo Tavares, SN | Jardim Boa Vista",
                "tags" => ["NORMAL", "DUBLADO"],
                "horarios" => ["20:20", "22:10"]
            ]
        ]);
    } elseif ($ababerta === 'Quinta') {
        exibirProgramacao("Quinta-Feira", "07/11", [
            [
                "nome" => "Cinemark Shopping Cidade São Paulo",
                "endereco" => "Avenida Paulista, 1230 | Bela Vista",
                "tags" => ["NORMAL", "DUBLADO"],
                "horarios" => ["13:40", "22:00"]
            ],
            [
                "nome" => "Cinemark Shopping D",
                "endereco" => "Av. Cruzeiro do Sul, 1100 | Ponte Pequena",
                "tags" => ["NORMAL", "DUBLADO"],
                "horarios" => ["18:40", "21:30"]
            ]
        ]);
    } elseif ($ababerta === 'Sexta') {
        exibirProgramacao("Sexta-Feira", "08/11", [
            [
                "nome" => "Cinemark Móoca",
                "endereco" => "Rua Cap Pacheco e Chaves, 313 | Vila Prudente",
                "tags" => ["NORMAL", "DUBLADO"],
                "horarios" => ["19:00"]
            ],
            [
                "nome" => "Cineflix Cantareira",
                "endereco" => "Av. Raimundo Pereira de Magalhães, 11001 | São João",
                "tags" => ["NORMAL", "DUBLADO"],
                "horarios" => ["18:30"]
            ]
        ]);
    }

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