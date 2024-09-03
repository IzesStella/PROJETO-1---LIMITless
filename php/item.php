<?php

require_once 'db.php';

$stmt = $pdo->prepare("
SELECT p.NOME, p.TAMANHO, p.COR, p.ESTADO_PROD, p.IMAGEM, u.NOME AS USUARIO
FROM PRODUTOS p
JOIN USUARIOS u ON p.USUARIO_ID = u.ID
WHERE p.ID = :id
");
$stmt->execute(['id' => 1]); // ID do produto a ser exibido
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if ($produto) {
// Convertendo o BLOB da imagem para base64
$imagemBase64 = base64_encode($produto['IMAGEM']);
$imagem = "data:image/jpeg;base64," . $imagemBase64;

?>

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
                            </li><a href="/php/sobrenos.php">Sobre Nós</a></li>
                            </li><a href="/php/entrar.php">Entrar </a></li> 
                            </li><a href="/php/cadastro.php">Cadastre-se</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>

            <div class="product">
                <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" alt="" class="product-image">
                <div class="product-details">
                    <h1 class="product-name"><?php echo htmlspecialchars($produto['nome']); ?></h1>
                    <p class="product-detail">Tamanho da Forma: <?php echo htmlspecialchars($produto['tamanho']); ?></p>
                    <p class="product-detail">Cor: <?php echo htmlspecialchars($produto['cor']); ?></p>
                    <p class="product-detail">Estado do item: <?php echo htmlspecialchars($produto['estado_prod']); ?></p>
                </div>
            </div>
            <a href="#" class="btn1">
                <img src="../img/chat.jpg" alt="Voltar" class="button-image">
            </a>            
            <h3 class="text-chat"> Iniciar Chat</h3>
        </body>
    </html>
    <?php
}
?>