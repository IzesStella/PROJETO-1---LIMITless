<?php
session_start();
require_once './authenticate.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIMITless</title>
    <link rel="stylesheet" href="../css/sobrenos.css">
</head>
<body>
    <header>
                <div class="logo">
            <img src="/img/logo barra.png">
        </div>

        <form class="search-form"> 
            <input type="text" placeholder="Procurar itens...">
        </form>

        <nav>
        <ul>
        <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/php/sobrenos.php"><img src="../img/about.png" alt="Sobre Icon"></a></li> 
                    <li><a href="/php/cadastro-itens.php"><img src="../img/addproduto.png" alt="Produto Icon"></a></li> 
                    <li><a href="/php/perfil.php"><img src="../img/perfillogo.png" alt="Perfil Icon"></a></li>
                <?php else: ?>
                    <li><a href="/php/sobrenos.php">Sobre Nós</a></li>
                    <li><a href="/php/entrar.php">Entrar</a></li> 
                    <li><a href="/php/cadastro.php">Cadastre-se</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <div class="desenvolvedores">
        <div class="card">
            <img src="../img/izes.jpg" alt="IzesStella">
            <div class="card-content">
                <h2>Izes Stella</h2>
                <div class="link">
                    <a href="https://www.instagram.com/izesstella/">
                        <img src="/img/instalogo.png" alt="logoinsta" class="insta-logo">
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <img src="/img/mariana.jpeg" alt="MarianaTavares">
            <div class="card-content">
                <h2>Mariana Tavares</h2>
                <div class="link">
                    <a href="https://www.instagram.com/mari.n.t/">
                    <img src="/img/instalogo.png" alt="logoinsta" class="insta-logo">
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <img src="/img/lucas.jpeg" alt="LucasAmaro">
            <div class="card-content">
                <h2>Lucas Amaro</h2>
                <div class="link">
                    <a href="https://www.instagram.com/lucazle/">
                    <img src="/img/instalogo.png" alt="logoinsta" class="insta-logo">
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <img src="/img/isabelly.jpeg" alt="IsabellyArruda">
            <div class="card-content">
                <h2>Isabelly Arruda</h2>
                <div class="link">
                    <a href="https://www.instagram.com/isabellyarruda/">
                    <img src="/img/instalogo.png" alt="logoinsta" class="insta-logo">
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <img src="/img/talita.jpeg" alt="TalitaVitoria">
            <div class="card-content">
                <h2>Talita Vitória</h2>
                <div class="link">
                    <a href="https://www.instagram.com/talitaavit/t">
                    <img src="/img/instalogo.png" alt="logoinsta" class="insta-logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="button-container">
    <h2 class="text-left">Git</h2>
    <a href="https://github.com/IzesStella/PROJETO-1---LIMITless" class="btn1">
        <img src="/img/githubicon.png" alt="Voltar" class="button-image">
    </a>
    <h2 class="text-right">Hub</h2>
</div>

</body>
</html>
