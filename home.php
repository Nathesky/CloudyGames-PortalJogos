<?php
session_start();
if (!isset($_SESSION['nick'])) {
    header("Location: index.php"); 
    exit();
}

$nick_user = $_SESSION['nick'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloudy Games | Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icone.png" sizes="16x16 32x32 48x48 64x64" type="image/x-icon">
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/cloudy.png" alt="Cloudy Games Logo" title="Cloudy Games" id="logo">
            <p>CLOUDY GAMES</p>
        </div>
        <div class="cadastro">
            <p>Bem vindo, <?php echo $nick_user; ?></p>
        </div>
        <a href="placar.php">
        <div class="ranking">
            <img src="img/ranking-icon.png" alt="ranking" title="Veja o Ranking" id="ranking">
        </div>
        </a>
        
    </header>

    <main>
            <!-- JOGO 1 -->
        <div class="jogo"><h1> Jokenpô </h1>
            <div class="regras">
                <p>Três jogadas disponíveis: Pedra, Papel e Tesoura; Pedra vence Tesoura,
                    Tesoura vence Papel, Papel vence Pedra.
                </p>
            </div>
            <div class="img">
            <img src="img/jokenpo.png" id="imgJ"> 
            </div>
            <div class="botao">
                <a href="jogos/jokenpo.php">
        <button>jogar</button>
        </a>
        </div>
        </div>

            <!-- JOGO 2 -->
        <div class="jogo"><h1> Adivinhe o número </h1>
        <div class="regras">
                <p>O nosso BOT irá sortear um número entre 1 a 10 e tu terás de acertar.
                </p>
        </div>
            <div class="img">
            <img src="img/adivinhenum.jpeg" id="imgJ" >
            </div>
            <div class="botao">
           <a href="jogos/adivinhe.php"> <button>jogar</button></a>
        </div>
        </div>

            <!-- JOGO 3 -->
        <div class="jogo"><h1> Par ou ímpar </h1>
        <div class="regras">
                <p>Escolha par ou ímpar e em seguida, um número.Ganha quem a soma dos números entre
                   a máquina e você revelar se o número é par ou ímpar.
                </p>
        </div>
        <div class="img">
            <img src="img/parImpar.webp" id="imgJ" > 
            </div>
            <div class="botao">
       <a href="jogos/parimpar.php"><button>jogar</button></a> 
        </div>
        </div>

            <!-- JOGO 4 -->
        <div class="jogo"><h1> Forca </h1>
        <div class="regras">
                <p>
                    Escolha entre A-Z, clique no botão enviar e tente acertar a palavra criada pelo bot.
                </p>
        </div>
        <div class="img">
        <img src="img/forca.jpg" id="imgJ"> 
        </div>
        <div class="botao">
      <a href="jogos/forca.php">  <button>jogar</button></a>
        </div>
        </div>
    </main>

    <footer>
        <ul>
           <li> <a href="index.php">
                Área de Login </a>
            </li> 
            <li>
                
            </li>
            <li>
                Cloudy Corp.
            </li>
        </ul>
    </footer>
</body>
</html>