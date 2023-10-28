<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widdiv=device-widdiv, initial-scale=1.0">
    <title>Cloudy | Área de liberação</title>
    <link rel="icon" href="img/icone.png" sizes="16x16 32x32 48x48 64x64" type="image/x-icon">
    <link rel="stylesheet" href="css/liberacao.css">
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
<!-- TABELA -->
<div class="content">
    <div class="tabela">
        <div class="coluna">NOME</div>
        <div class="id-user">ID USUÁRIO</div> 
        <div class="situacao">SITUAÇÃO</div>

            <?php
                include('conexao.php');
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST['liberar'])) {
                         $idUsuario = $_POST['id_usuario'];

                        $query = "UPDATE usuario SET liberado = 'SIM' WHERE id_user = $idUsuario";
                        mysqli_query($mysqli, $query);
                        }
                    }

                $res = mysqli_query($mysqli, "SELECT * FROM usuario");

                    while ($escrever = mysqli_fetch_array($res)) {
                        echo '<div>' . $escrever['nick_user'] . '</div>';
                        echo '<div>' . $escrever['id_user'] . '</div>';
    
                        if ($escrever['liberado'] == 'NÃO') {
                             echo '<form method="POST">';
                             echo '<input type="hidden" name="id_usuario" value="' . $escrever['id_user'] . '">';
                             echo '<div class="liberar">
                                   <button type="submit" name="liberar" id="liberar">Liberar acesso</button>
                                   </div>';
                             echo '</form>';
                        } else {
                        echo '<div class="liberado-mensagem">Acesso já liberado</div>';
                    }
                }
            mysqli_close($mysqli);
            ?>
    </div>
</div>

<div class="voltar">
    <a href="login-adm.php"><button id="voltar">Voltar</button></a>
</div>
</main>

<footer>
    <a href="index.php" id="href"> <h2>Página Inicial</h2> </a>
</footer>

</body>
</html>