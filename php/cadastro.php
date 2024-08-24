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
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            echo "E-mail já cadastrado!";
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
         <img src="img/image 5.png" alt="Imagem de Roupas">
    </div>
        <div class="form-container">
            <div class="espacoforms">
        <h1>Criar conta</h1>
        <h2>(Preencha os campos com seus dados)</h2>

        <form method="post">
            
            <div class="formgrupo">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" required>
                <br>
                <label for="endereco">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="linhaform">
                <div class="formgrupo">
                    <label for="telefone">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone" required>
                </div>

                <div class="formgrupo">
                    <label for="bairro">Bairro:</label>
                    <select id="bairro" name="bairro" required>
                        <option value="Agamenon Magalhães">Bairro</option>
                        <option value="Alto do Céu">Alto do Céu</option>
                        <option value="Ana de Albuquerque">Ana de Albuquerque</option>
                        <option value="Araçoiaba">Araçoiaba</option>
                        <option value="Área Rural de Igarassu">Área Rural de Igarassu</option>
                        <option value="Bela Vista">Bela Vista</option>
                        <option value="Bonfim">Bonfim</option>
                        <option value="Campina de Feira">Campina de Feira</option>
                        <option value="Centro">Centro</option>
                        <option value="Cruz De Rebouças">Cruz De Rebouças</option>
                        <option value="Distrito de Três Ladeiras">Distrito de Três Ladeiras</option>
                        <option value="Distrito Industrial">Distrito Industrial</option>
                        <option value="Distrito Nova Cruz">Distrito Nova Cruz</option>
                        <option value="Encanto Igarassu">Encanto Igarassu</option>
                        <option value="Inhamã">Inhamã</option>
                        <option value="Jabacó">Jabacó</option>
                        <option value="Pancó">Pancó</option>
                        <option value="Posto de Monta">Posto de Monta</option>
                        <option value="Rubina">Rubina</option>
                        <option value="Santa Luzia">Santa Luzia</option>
                        <option value="Santa Rita">Santa Rita</option>
                        <option value="Santo Antônio">Santo Antônio</option>
                        <option value="Saramandaia">Saramandaia</option>
                        <option value="Sítio dos Marcos">Sítio dos Marcos</option>
                        <option value="Tabatinga">Tabatinga</option>
                        <option value="Triunfo">Triunfo</option>
                        <option value="Umbura">Umbura</option>
                        <option value="Vila Rural">Vila Rural</option>
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

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        const senha = document.getElementById('senha').value;
        const confirmarSenha = document.getElementById('confirmarsenha').value;

        if (senha !== confirmarSenha) {
            alert("As senhas precisam ser iguais!");
            event.preventDefault(); // Impede o envio do formulário
        }
    });

    document.querySelector('form').addEventListener('submit', function(event) {
        const email = document.getElementById('email').value;
        const confirmarSenha = document.getElementById('confirmarsenha').value;
    }
</script>