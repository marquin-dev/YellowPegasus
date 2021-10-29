<?php
require_once('assets/php/functions/startSession.php');
require_once('assets/php/functions/generalFunctions.php');
require_once('assets/php/functions/autoload.php');

$baseURL = getBaseURL();
$products = new ProductsController();
$data = $products->getProducts();
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
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
    
</head>

<body>

    <?php require_once('assets/php/components/header.php'); ?>


    <main>
        <h1>PRODUTOS MAIS VENDIDOS</h1>

        <div id="container">
                <div class="card">
                    <img src="assets/images/tenis.png" alt="Tênis vermelho da Nike">
                    <div class="divider"></div>
                    <h2 class="product-name">AIR JORDAN 1 HIGH</h2>
                    <p>R$1.999,99</p>
                
                </div>

                <div class="card">
                    <img src="assets/images/tenis.png" alt="Tênis vermelho da Nike">
                    <div class="divider"></div>
                    <h2 class="product-name">AIR JORDAN 1 HIGH</h2>
                    <p>R$1.999,99</p>
                </div>

                <div class="card">
                    <img src="assets/images/tenis.png" alt="Tênis vermelho da Nike">
                    <div class="divider"></div>
                    <h2 class="product-name">AIR JORDAN 1 HIGH</h2>
                    <p>R$1.999,99</p>
                </div>
        </div>

        <div id="quote">
            <p>"Passos leves e rápidos, caminhe como um verdadeiro Pegasus."</p>
            <p id="author">PegasusYellow</p>
        </div>

        <div class="subcontainer">
            <div class="subcard">
                <img src="assets/images/tenis.png" alt="Tênis vermelho da Nike">
                <div class="divider"></div>
                <h2 class="product-name">AIR JORDAN 1 HIGH</h2>
                <p>R$1.999,99</p>
            </div>

            <div class="subcard">
                <img src="assets/images/tenis.png" alt="Tênis vermelho da Nike">
                <div class="divider"></div>
                <h2 class="product-name">AIR JORDAN 1 HIGH</h2>
                <p>R$1.999,99</p>
            </div>
        </div>



    </main>

    <footer>
        <img src="assets/images/Logo.svg" alt="logo" id="footer-logo">

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
                    <img src="/assets/images/telefone.svg" alt="Botão de telefone">
                    <h3>(00) 99999-9999</h3>
                </div>

                <div id="email">
                    <img src="/assets/images/email.svg" alt="Botão de e-mail" >
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
            <form method="POST" action="assets/php/handlers/login.php">
                <label for="email-input"></label>
                <input type="email" placeholder="E-mail" class="input" name="email-input" required> <br/>
                <label for="senha-input"></label>
                <input type="password" placeholder="Senha" class="input" name="senha-input" required> <br/>
                <input type="submit" value="Login" class="button">
            </form>
        </div>
    </div>


</body>


<script src="/assets/js/script.js"></script>


</html>