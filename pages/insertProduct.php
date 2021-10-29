<?php
require_once('../assets/php/functions/startSession.php');
require_once('../assets/php/functionsgeneralFunctions.php');
require_once('../assets/php/functionsautoload.php');

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
    <!-- <link rel="stylesheet" href="/assets/css/normalize.css"> -->
    <link rel="stylesheet" href="../assets/css/style-register.css">

    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
    
</head>

<body>

    <header>
        <img src="../assets/images/Logo.svg" alt="logo" id="logo">

        <nav id="navbar-header">
            <button id="btn-mobile"> Menu
                <span id="btn-style"></span>
            </button>
            <ul id="navbar">
                <?php if(session_id()):?>
                <li class="navbar-item" id="email">
                    <a href="../pages/myAccount.php">Oi! <?php echo $_SESSION['userfullName']; ?>! </a>
                    <ul>
                        <li><a href="../pages/myAccount.php">Meu Perfil</a></li>
                        <?php if($_SESSION['userStatus'] === 'admin'):?>
                            <li><a href="#">Cadastrar novo usuário</a></li>
                            <li><a href="#">Cadastrar produto</a></li>
                            <li><a href="#">Editar usuário</a></li>
                            <li><a href="#">Editar produto</a></li>
                        <?php elseif($_SESSION['userStatus'] === 'collab'):?>
                            <li><a href="#">Cadastrar produto</a></li>
                            <li><a href="#">Editar produto</a></li>
                            <?php endif; ?>
                        <li><a href="../assets/php/handlers/logOut.php">Fazer logout</a></li>
                    </ul>
                </li>
                <li class="navbar-item"><img src="../assets/images/shopping-bag.svg" alt="" id="shopping-bag"></li>
                <?php else:?>                
                    <li class="navbar-item"><a href="#" id="login">Entrar</a></li>
                    <li class="navbar-item"><a href="register.php" id="register-button">Registrar</a></li>
                    <li class="navbar-item"><img src="../assets/images/shopping-bag.svg" alt="" id="shopping-bag"></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h1>REGISTRAR PRODUTO</h1>
        <div id="register-section" class="register-container">
            <div id="register">
                <h2>INFORMAÇÕES DO PRODUTO</h2>
                <form method="POST" action="../assets/php/handlers/newProduct.php" enctype="multipart/form-data">
                    <label for="text"></label>
                    <input type="text" placeholder="Produto" class="input-register" name="produto-input" required>
                    <input type="text" placeholder="Valor" class="input-register" name="valor-input" required>
                    <input type="text" placeholder="Descrição" class="input-register" name="descricao-input" required>
                    <input type="text" placeholder="Quantidade" class="input-register" name="quantidade-input" required>
                    <input type="file" class="input-register" id="imagem-input" name="imagem-input" required>
                    <input type="button" class="button" value="Salvar">

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
            <form method="POST" action="../assets/php/handlers/login.php">
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