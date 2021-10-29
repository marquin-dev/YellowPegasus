<? var_dump($_SESSION); ?>
<header>
        <img src="assets/images/Logo.svg" alt="logo" id="logo">

        <nav id="navbar-header">
            <button id="btn-mobile"> Menu
                <span id="btn-style"></span>
            </button>
            <ul id="navbar">
                <?php if(session_id()):?>
                <li class="navbar-item" id="email">
                    <a href="pages/myAccount.php">Oi! <?php echo $_SESSION['userfullName']; ?>! </a>
                    <ul>
                        <li><a href="../../../pages/myAccount.php">Meu Perfil</a></li>
                        <?php if($_SESSION['userStatus'] === 'admin'):?>
                            <li><a href="#">Cadastrar novo usuário</a></li>
                            <li><a href="../../../pages/insertProduct.php">Cadastrar produto</a></li>
                            <li><a href="#">Editar usuário</a></li>
                            <li><a href="#">Editar produto</a></li>
                        <?php elseif($_SESSION['userStatus'] === 'collab'):?>
                            <li><a href="../../../pages/insertProduct.php">Cadastrar produto</a></li>
                            <li><a href="#">Editar produto</a></li>
                        <?php endif; ?>
                        <li><a href="../../../assets/php/handlers/logOut.php">Fazer logout</a></li>
                    </ul>
                </li>
                <li class="navbar-item"><img src="assets/images/shopping-bag.svg" alt="" id="shopping-bag"></li>
                <?php else:?>                
                    <li class="navbar-item"><a href="#" id="login">Entrar</a></li>
                    <li class="navbar-item"><a href="../../../pages/register.php" id="register-button">Registrar</a></li>
                    <li class="navbar-item"><img src="assets/images/shopping-bag.svg" alt="" id="shopping-bag"></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>