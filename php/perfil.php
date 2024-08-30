<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';
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
            <img src="../img/logo barra.png">
        </div>

        <form class="search-form"> 
            <input type="text" placeholder="Procurar itens...">
        </form>

        <nav>
        <ul>
            
            </li><a href="cadastro-itens.php"><img src="../img/chat.jpg" alt="Chat Icon" class="nav-icon"></a></li>
             </li><a href="/php/perfil.php"><img src="../img/favoritos.png" alt="fav Icon" class="nav-icon"></a></li> 
            </li><a href="/php/logout.php"><img src="../img/perfil.png" alt="Perfil Icon" class="nav-icon"></a></li>
                
            </ul>
        </nav>
       <nav>