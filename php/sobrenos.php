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
            <img src="logo barra.png">
        </div>
        <div class="logo">
            <img src="/img/logo barra.png">
        </div>

        <form class="search-form"> 
            <input type="text" placeholder="Procurar itens...">
        </form>

        <nav>
        <ul>
                <?php if (isset($_SESSION['username_id'])): ?>
                    <li><a href="#">Chat</a></li>
                    <li><a href="#">Perfil</a></li> 
                    <li><a href="/php/logout.php">Logout (<?= $_SESSION['user'] ?>)</a></li>
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
            <img src="/img/dyvamia.jpg" alt="IzesStella">
            <div class="card-content">
                <h2>Izes Linda</h2>
                <div class="link">
                    <a href="https://www.instagram.com/izesstella/">
                        <img src="/img/instalogo.png" alt="logoinsta" class="insta-logo">
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <img src="/img/dyvamia.jpg" alt="Mari">
            <div class="card-content">
                <h2>Mariana Tavares</h2>
                <div class="link">
                    <a href="https://github.com/marianantavares">
                    
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <img src="/img/dyvamia.jpg" alt="Lucas">
            <div class="card-content">
                <h2>Lucas Amaro</h2>
                <div class="link">
                    <a href="https://github.com/lucazle">
                    
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <img src="/img/dyvamia.jpg" alt="Isabelly">
            <div class="card-content">
                <h2>Isabelly Arruda</h2>
                <div class="link">
                    <a href="https://github.com/IsabellyArrudaa">
                        
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <img src="/img/dyvamia.jpg" alt="Talita">
            <div class="card-content">
                <h2>Talita Vitória</h2>
                <div class="link">
                    <a href="https://github.com/Talitavit">
    
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="button-container">
    <a href="https://github.com/IzesStella/PROJETO-1---LIMITless" class="btn1">
        <img src="/img/githubicon.png" alt="Voltar" class="button-image">
    </a>
</div>

</body>
</html>
