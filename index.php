<?php
// Inclui o arquivo de conexão com o banco de dados
require_once './php/db.php';
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
            <img src="img/logo barra.png">
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
                        <li><a href="/php/sobrenos.php">Sobre Nós</a></li>
                        <li><a href="/php/entrar.php">Entrar </a></li> 
                        <li><a href="/php/cadastro.php">Cadastre-se</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>

    
    </header>
    <div class="Banner-item"><img src="../img/banner.png" alt="Banner"></div>
</body>
</html>