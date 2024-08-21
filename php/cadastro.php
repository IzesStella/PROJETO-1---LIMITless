<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $bairro = $_POST['bairro'];
    $email = $_POST['email'];
    $username = $_POST['user'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE user = ?");
    $stmt->execute([$username]);
    if ($stmt->rowCount() > 0) {
        echo "Nome de usuário já existe!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO USUARIOS (nome, telefone, bairro, email, user, senha) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$nome, $telefone, $bairro, $email, $username, $senha])) {
            echo "Usuário registrado com sucesso!";
            header('Location: entrar.php');
        } else {
            echo "Erro ao registrar usuário.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> LIMITless </title>
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>

    <div class="image-container">
         <img src="image 5.png" alt="Imagem de Roupas">
    </div>
        <div class="form-container">
            <div class="espacoforms">
        <h1>Criar conta</h1>
        <h2>(Preencha os campos com seus dados)</h2>

        <form method="post">
            <div class="formgrupo">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="linhaform">
                <div class="formgrupo">
                    <label for="telefone">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone" required>
                </div>

                <div class="formgrupo">
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="bairro" required>
                </div>
            </div>

            <div class="linhaform">
                <div class="formgrupo">
                    <label for="endereco">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>

            <div class="linhaform">
                <div class="formgrupo">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
                <div class="formgrupo">
                    <label for="confirmarsenha">Confirmar Senha:</label>
                    <input type="password" id="confirmarsenha" name="confirmarsenha" required>
                </div>
            </div>

            <div class="formgrupo">
                <label for="user">Nome de Usuário</label>
                <input type="text" id="user" name="user" required>
            </div>
            <button type="submit">Criar Cadastro</button> 
        </form>
</div>
</div>

    
</body>
</html>