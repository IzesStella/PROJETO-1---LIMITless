<?php
require_once 'db.php';
require_once 'authenticate.php';

// Obter todos os usuários para associar ao produto
$stmt = $pdo->query("SELECT id, user FROM usuarios");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $tamanho = $_POST['tamanho'];
    $cor = $_POST['cor'];
    $estado_prod = $_POST['estado_prod'];

    // Verificar se foi enviada uma imagem
    if (!empty($_FILES['imagem']['name'])) {
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $novoNome = uniqid() . '.' . $extensao;
        $caminho = __DIR__ . '/../storage/' . $novoNome;

        // Mover o arquivo para a pasta storage
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho)) {
            // Inserir o caminho da imagem na tabela imagens
            $imagem = $novoNome;
        }
        } else {
        echo "Erro ao mover o arquivo.";
        $imagem = null;
    }
    
    // Se o usuário estiver logado, use o ID da sessão, caso contrário, use o valor enviado pelo formulário
    $usuario_id = $_SESSION['user_id'] ?? $_POST['usuario_id'];

    // Insere o novo produto no banco de dados
    $stmt = $pdo->prepare("INSERT INTO produtos (nome, tamanho, cor, estado_prod, path_produto, usuario_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $tamanho, $cor, $estado_prod, $imagem, $usuario_id]);

    header('Location: index-usuario.php');
    exit;
}

if (isset($_POST['whatsapp'])) {
    $whatsappNumber = preg_replace('/\D/', '', $_POST['whatsapp']); // Remove tudo que não é número
    $whatsappLink = "https://wa.me/55" . $whatsappNumber;
    echo "<a href='$whatsappLink' target='_blank'>Falar com o vendedor no WhatsApp</a>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produto</title>
    <link rel="stylesheet" href="../css/cadastroitens.css"></link>

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
    
    <div>

    <div class="form-container">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-grupo">
            <label for="nome">Nome do Produto</label>
            <input type="text" id="nome" name="nome" required>

            <label for="tamanho">Tamanho da Forma</label>
            <input type="text" id="tamanho" name="tamanho" required>

            <label for="cor">Cor</label>
            <input type="text" id="cor" name="cor" required>

            <label for="estado_prod">Estado do Item</label>
            <input type="text" id="estado_prod" name="estado_prod" required>

            <label for="whatsapp">WhatsApp para Contato</label>
            <input type="text" id="whatsapp" name="whatsapp" placeholder="Digite o número com DDD">
        </div>

        <label for="imagem" class="file-upload"><img src="../img/upload.png" alt="Carregar imagem" class="upload-icon"></label>
        <input type="file" id="imagem" name="imagem" accept="image/*" required>
        
        <button type="submit">Postar Item</button>
    </form>
</div>
</body>
       </html>