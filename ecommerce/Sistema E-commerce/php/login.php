<?php

session_start();
include'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $smtm = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $smtm->bind_param("s", $email);
    $smtm->execute();
    $result = $smtm->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: pagina_inicial.html");
            echo "Login realizado com sucesso!";
            exit();
        } else {
            $error = "Usuário não encontrado";
        }

    }
}  

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
   
</head>
<body>
    <div class="navbar show-menu">
        <div class="header-inner-content">
            <h1 class="logo"><span>Let's</span> Shop!</h1>
            <nav>
                <ul>
                    <li> <a href="../Sistema E-commerce/pagina_inicial.html" style="color: white; text-decoration: none;">Início</a></li>
                    <li>Sobre</li>
                    <li>Contato</li>
                    <li>Cadastrar Produto</li>
                    <li><a href="../php/login.php" style="color: white; text-decoration: none;">Conta</a></li>

                </ul>
            </nav>
            <div class="nav-icon-container">
                <img src="../Sistema E-commerce/Imagens/cart.png">
                <img src="../Sistema E-commerce/Imagens/menu.png" class="menu-button">
            </div>
        </div>
    </div>
    <div class="wrapper">
        <header>
            <h1>Login</h1>
        </header>
        <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>

        <?php endif; ?>
        
        <form action="login.php" method="POST">
            <div class="input-box">
                <input type="email" id="email" name="email" placeholder="E-mail" required>
            </div>

            <div class="input-box">
               <input type="password" id="password" name="password" placeholder="Senha" required> 
            </div>
            <div class="cadastro">
                <p>Ainda não tem cadastro? <a href="register.php">Cadastrar</a></p>
            </div>
            
            
            <button class="btn" type="submit"><a href="../Sistema E-commerce/pagina_inicial.html" style="color: white; text-decoration: none" onclick="Entrar();">Entrar</a></button>
            
        </form>
    </div>
    
    <footer class="grey-background">
        <div class="page-inner-content footer-content">
            <div class="download-options">
                <p>Baixe a nosso app.</p>
                <p>Baixe nosso app para Android e IOS</p>
                <div>
                    <img src="../Sistema E-commerce/Imagens/Google_Play_Store_badge_EN.svg.png" alt="">
                    <img src="../Sistema E-commerce/Imagens/Download_on_the_App_Store_Badge.svg.png" alt="">
                </div>
            </div>

            <div class="logo-footer">
                <h1 class="logo"><span>Let's</span> Shop!</h1>
                <p>Segurança e confiabilidade é nosso lema.</p>
            </div>

            <div class="links-footer">
                <h3>Links úteis</h3>
                <ul>
                    <li>Cupons</li>
                    <li>Blog Post</li>
                    <li>Políticas</li>
                    <li>Torne-se afiliado</li>
                </ul>
            </div>
        </div>
        <hr class="page-inner-content">

        <div class="page-inner-content">
            <p class="copyright">Copyright © 2024 - Let's Shop - Todos os Direitos Reservados</p>
        </div>
     </footer>
    <script src="../js/script.js" rel="js"></script>
</body>
</html>