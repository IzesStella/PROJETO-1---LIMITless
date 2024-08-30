<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';
require_once './authenticate.php';
// Executa a consulta para obter todos os alunos
$stmt = $pdo->query("SELECT * FROM usuarios");
// Recupera todos os resultados da consulta como um array associativo
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/index.css">

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
                <?php if (isset($_SESSION['user_id'])): ?>
                    </li><a href="cadastro-itens.php"><img src="../img/chat.jpg" alt="Chat Icon" class="nav-icon"></a></li>
                    </li><a href="/php/perfil.php"><img src="../img/favoritos.png" alt="fav Icon" class="nav-icon"></a></li> 
                    </li><a href="/php/logout.php"><img src="../img/perfil.png" alt="Perfil Icon" class="nav-icon"></a></li>
                    <?php else: ?>
                    </li><a href="/php/sobrenos.php">Sobre Nós</a></li>
                    </li><a href="/php/entrar.php">Entrar </a></li> 
                    </li><a href="/php/cadastro.php">Cadastre-se</a></li>
                <?php endif; ?>
            </ul>
        </nav>
       <nav>
            <li>
                 <a href="#"> FEMININO </a>
                 <a href="#"> MASCULINO </a>
                 <a href="#"> FEMININO PLUS SIZE </a>
                 <a href="#"> MASCULINO PLUS SIZE </a>
                 <a href="#"> FANTASIA </a>
                 <a href="#"> BOLSA</a>
                 <a href="#"> CALÇADOS </a>
                 <a href="#"> ACESSÓRIOS </a>
            </li>
        </nav>
    </header>
</body>
</html>