<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloudy | Área de Login</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <!-- fonte google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
<header>
        <div class="logo">
            <img src="img/logo.png" alt="Cloudy Games Logo" title="Cloudy Games" id="logo">
            <p>CLOUDY GAMES</p>
        </div>
    </header>
    <div class="container">
            <div class="login">
                <h3>login user</h3>
                     <form action="" method="POST">
                                    <input type="text" placeholder="Digite seu nick" maxlength="16" name="nick-user">
                                    <input type="password" placeholder="Digite sua senha" maxlength="16" name="senha-user">
                                 <p>Ainda nâo cadastrado? <a href="login-adm.php">cadastre-se</a> </p>     
                            <input type="submit" value="Acessar" id="submit">
                    </form>
            </div>
    </div>

    <?php
    include('conexao.php');
    
    mysqli_close($mysqli);
    ?>
</body>
</html>