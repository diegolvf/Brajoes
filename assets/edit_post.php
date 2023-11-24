<?php
// Conexão com banco de dados
include('db_connection.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$message = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para obter informações do post com base no ID
    $sql = "SELECT * FROM posts WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        $message = "Nenhum post encontrado com este ID.";
    }
} else {
    $message = "ID não fornecido na URL.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/edit_post.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/hauser" rel="stylesheet">
    <script src=".//tinymce/tinymce.min.js"></script>
    <title>Edit Posts</title>
</head>
<body>
    <header class="active">
    <img id="logo_edit_page" src="./img/logo.png" alt="Logo Brajoes página de edição posts">
        <nav>
            <div class="menu-toggle">
                <span id="span-1"></span>
                <span id="span-2"></span>
                <span id="span-3"></span>
            </div>

            <ul>
                <li><a href="" target="_blank">HOME</a></li>
                <li><a href="./post-view.php" target="_blank">POSTS</a></li>
                <li><a href="./select_post.php" target="_blank">EDIT POSTS</a></li>
                <li><a href="./welcome.php" target="_blank">ADMINISTRADOR</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <form action="update_post.php" method="post" id="post-form" class="post-form">
                
                
                <h1>EDIÇÃO DE POSTS</h1>

                <div class="id-container">
                    <label for="id">ID DO POST:</label>
                    <input type="text" name="id" id="id" placeholder="Id nº...." value='<?php echo isset($post["id"]) ? $post["id"] : '' ?>' readonly>
                </div>

                <div class="title-container">
                    <label for="title">TITULO DA POSTAGEM</label>
                    <input type="text" name="title" id="title" placeholder=" Digite o título do seu post aqui..." value='<?php echo isset($post["title"]) ? $post["title"] : '' ?>'>
                </div>

                <div class="text-container">
                    <label for="content">INFORMAÇÕES DO POST</label>
                    <textarea name="content" id="content" cols="" rows="" placeholder=" Digite o seu texto aqui..."><?php echo isset($post["content"]) ? $post["content"] : '' ?></textarea>
                </div>

                <div class="form-buttons">
                    
                    <div class="container-edit-button">
                        <button type="submit" class="edit-button">Editar Post</button>
                    </div>

                    <div class="container-back-button">
                        <button class="back-button" ><a href="./select_post.php">Voltar a Seleção</a></button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script>
        tinymce.init({
      selector: 'textarea#content',
      plugins: 'ai tinycomments autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen editimage tableofcontent',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments',
      menubar: false,
      width: '100%',
      height:'100vh',
      images_max_width: '80%',
      images_max_height: '80%',
      tinycomments_mode: 'embedded',
      

      //images_upload_url: 'img_upload.php',

      images_upload_handler:(blobInfo, progress) => new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', 'img_upload.php');

        xhr.upload.onprogress = (e) => {
            progress(e.loaded / e.total * 100);
        };

        xhr.onload = () => {
            if (xhr.status === 403) {
            reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
            return;
            }

            if (xhr.status < 200 || xhr.status >= 300) {
            reject('HTTP Error: ' + xhr.statusText);
            return;
            }

            const json = JSON.parse(xhr.responseText);

            if (!json || typeof json.location != 'string') {
            reject('Invalid JSON: ' + xhr.responseText);
            return;
            }

            resolve(json.location);
        };

            xhr.onerror = () => {
                reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            };

        const formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());

        xhr.send(formData);
})
    });
      </script>
      <script src="./js/menu-toggle.js"></script>
</body>
</html>

