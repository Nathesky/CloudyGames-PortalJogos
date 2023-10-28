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
    <title>Cloudy | Forca</title>
    <script src="../script/forca.js"></script>
    <link rel="icon" href="../img/icone.png" sizes="16x16 32x32 48x48 64x64" type="image/x-icon">
    <link rel="stylesheet" href="../css/forca.css">
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
    <div class="forcaform">
    <h1>Forca</h1>
    <h3 id="chances">Erros: 0</h3>
    
    <h4>Digite uma letra</h4>
    
    <input type="text" id="entry" required maxlength="1" size="7">
    <br>
    <button id="bota">Enviar</button>
    </div>
    
    
    <h3 id="msg"></h3>
    
    <form method="post" id="form">
        <input type="text" id="ghost" name="resultado">
        <input type="text" id="ghostword" name="palavra">
        <br><br>
    </form>

    <div class="forca" id="forca"></div>

    <button id="restart" onclick="recarrega()" style="visibility: hidden;">Recomeçar</button>
    </main>

    <?php 

    @$acerto = $_POST['resultado'];
    @$palavra = $_POST['palavra'];

    if($acerto == 'acerto')
    {
       
        echo "<h2 id='acerto'>Você venceu!</h2>";
    }

    if($acerto == 'erro')
    {
       
        echo "<h2 id='error'>Você perdeu. <br> A palavra é: $palavra</h2>";
    }

?>


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
