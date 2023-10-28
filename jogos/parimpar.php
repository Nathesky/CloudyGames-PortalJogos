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
    <title>Cloudy | Par ou Ímpar</title>
    <link rel="icon" href="../img/icone.png" sizes="16x16 32x32 48x48 64x64" type="image/x-icon">
    <link rel="stylesheet" href="../css/parimpar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
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
        
        <div class="ranking">
            <img src="../img/ranking-icon.png" alt="ranking" title="Veja o Ranking" id="ranking">
        </div>
        
        
    </header>

    <main>

<form method="post" >
    <div class="game">
        <h>Você é:</h>
        <br>
        <select name="parimpar">
            <option value="0">Par</option>
            <option value="1">Ímpar</option>
        </select>
        <br><br>
        <input placeholder="Seu número.." type="number" name="numero" required>
        <br><br><br>
        <button>Jogar</button>
    </div>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $impar = isset($_POST['parimpar']) ? (bool)$_POST['parimpar'] : false;
    $numero = isset($_POST['numero']) ? (int)$_POST['numero'] : 0;
    $bot = rand(1, 10);
    $soma = ($numero + $bot);
    $result = ($soma % 2);
    $vitoria = false;

    echo "<div class='parimpar'>";
    
    if (strlen($_POST['numero']) != 0) {
        if ($impar) {
            $vitoria = ($result !== 0);
        } else {
            $vitoria = ($result === 0);
        }
        
        echo "<h3>Você jogou $numero.</h3><h3>Bot jogou $bot.</h3>";
        
        if ($result !== 0) {
            echo "<h3>A soma ($soma) é ímpar.</h3>";
        } else {
            echo "<h3>A soma ($soma) é par.</h3>";
        }
        
        if ($vitoria) {
            echo "<h3 id='venceu'>Você venceu.</h3>";
        } else {
            echo "<h3 id='perdeu'>Você perdeu.</h3>";
        }
        
        echo "</div>";
    }
}
?>


</main>

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


