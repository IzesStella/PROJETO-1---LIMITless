<!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Produto</title>
            <link rel="stylesheet" href="../css/item.css">
        </head>
        <body>
            <header>
                <div class="logo">
                    <img src="../img/logo barra.png">
                </div>
        
                <form class="search-form"> 
                    <input type="text" placeholder="Procurar itens...">
                </form>
        
                <nav>
                <ul>
                        <?php if (isset($_SESSION['username_id'])): ?>
                            <li><a href="#">Chat</a></li>
                            <li><a href="/php/perfil.php">Perfil</a></li> 
                            <li><a href="/php/logout.php">Logout (<?= $_SESSION['user'] ?>)</a></li>
                        <?php else: ?>
                            </li><a href="/php/sobrenos.php">Sobre Nós</a></li>
                            </li><a href="/php/entrar.php">Entrar </a></li> 
                            </li><a href="/php/cadastro.php">Cadastre-se</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>

                <img src="" alt="" class="product-image">
            <div class="product">
                <div class="product-details">
                    <h1 class="product-name">   .</h1>
                    <p class="product-detail">Tamanho da Forma:</p>
                    <p class="product-detail">Cor:</p>
                    <p class="product-detail">Estado do item:</p>
                </div>
            </div>
            <div class="user-info">
                 <p class="user-item">Item de</p>
                 <p class="user-name"></p>
                 <p class="user-handle"></p>
            </div>
            <a href="#" class="btn1">
                <img src="../img/chat.jpg" alt="Voltar" class="button-image">
            </a>            
            <h3 class="text-chat"> Iniciar Chat</h3>
        </body>
    </html>