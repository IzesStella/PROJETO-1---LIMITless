<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';
require_once './authenticate.php';

try {
    // Consulta simplificada para obter todos os produtos
    $stmt = $pdo->query("SELECT id, nome, path_produto FROM produtos");
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Produtos</title>
    <link rel="stylesheet" href="../css/indexusuario.css">
</head>
<style>
        /* Ajustes para a exibição de produtos em grid */
        main {
            margin-top: 400px; /* Ajuste a margem superior para posicionar o conteúdo abaixo do banner */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Define 4 colunas */
            gap: 20px;
            width: 90%;
            margin-top: 20px;
        }

        .product-item {
            background-color: #FFF;
            border-radius: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 15px;
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
        }

        .product-name {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .product-actions a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 15px;
            background-color: #4F744C;
            color: #FFF;
            text-decoration: none;
            border-radius: 5px;
        }

        .product-actions a:hover {
            background-color: #3e5d3b;
        }

        .Banner-item {
            margin-bottom: 20px;
        }

        /* Responsividade */
        @media (max-width: 1200px) {
            .product-grid {
                grid-template-columns: repeat(3, 1fr); /* 3 colunas para telas grandes */
            }
        }

        @media (max-width: 768px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr); /* 2 colunas para tablets */
            }
        }

        @media (max-width: 480px) {
            .product-grid {
                grid-template-columns: 1fr; /* 1 coluna para telas pequenas */
            }

            .product-image {
                height: 200px; /* Ajusta a altura da imagem para telas pequenas */
            }

            main {
                margin-top: 300px; /* Ajusta a margem superior em telas pequenas */
            }
        }
    </style>
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
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/php/sobrenos.php"><img src="../img/about.png" alt="Sobre Icon"></a></li> 
                    <li><a href="/php/cadastro-itens.php"><img src="../img/addproduto.png" alt="Produto Icon"></a></li> 
                    <li><a href="/php/perfil.php"><img src="../img/perfillogo.png" alt="Perfil Icon"></a></li>
                <?php else: ?>
                    <li><a href="/php/sobrenos.php">Sobre Nós</a></li>
                    <li><a href="/php/entrar.php">Entrar</a></li> 
                    <li><a href="/php/cadastro.php">Cadastre-se</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <div class="Banner-item"><img src="../img/banner.png" alt="Banner"></div>

    <main>
        <div class="product-grid">
            <?php foreach ($produtos as $produto): ?>
                <div class="product-item">
                    <img class="product-image" src="../storage/<?php echo htmlspecialchars($produto['path_produto']); ?>" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                    <div class="product-name"><?php echo htmlspecialchars($produto['nome']); ?></div>
                    <div class="product-actions">
                        <a href="produto_detalhes.php?id=<?php echo $produto['id']; ?>">Ver Detalhes</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>