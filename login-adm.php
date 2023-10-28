<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloudy | Área de Login</title>
    <link rel="icon" href="img/icone.png" sizes="16x16 32x32 48x48 64x64" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        <!-- css -->
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<header>
    <a href="index.php">
    <div id="logo">
        <img src="img/cloudy.png" alt="Cloudy Games Logo" title="Cloudy Games" class="normal">
        <img src="img/cloudyhover.png" alt="Cloudy Games Logo Hover" title="Cloudy Games" class="hover">
        <p>CLOUDY GAMES</p>
    </div>
    </a>
</header>
    
    <div class="container">
            <div class="login">
                <h1>LOGIN ADMIN.</h1>
                <hr>
                     <form action="" method="POST">
                                    <input type="text" placeholder="Digite seu nome" maxlength="16" name="nome-adm">
                                         <!-- VERIFICA SE O ADM DIGITOU O NOME -->
                                             <?php
                                         include('conexao.php');
                                            if(isset($_POST['nome-adm']) || isset($_POST['senha-adm'])) {
                                            if(strlen($_POST['nome-adm']) == 0) {
                                        echo '<div class="errorNome">*Informe seu nome! </div>';
                    } 
            } 
        mysqli_close($mysqli);
        ?>
                                    <input type="password" placeholder="Digite sua senha" maxlength="16" name="senha-adm">  
                                             <!-- VERIFICA SE O ADM DIGITOU A SENHA -->
                                                <?php
                                         include('conexao.php');
                                            if(isset($_POST['nome-adm']) || isset($_POST['senha-adm'])) {
                                            if(strlen($_POST['senha-adm']) == 0) {
                                        echo '<div class="errorSenha">*Informe sua senha! </div>';
                    } 
            } 
        mysqli_close($mysqli);
        ?>  
                            <input type="submit" value="Acessar" id="submit">
                    </form>
            </div>
    </div>
    <?php
    include('conexao.php');
    if (isset($_POST['nome-adm']) || isset($_POST['senha-adm'])) {
        if(strlen($_POST ['nome-adm']) != 0 && strlen($_POST['senha-adm']) != 0){
            $nomeAdm = $mysqli->real_escape_string($_POST['nome-adm']);
            $senhaAdm = $mysqli->real_escape_string($_POST['senha-adm']);

            $res = "SELECT * FROM adm WHERE nome_adm = '$nomeAdm' AND senha_adm = '$senhaAdm' ";
            $res1 = $mysqli->query($res) or die("Falha na execução do código sql: ". $mysqli->error);
            $quantidade = $res1-> num_rows;

            if($quantidade == 1){
                $user = $res1->fetch_assoc();
                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['id'] = $user['id_adm'];
                $_SESSION['adm'] = $user['nome_adm'];

                header("Location: liberar.php");

            } else{
                echo '<div class="falha">Falha ao logar, nome ou senha incorretos!</div>';
            }
        }
    }
    mysqli_close($mysqli);
    ?>

</body>
</html>