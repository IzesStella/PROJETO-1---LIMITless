<?php
session_start();

// Verifique se a variável de sessão 'user_id' está definida
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    echo "Erro: ID do usuário não está definido na sessão.";
    exit;
}

$user_id = $_SESSION['user_id'];

// Conexão com o banco de dados
require_once 'db.php';

// Verificar se foi enviada uma imagem
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto_perfil'])) {
    $fileTmpPath = $_FILES['foto_perfil']['tmp_name'];
    $fileName = $_FILES['foto_perfil']['name'];
    $fileNameCmps = explode('.', $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($fileExtension, $allowedfileExtensions)) {
        $newFileName = uniqid() . '.' . $fileExtension;
        $uploadFileDir = __DIR__ . '/../storage/';
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Atualize o caminho da imagem no banco de dados
            $stmt = $pdo->prepare("UPDATE usuarios SET PATH_USUARIO = ? WHERE ID = ?");
            $stmt->execute([$newFileName, $user_id]);

            // Atualize a variável para mostrar a nova imagem
            $imagemPath = '/storage/' . $newFileName;
        } else {
            echo "Erro ao mover o arquivo para o diretório de upload.";
        }
    } else {
        echo "Tipo de arquivo não permitido. Por favor, envie arquivos JPG, JPEG, PNG ou GIF.";
    }
}

// Conectar ao banco de dados e obter dados do usuário
try {
    $stmt = $pdo->prepare("SELECT *, PATH_USUARIO FROM usuarios WHERE ID = ?");
    $stmt->execute([$user_id]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        echo "Erro: Usuário não encontrado.";
        exit;
    }

    $stmtProdutos = $pdo->prepare("SELECT * FROM produtos WHERE USUARIO_ID = ?");
    $stmtProdutos->execute([$user_id]);
    $produtos = $stmtProdutos->fetchAll(PDO::FETCH_ASSOC);

    // Define o caminho da imagem do usuário
    $imagemPath = !empty($usuario['PATH_USUARIO']) ? '/storage/' . $usuario['PATH_USUARIO'] : '/storage/placeholder.png';

} catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
    exit;
}
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
                    <img src="<?php echo htmlspecialchars($imagemPath); ?>" alt="Foto de Perfil">
                    <!-- Formulário para editar perfil -->
                    <form method="POST" enctype="multipart/form-data" style="display: inline;">
                        <label for="foto_perfil" class="edit-profile-button">Editar Perfil</label>
                        <input type="file" id="foto_perfil" name="foto_perfil" accept="image/*" style="display: none;" onchange="this.form.submit();">
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>
                <div class="profile-info">
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
            <?php if (!empty($produtos)): ?>
                <?php foreach ($produtos as $produto): ?>
                    <div class="product-item">
                        <img src="<?php echo htmlspecialchars(!empty($produto['PATH_PRODUTO']) ? '/storage/' . $produto['PATH_PRODUTO'] : '../img/placeholder.png'); ?>" alt="Produto">
                        <p><?php echo htmlspecialchars($produto['NOME']); ?></p>
                        <p>Tamanho: <?php echo htmlspecialchars($produto['TAMANHO']); ?></p>
                        <p>Cor: <?php echo htmlspecialchars($produto['COR']); ?></p>
                        <p>Estado: <?php echo htmlspecialchars($produto['ESTADO_PROD']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Você ainda não cadastrou nenhum produto.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
