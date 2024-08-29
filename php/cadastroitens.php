<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="../css/cadastroitens.css"></link>

</head>
<body>
    <header>
        <div class="logo">
            <img src="/img/logo barra.png">
        </div>

        <form class="search-form"> 
            <input type="text" placeholder="Procurar itens...">
        </form>
        <nav>
            <ul>
                <a href="#"><img src="/img/chat.jpg" alt="Chat Icon" class="nav-icon chat-icon"></a>
                <a href="#"><img src="/img/favoritos.png" alt="fav Icon" class="nav-icon fav-icon"></a> 
                <a href="/php/logout.php"><img src="/img/perfil.png" alt="Perfil Icon" class="nav-icon"></a>
            </ul>
        </nav>
    </header>
    
    <div class="upload-contaider">
        <label for="upload">
            <img src="/img/upload.png" alt="Upload Image" class="upload-image"></label>
        <input type="file" id="upload" name="arquivo" required>
    </div>


    <div class="form-grupo">   
       <label for="nome">Nome do Produto</label>
       <input type="text" id="nome" name="nome" required>
       
       <label for="tamanho">Tamanho da Forma</label>
       <input type="text" id="tamanho" name="tamanho" required>
       
       <label for="cor">Cor</label>
       <input type="text" id="cor" name="cor" required>
       
       <label for="estado">Estado do Item</label>
       <input type="text" id="estado" name="estado" required>
    </div>
    
    <button type="submit">Postar Item</button> 

</body>
       </html>