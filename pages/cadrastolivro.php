<?php
include_once('../conexao.php');

error_reporting(0);
$msg = '';

?>

<?php
if (isset($_POST['send'])) {
    $titulodolivro = $_POST['titulo'];
    $autor = $_POST['autor'];
    $classificacaoIndicativa = $_POST['idade'];
    $editora = $_POST['editora'];
    $isbn = $_POST['isbn'];
    $img = $_POST['upfile'];

    $filename = $_FILES['upfile']['name'];
    $tempname = $_FILES['upfile']['tmp_name'];
    $folder = "../image/" . $filename;


    // Inserir um novo registro
    $insertSql = "INSERT INTO `livros`( `id`, `titulo`, `autor`, `isbn`, `nome_arquivo`, `classificacao_indicativa`, `editora`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $insertStmt = $conexao->prepare($insertSql);
    $id = 0;
    $insertStmt->bind_param('issssis', $id,  $titulodolivro, $autor, $isbn, $filename, $classificacaoIndicativa, $editora);
    $insertStmt->execute();

    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3> Image uploaded successfully!</h3>";
    } else {
        echo "<h3> Failed to upload image!</h3>";
    }
} else {
    echo "<h3> </h3>";
}
?>

<?php
$path = '..';
include_once('../principal/header.php');
?>


<style>
    body {
        background-color: #c5e9f0;
        padding: 30px;
    }

    /* . form {

        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border-style: hidden;
        background: rgb(55, 164, 207);
        height: 500px;
        box-shadow: 10px blue;
        gap: 10px;


    }

    input {
        height: 2em;
        font-size: 15px;
    }

    h1 {
        text-decoration: underline;
        text-align: center;
    }

    label {
        font-size: 20px;
        font-family: Arial;
    }

    button {
        height: 3em;
        width: 200px;
    }
    */
</style>
<h1 style="text-align:center; text-decoration:underline">Cadrasto De Livros:</h1>
<div class="d-flex justify-content-center align-items-center  " style="background:rgb(55, 164, 207)">
    <div class="d-flex flex-column m-4 w-75 h-75 justify-content-center align-items-center ">
        <form action="" method="post" enctype="multipart/form-data" class="w-50">


            <div class="mb-3">
                <label for="Titulo" class="form-label">Título do livro:</label>
                <input type="text" placeholder="Senhora" name="titulo" id="Titulo" class="form-control">
                <div id="emailHelp" class="form-text"></div>
            </div>

            <div class="mb-3">
                <label for="Autor" class="form-label">Autor do livro:</label>
                <input type="text" placeholder="João Guimarães" name="autor" id="Autor" class="form-control">
            </div>

            <div class="mb-3">
                <label for="Idade" class="form-label">Classificação indicativa:</label>
                <input type="number" placeholder="13" name="idade" id="Idade" class="form-control" style="width:10%; min-width:65px">
            </div>

            <div class="mb-3">
                <label for="Editora" class="form-label">Editora:</label>
                <input type="text" placeholder="Global" name="editora" id="Editora" class="form-control">
            </div>

            <div class="mb-3">
                <label for="ISBN" class="form-label">ISBN:</label>
                <input type="text" placeholder="1234567891011" name="isbn" id="ISBN" class="form-control" maxlength="13" style="min-width:146px;">
            </div>


            <input class="form-control" type="file" name="upfile" id="upfile">


            <button type="submit" class="btn btn-primary my-3" name="send" style=" background:burlywood; color:black">cadastrar</button>
            <a href="./entrar.html" class="btn btn-primary " style=" background:burlywood; color:black" role="button" aria-disabled="true">voltar</a>

        </form>
        <button type="button" class="btn btn-primary my-3" name="emprestados">
            <a href="../php/emprestando.php" style="color:white; text-decoration:none"> Verificar Emprestados</a>
        </button>
    </div>

</div>

</div>


<?php
include_once('../principal/footer.php');
?>

<?php

?>
</div>
</script>
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>

    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>