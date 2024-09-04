<?php
session_start();

// Verifique se a variável de sessão 'user_id' está definida e contém um valor
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    echo "Erro: ID do usuário não está definido na sessão.";
    exit;
}

$user_id = $_SESSION['user_id'];

// Verifique o valor de $user_id
echo "ID do usuário: " . htmlspecialchars($user_id) . "<br>";

require_once 'db.php';

try {
    // Executa a consulta para obter os dados do usuário logado
    $stmt = $pdo->prepare("SELECT *, path_usuario FROM usuarios WHERE id = ?");
    $stmt->execute([$user_id]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifique se a consulta retornou dados
    if (!$usuario) {
        echo "Erro: Usuário não encontrado.";
        exit;
    }
} catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
    exit;
}

// Defina o caminho da imagem do usuário
$imagemPath = !empty($usuario['PATH_USUARIO']) ? '/storage/' . $usuario['PATH_USUARIO'] : '/storage/profile.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Perfil</title>
    <link rel="stylesheet" href="../css/perfil.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="../img/logo barra.png" alt="Logo">
        </div>

        <form class="search-form"> 
            <input type="text" placeholder="Procurar itens...">
        </form>

        <nav>
            <ul>
                <li><a href="/php/sobrenos.php"><img src="../img/about.png" alt="Sobre Icon"></a></li>
                <li><a href="/php/cadastro-itens.php"><img src="../img/addproduto.png" alt="Add Icon" class="nav-icon"></a></li>
                <li><a href="/php/perfil.php"><img src="../img/perfillogo.png" alt="Perfil Icon" class="nav-icon"></a></li>
            </ul>
        </nav>
    </header>

    <div class="profile-container">
    <div class="profile-header">
        <div class="profile-details">
            <div class="profile-picture">
                <!-- Exibe a imagem de perfil do usuário logado -->
                <img src="<?php echo htmlspecialchars($imagemPath); ?>" alt="Foto de Perfil">
                <button class="edit-profile-button">Editar Perfil</button>
            </div>
            <div class="profile-info">
                <!-- Exibe o nome completo e o username do usuário logado -->
                <h1><?php echo htmlspecialchars($usuario['NOME'] ?? 'Nome não disponível'); ?></h1>
                <p class="user-handle"><a>@</a><?php echo htmlspecialchars($usuario['USER'] ?? 'Username não disponível'); ?></p>
            </div>
        </div>
        <div class="actions">
            <a href="/php/cadastro-itens.php" class="register-product">
                <img src="../img/addproduto.png" alt="Add Icon">
                <p>Cadastrar Produtos</p>
            </a>
            <button class="logout-button"><a href="/php/logout.php">Log Out</a></button>
        </div>
    </div>
</div>

    <div class="products-section">
        <h2>Seus Produtos</h2>
        <div class="products-list">
            <div class="product-item">
                <img src="../img/placeholder.png" alt="Produto">
            </div>
            <div class="product-item">
                <img src="../img/placeholder.png" alt="Produto">
            </div>
            <div class="product-item">
                <img src="../img/placeholder.png" alt="Produto">
            </div>
        </div>
    </div>
</body>
</html>