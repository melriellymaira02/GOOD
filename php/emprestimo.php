<?php
include_once('../conexao.php');
?>

<?php
$path = '..';
include_once('../principal/header.php')
?>
<nav class="preto">




    a
</nav>
<nav class="navbar" style="background-color: #e3f2fd;">
    <img class="imglo" src="../files/logo.jpg" />


</nav>

<a class="navbar-brand">&#128150</a>

<?php
$sql = "SELECT * FROM livros";

echo ' <h1 style="text-align:center; text-decoration:underline"> Cátalogo De Livros </h1>';
$resultado = mysqli_query($conexao, $sql);

echo '<div >';
echo '<div class="row justify-content-evenly">';
if (mysqli_num_rows($resultado) == 0) {
    echo '<p>O banco de dados não tem dados</p>';
} else {
    while ($linha = mysqli_fetch_array($resultado)) {

        echo '<div class="card m-1 border-black border-1 rounded-2 p-2 mb-2  "  style="width: 18rem; heigth:0px; box-shadow: 41px 10px 100px -22px #F8F8FF;">';


        echo '<img  src="../image/' . $linha['nome_arquivo'] . '" class="card-img-top h-50 w-auto  rounded-6 "  alt="...">';

        echo '<div class="card-body ">';
        echo '<h5 class="card-title" style="text-decoration:underline;">' . $linha['titulo'] . '</h5>';
        echo '<p>Classificação Indicativa: ' . $linha['classificacao_indicativa'] . '</p>';
        echo '<p>Autor: ' . $linha['autor'] . '</p>';
        echo '<p class="text-wrap">Editora: ' . $linha['editora'] . '</p>';
        echo '<p></p>';
        echo '<form action="../CRUD/read.php" method="post" > 

          <button class="btn btn-sm btn-primary" name="requisitado" value="' . $linha['id'] . '" 
          type="submit" class="border border-0 m-0 p-0 text-primary">Pedir emprestado</button>
          </form>';

        echo '</div>';
        echo '</div>';
    }
}

echo '</div>';
echo '</div>';
echo '<br>';

?>
<div class="but"> <button type="button" class="buttonb m-2">
        <a href="../pages/sugestao.html">

            <h3> proximo </h3>
        </a>
    </button>
    <button type="button" class="buttonb ">
        <a href="../pages/livros.html">
            <h3>voltar</h3>
        </a>
</div>






<?php
include_once('../principal/footer.php');
?> </script>
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>
</div>
<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
</script>

<style>
    body {
        margin: 0;
        padding: 0;

    }

    h1 {
        font-size: 50px;
        font text-align: center;
        text-shadow: 0.9px 0.9px 0.7px #000000,
            1.8px 1.8px 1.4px #ffffff,
            2.7px 2.7px 2.1px #ffffff,
            3.6px 3.6px 2.8px #ffffff,
            4.5px 4.5px 3.5px #ffffff,
            5.4px 5.4px 4.2px #727272,
            6.3px 6.3px 4.9px #f1f1f1,
            7.2px 7.2px 5.6px #6cdadc,
            8.1px 8.1px 6.3px #747474,
            9px 9px 7px #525252;
    }

    nav {
        background-color: white;
    }

    .but {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .buttonb {
        height: 40px;
        width: 150px;
        background-color: black;

    }

    h3 {
        color: white;
    }

    .imglo {
        height: 80px;
        width: 80px;
        border-radius: 500px;
    }

    .navbar {
        display: flex;

    }

    a {
        color: aliceblue;
    }

    .preto {
        background-color: black;
        color: black;
    }
</style>