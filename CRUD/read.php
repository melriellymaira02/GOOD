<link rel="stylesheet" href="emprestimo.css">

<?php
include_once('../conexao.php')
?>

<style>

</style>

<?php
$path = '..';
include_once('../principal/header.php')
?>
<?php


?>

<body>
    <h1 style="text-align:center; text-decoration:underline"> Emprestar Livros: </h1>
    <form action="./criaraluno.php" method="post" enctype="multipart/form-data" class="w-50 mx-auto p-2 " style="background-color:rgb(55, 164, 207);">

        <div name="requisitado">
            <p>O livro escolhido foi:</p>
            <p>
                <?php

                $livroRequisitado = $_POST['requisitado'];

                $sql = "SELECT `titulo` FROM `livros` WHERE" . $livroRequisitado;

                $livrinhochan = mysqli_query($conexao, $sql);

                $linha = mysqli_fetch_array($livrinhochan);

                echo $linha['titulo'];
                ?>
            </p>
        </div>

        <input style="display:none" name="iddolivro" value="<?php
                                                            $livroRequisitado = $_POST['requisitado'];

                                                            echo $livroRequisitado;
                                                            ?>"></input>

        <div class="mb-3  ">
            <label for="Aluno" class="form-label">Coloque seu nome:</label>
            <input type="text" placeholder="Jeffersonson" name="aluno" id="Aluno" class="form-control">
            <div id="emailHelp" class="form-text"></div>
        </div>

        <div class="mb-3">
            <label for="Serie" class="form-label">Sua série:</label>
            <input type="text" placeholder="8 ano A" name="serie" id="Serie" class="form-control">
        </div>

        <div class="mb-3">
            <label for="Idade" class="form-label">Sua idade:</label>
            <input type="text" placeholder="14" name="idade" id="Idade" class="form-control">
        </div>

        <div class="mb-3">
            <label for="RA" class="form-label">Seu RA:</label>
            <input type="text" placeholder="0001234567891" name="ra" id="RA" class="form-control" maxlength="13">
        </div>

        <button type="submit" class="btn btn-primary my-3">solicitar</button>
    </form>
</body>
<?php
include_once('../principal/footer.php')
?>


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
        background-color: #c6e9f0;
    }
</style>