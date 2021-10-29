<?php
require_once('../assets/php/functions/startSession.php');
require_once('../assets/php/functions/autoload.php');
// require_once('php/functions/setActiveLinkClass.php');
if (!session_id()) {
    header('Location: /login.php?notLogged=true');
}

$user = new UsersController();
$data = $user->getAllUserData($_SESSION['userEmail']);
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PegasusYellow</title>

    <!-- Links de fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700;1,400;1,500&display=swap" rel="stylesheet">

    <!-- CSS Style Sheet -->
    <link rel="stylesheet" href="../assets/css/style-register.css">

    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
    
</head>

<body>

    <?php require_once('../assets/php/components/header.php'); ?>

    <main>
        <h1>REGISTRAR</h1>
        <div id="register-section" class="register-container">
            <div id="register">
                <h2>INFORMAÇÕES PESSOAIS</h2>
                <form method="POST" action="../assets/php/handlers/accountUpdate.php">
                    <label for="text"></label>
                    <input type="text" placeholder="Nome" class="input-register" name="nome-input" value="<?php echo $data['nome'] ?>" required>
                    <input type="text" placeholder="Sobrenome" class="input-register" name="sobrenome-input" value="<?php echo $data['sobrenome'] ?>" required>
                    <input type="text" placeholder="CPF" class="input-register" maxlength="14" id="cpf" name="cpf-input" onkeypress="aplicar(cpf.value)" value="<?php echo $data['cpf'] ?>" required>
                    <input type="text" placeholder="Gênero" class="input-register" name="genero-input" value="<?php echo $data['genero'] ?>" required>
                    <input type="email" placeholder="E-mail" class="input-register-email" name="email-input" value="<?php echo $data['email'] ?>" required>
                    <input type="password" placeholder="Senha" minlength="8" class="input-register-password" name="senha-input">

                <h2>ENDEREÇO</h2>
                    <input type="text" placeholder="CEP" class="input-register" name="cep-input" value="<?php echo $data['cep'] ?>" required>
                    <input type="text" placeholder="Endereço" class="input-register" name="endereco-input" value="<?php echo $data['endereco'] ?>" required>
                    <input type="text" placeholder="Número" class="input-register" name="numero-input" value="<?php echo $data['numeroDaCasa'] ?>" required>
                    <input type="text" placeholder="Cidade" class="input-register" name="cidade-input" value="<?php echo $data['cidade'] ?>" required>
                    <input type="text" placeholder="Bairro" class="input-register" name="bairro-input" value="<?php echo $data['bairro'] ?>" required>
                    <input type="submit" value="Enviar" class="button">
                </form>
            </div>
        </div>
    </main>

    <footer>
        <img src="../assets/images/Logo.svg" alt="logo" id="footer-logo">

        <div id="divider-footer"></div>

        <div id="navbar-footer">
            <div id="navbar-menu">
                <h3 class="navbar-title">MENU</h3>

                <ul>
                    <li>Entrar</li>
                    <li>Registrar</li>
                    <li>Carrinho</li>
                    <li>Produtos</li>
                </ul>
            </div>

            <div id="navbar-social">
                <h3 class="navbar-title">REDES SOCIAIS</h3>

                <ul>
                    <li>Instagram</li>
                    <li>Facebook</li>
                    <li>LinkedIn</li>
                    <li>Tiktok</li>
                </ul>
            </div>

            <div id="footer-contact">
                <div id="telefone">
                    <img src="../assets/images/telefone.svg" alt="Botão de telefone">
                    <h3>(00) 99999-9999</h3>
                </div>

                <div id="email">
                    <img src="../assets/images/email.svg" alt="Botão de e-mail" >
                    <h3>yellowpegasus@mail.com</h3>
                </div>
            </div>

        </div>
        <p>Copyright  ©  2021  Yellow Pegasus</p>
    </footer>

    <div id="modal-login" class="modal-container">
        <div id="modal">
            <button class="close">X</button>
            <h2>LOGIN</h2>
            <form method="POST" action="../assets/php/handles/login.php">
                <label for="email-input"></label>
                <input type="email" placeholder="E-mail" class="input" name="email-input" required> <br/>
                <label for="senha-input"></label>
                <input type="password" placeholder="Senha" class="input" name="senha-input" required> <br/>
                <input type="submit" value="Login" class="button">
            </form>
        </div>
    </div>



</body>


<script src="../assets/js/script.js"></script>


</html>