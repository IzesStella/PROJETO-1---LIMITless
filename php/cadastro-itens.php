<a?php
session_start();
require_once 'db.php';
require_once 'authenticate.php';

// Obter todos os usuários para associar ao aluno
$stmt = $pdo->query("SELECT id, user FROM usuarios");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $tamanho = $_POST['tamanho'];
    $cor = $_POST['cor'];
    $estado_prod = $_POST['estado_prod'];
    
    // Se o usuário estiver logado, use o ID da sessão, caso contrário, use o valor enviado pelo formulário
    $usuario_id = $_SESSION['user_id'] ?? $_POST['usuario_id'];

    // Insere o novo produto no banco de dados
    $stmt = $pdo->prepare("INSERT INTO produtos (nome, tamanho, cor, estado_prod, usuario_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $tamanho, $cor, $estado_prod, $usuario_id]);

    header('Location: index-usuario.php');
    exit;
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
            <img src="../img/logo barra.png" alt="Logo">
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


    <div class="upload-contaider">
        <label for="upload">
            <img src="../img/upload.png" alt="Upload Image" class="upload-image"></label>
        <input type="file" id="upload" name="arquivo" required>
    </div>


    <form action="" method="POST">
            <div class="form-grupo">
                <label for="nome">Nome do Produto</label>
                <input type="text" id="nome" name="nome" required>

                <label for="tamanho">Tamanho da Forma</label>
                <input type="text" id="tamanho" name="tamanho" required>

                <label for="cor">Cor</label>
                <input type="text" id="cor" name="cor" required>

                <label for="estado_prod">Estado do Item</label>
                <input type="text" id="estado_prod" name="estado_prod" required>

            
             
            </div>
            <button type="submit">Postar Item</button>

</body>
       </html>