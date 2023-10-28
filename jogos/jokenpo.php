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
    <title>Cloudy | Jokenpô</title>
    <link rel="icon" href="../img/icone.png" sizes="16x16 32x32 48x48 64x64" type="image/x-icon">
    <link rel="stylesheet" href="../css/jokenpo.css"/>
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

<form method="get" >
    <div class="formjkp">
    <select name="jogador" required>
        <option value="4" id='oi' selected value='4'>jogue...</option>
        <option value="0">Pedra</option>
        <option value="1">Papel</option>
        <option value="2">Tesoura</option>
    </select>

    <button>Jogar</button>
    </div>
</form>

<?php
    include_once('../conexao.php');
    @$jogador = 4;
    @$jogador = intval($_GET['jogador']) ;
    

    $jogada = ["Pedra", "Papel", "Tesoura"];

    if($jogador == 4)
    {

        echo "<h3>Escolha uma opção</h3>";
    }

    if($jogador >= 0 && $jogador <= 2)
    {
        $bot = rand(0,2);

        $bot = $jogada[$bot];
        $jogador = $jogada[$jogador];
        $status;

        echo "
        <div class='fotos'>  
            <div class='jogador'> <h4>".$nick_user."</h4> <img src='../img/".$jogador.".png' width='200px'></div> 
            <div class='vs'>Vs.</div>
            <div class='bot'> <h4>Bot</h4> <img src='../img/".$bot.".png' width='200px'> </div> 
        </div>";


        if($jogador == "Papel" && $bot == "Pedra" || $jogador == "Tesoura" && $bot == "Papel" || $jogador == "Pedra" && $bot == "Tesoura"){
            $result = "vitoria"; $status = "venceu!"; 
        }
        if($jogador == "Pedra" && $bot == "Papel" || $jogador == "Papel" && $bot == "Tesoura" || $jogador == "Tesoura" && $bot == "Pedra"){
            $result = "derrota"; $status = "perdeu!"; 
        }
        if($jogador == $bot){
            $result = "empate"; $status = "empatou!";
        }

        echo "<h2 id='resultado'>Você ".$status."</h2>";
        
        unset($bot);
        unset($jogador);
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