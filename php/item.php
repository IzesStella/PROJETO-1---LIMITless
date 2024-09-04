<?php
require_once 'db.php';
require_once './authenticate.php';

// Verifica se o ID do produto foi passado na URL
if (isset($_GET['id'])) {
    $produto_id = $_GET['id'];

    try {
        // Consulta para obter os detalhes do produto
        $stmt = $pdo->prepare("SELECT p.nome AS produto_nome, p.path_produto, p.tamanho, p.cor, p.estado_prod, u.nome AS usuario_nome, u.user AS usuario_user, u.telefone AS usuario_telefone FROM produtos p JOIN usuarios u ON p.usuario_id = u.id WHERE p.id = :id");        $stmt->bindParam(':id', $produto_id, PDO::PARAM_INT);
        $stmt->execute();
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se o produto foi encontrado
        if (!$produto) {
            echo "Produto não encontrado!";
            exit;
        }
    } catch (PDOException $e) {
        echo "Erro na consulta: " . $e->getMessage();
        exit;
    }
} else {
    echo "ID do produto não fornecido!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($produto['produto_nome'] ?? ''); ?></title>
    <link rel="stylesheet" href="../css/item.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="../index.php"><img src="../img/logo barra.png" alt="logo"></a>
        </div>

        <form class="search-form"> 
            <input type="text" placeholder="Procurar itens...">
        </form>

        <nav>
            <ul>
                <li><a href="/php/sobrenos.php"><img src="../img/about.png" alt="Sobre Icon"></a></li> 
                <li><a href="/php/cadastro-itens.php"><img src="../img/addproduto.png" alt="Produto Icon"></a></li> 
                <li><a href="/php/perfil.php"><img src="../img/perfillogo.png" alt="Perfil Icon"></a></li>
            </ul>
        </nav>
    </header>

    <div class="product">
        <img src="../storage/<?php echo htmlspecialchars($produto['path_produto'] ?? ''); ?>" alt="<?php echo htmlspecialchars($produto['produto_nome'] ?? ''); ?>" class="product-image">
        <div class="product-details">
        <h1 class="product-name"><?php echo htmlspecialchars($produto['produto_nome'] ?? ''); ?></h1>
        <p class="product-detail">Tamanho: <?php echo htmlspecialchars($produto['tamanho'] ?? ''); ?></p>
        <p class="product-detail">Cor: <?php echo htmlspecialchars($produto['cor'] ?? ''); ?></p>
        <p class="product-detail">Estado: <?php echo htmlspecialchars($produto['estado_prod'] ?? ''); ?></p>
        </div>
    </div>

    <div class="user-info">
        <p class="user-item">Item de</p>
        <p class="user-name"><?php echo htmlspecialchars($produto['usuario_nome'] ?? ''); ?></p>
        <p class="user-phone"><?php echo htmlspecialchars($produto['usuario_telefone'] ?? ''); ?></p>
        <p class="user-handle">@<?php echo htmlspecialchars($produto['usuario_user'] ?? ''); ?></p>
    </div>
</body>
</html>