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
    <link rel="icon" href="../img/icone.png" sizes="16x16 32x32 48x48 64x64" type="image/x-icon">
    <link rel="stylesheet" href="../css/adivinhe.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Cloudy | Adivinhar número</title>
</head>
<body>

<header>
    <a href="../home.php">
        <div class="logo">
            <img src="../img/cloudy.png" alt="Cloudy Games Logo" title="Cloudy Games" id="logo">
            <p>CLOUDY GAMES</p>
        </div>
        </a>
        <div class="cadastro">
            <p>Bem vindo, <?php echo $nick_user; ?></p>
        </div>
        <a href="placar.php">
        <div class="ranking">
            <img src="../img/ranking-icon.png" alt="ranking" title="Veja o Ranking" id="ranking">
        </div>
        </a>
        
    </header>
    
    <main>
        <div class="container">
            <div class="titulo">
<h2>Adivinhe o número de 1 à 10</h2>
</div>
<div class="form">
<form method="post">
    <div class="algu">
    <input type="number" name='palpite' required maxlength='2'>
    <button>Chute!</button>
    </div>
</form>
</div>
</main>


<?php  
    $numeroSorteado = null;
    $numeroSorteado = rand(1, 10);
    @$palpite = intval($_POST['palpite']) ?? null;


    if ($palpite != null)
        if($numeroSorteado != $palpite)
        {
            echo("<h3 id='error'>Errou. O número era $numeroSorteado Tente novamente</h3>");
        }
        if($numeroSorteado == $palpite)
        {
            echo"<h3 id='acerto'>Acertou</h3>";
        }

        unset($palpite);
?>
</div>

<footer>
        <ul>
           <li> <a href="../index.php">
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