<?php
require_once 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user'];
    $senha = $_POST['senha'];

    // Verifica se o nome de usuário existe
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE user = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    
        // Verifica se a senha está correta
        if ($user && password_verify($senha, $user['SENHA'])) {
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['user'] = $user['USER'];
            header('Location: /php/index-usuario.php');
            exit;
        } else {
            echo "Nome de usuário ou senha incorretos!";
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> LIMITless </title>
            <link rel="stylesheet" href="../css/entrar.css">
        </head>
        <body>
        
            <div class="background-layer"></div>
            <div class="container">
                <div class="formentrar">
                    <div class="image-container">
                        <img src="img/logo grande.png" alt="logo">
                    </div><br>
                    <form method="post">
                        <label for="user">Username:</label>
                        <input type="text" id="user" name="user" required> <br>
        
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" required> <br>
        
                        <button type="submit">Entrar</button> 
                    </form>
                </div>        
            </div>  
        </body>
        </html>