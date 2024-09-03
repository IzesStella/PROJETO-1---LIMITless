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
            <div class="profile-picture">
                <img src="../img/perfillogo.png" alt="Foto de Perfil">
                <button class="edit-profile-button">Editar Perfil</button>
            </div>
            <div class="profile-info">
                <h1>Nome Completo</h1>
                <p>username</p>
            </div>
            <div class="actions">
                
                <a href="/php/cadastro-itens.php" class="register-product">
                    <img src="../img/addproduto.png" alt="Add Icon">
                    <p>Cadastrar Produtos</p>

                </a>
                
                    <button class="logout-button"><a href="/php/logout.php">Log Out</button>
        
            </div>
        </div>

        <div class="products-section">
            <h2>Seus Produtos</h2>
            <div class="products-list">
                <div class="product-item">
                    <img src="../img/placeholder.png" alt="Produto">
                    <p>Shorts Jeans</p>
                </div>
                <div class="product-item">
                    <img src="../img/placeholder.png" alt="Produto">
                    <p>Vestido Florido</p>
                </div>
                <div class="product-item">
                    <img src="../img/placeholder.png" alt="Produto">
                    <p>Calça de Couro</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>