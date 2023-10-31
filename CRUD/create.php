<?php
include_once('../conexao.php');
?>
<?php
if (isset($_POST['send'])) {
    $nomedolivro = $_POST['nome'];
    $autor = $_POST['autor'];
    $classificacaoIndicativa = $_POST['idade'];
    $editora = $_POST['editora'];
    $img = $_POST['file'];

    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "../image/" . $filename;

    $statement = $conexao->prepare('INSERT INTO `Livros` (`Nome`, `Editora`, 
`ClassInd`, `Autor`, `filename`) VALUES (?,?,?,?,?)');

    $statement->bind_param('ssiss', $nomedolivro, $editora, $classificacaoIndicativa, $autor, $img);

    $statement->execute();

    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3> Image uploaded successfully!</h3>";
    } else {
        echo "<h3> Failed to upload image!</h3>";
    }
} else {
    echo "<h3> Failed to upload image!</h3>";
}

//header('Location:../pages/livros.html');
