<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloudy Games | Área de Cadastro</title>
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="icon" href="img/icone.png" sizes="16x16 32x32 48x48 64x64" type="image/x-icon">
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
            <div class="cadastro">
            <form method="POST">
                <h1>REGISTER</h1>
                <hr>
                <input type="text" placeholder="Digite o seu nick" maxlength="16" name="nick-user">
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
                <input type="password" placeholder="Digite a sua senha" maxlength="16" name="senha-user">
                                <!-- VERIFICA SE O USUÁRIO DIGITOU A SENHA -->
                                <?php
                                         include('conexao.php');
                                            if(isset($_POST['senha-user']) || isset($_POST['senha-user'])) {
                                            if(strlen($_POST['senha-user']) == 0) {
                                        echo '<div class="errorSenha">*Informe sua senha! </div>';
                    } 
            } 
        mysqli_close($mysqli);
        ?>
                <input type="submit" value="Registrar" id="submit">

                <a href="index.php" id="voltar">Voltar</a>

            </form>
            </div>
            </div>
            <?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nickUser = $_POST["nick-user"];
    $senhaUser = $_POST["senha-user"];

    if(strlen($_POST['nick-user']) && strlen($_POST['senha-user']) != 0){
    $query = "INSERT INTO usuario (nick_user, senha_user, liberado) VALUES ('$nickUser', '$senhaUser', 'NÃO')";
    if (mysqli_query($mysqli, $query)) {
        echo '<div class="sucesso"> Cadastro realizado com sucesso (requer liberação do adm) </div>';
    }
}
    $id_user = mysqli_insert_id($mysqli);

    mysqli_close($mysqli);
}
?>
    </main>

</body>
</html>