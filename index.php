<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloudy | Área de Login</title>
    <link rel="icon" href="img/icone.png" sizes="16x16 32x32 48x48 64x64" type="image/x-icon">
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <a href="index.php">
    <div id="logo">
        <img src="img/cloudy.png" alt="Cloudy Games Logo" title="Cloudy Games" class="normal">
        <img src="img/cloudyhover.png" alt="Cloudy Games Logo Hover" title="Cloudy Games" class="hover">
        <p id="p-header">CLOUDY GAMES</p>
    </div>
    </a>
</header>
    <main>
    <div class="container">
            <div class="login">
            <h1>LOGIN</h1>
            <hr>   
                     <form action="" method="POST">
                                    <input type="text" placeholder="Digite seu nick" maxlength="16" name="nick-user">
                                    <!-- VERIFICA SE O USUÁRIO DIGITOU O NICK -->
                                    <?php
                                         include('conexao.php');
                                            if(isset($_POST['nick-user']) || isset($_POST['senha-user'])) {
                                            if(strlen($_POST['nick-user']) == 0) {
                                        echo '<div class="errorNome">*Informe seu nick! </div>';
                    } 
            } 
        mysqli_close($mysqli);
        ?>
                                    <!-- FIM VERIFICAÇÃO NICK -->

                                    <input type="password" placeholder="Digite sua senha" maxlength="16" name="senha-user">
                                    <!-- VERIFICA SE O USUÁRIO DIGITOU A SENHA -->
                                    <?php
                                         include('conexao.php');
                                            if(isset($_POST['nick-user']) || isset($_POST['senha-user'])) {
                                            if(strlen($_POST['senha-user']) == 0) {
                                        echo '<div class="errorSenha">*Informe sua senha! </div>';
                    } 
            } 
        mysqli_close($mysqli);
        ?>
                                <!-- FIM VERIFICAÇÃO SENHA -->
                                 <p>Ainda nâo cadastrado? <a href="cadastro-players.php" id="href-cadastro">cadastre-se</a> </p>     
                            <input type="submit" value="Acessar" id="submit">
                    </form>
            </div>
    </div>

    <?php
include('conexao.php');
if (isset($_POST['nick-user']) || isset($_POST['senha-user'])) {
    if (strlen($_POST['nick-user']) != 0 && strlen($_POST['senha-user']) != 0) {
        $nickUser = $mysqli->real_escape_string($_POST['nick-user']);
        $senhaUser = $mysqli->real_escape_string($_POST['senha-user']);
        $liberaUser = 'SIM';

        $res = "SELECT * FROM usuario WHERE nick_user = '$nickUser' AND senha_user = '$senhaUser' AND liberado = '$liberaUser'";
        $res1 = $mysqli->query($res) or die("Falha na execução do código SQL: " . $mysqli->error);
        $quantidade = $res1->num_rows;

        if ($quantidade == 1) {
            $user = $res1->fetch_assoc();
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id'] = $user['id_user'];
            $_SESSION['nick'] = $user['nick_user'];

            header("Location: home.php");
        } elseif ($quantidade == 0) {

            $res_nao_liberado = "SELECT * FROM usuario WHERE nick_user = '$nickUser' AND senha_user = '$senhaUser'";
            $res1_nao_liberado = $mysqli->query($res_nao_liberado) or die("Falha na execução do código SQL: " . $mysqli->error);
            $quantidade_nao_liberado = $res1_nao_liberado->num_rows;
            
            if ($quantidade_nao_liberado == 1) {
                echo '<div class="falha-lib">Liberação de acesso pendente</div>';
            } else {
                echo '<div class="falha">Falha ao logar, nick ou senha incorretos!</div>';
            }
        }
    }
}
mysqli_close($mysqli);
?>

</main>
<footer>
        <a href="login-adm.php"><p>Sessão para administrador</p></a>
    </footer>

</body>
</html>