<?php
include_once('../conexao.php');
?>

<?php
if (isset($_POST['devolvido'])) {
    $alunoDevolvendo = $_POST['Aluninho'];
    $idDevolvendo = $_POST['Devolvendo'];
    $updateDevolvido = 'SET FOREIGN_KEY_CHECKS = 0';
    $resultado = mysqli_query($conexao, $updateDevolvido);
    $updateDevolvido = " UPDATE alunos SET id_livro_emprestado = 0 WHERE RA = '" . $alunoDevolvendo . "'";
    $resultado = mysqli_query($conexao, $updateDevolvido);
    $updateDevolvido = 'SET FOREIGN_KEY_CHECKS = 0';
    $resultado = mysqli_query($conexao, $updateDevolvido);
}
?>

<?php
$path = '..';
include_once('../principal/header.php');
?>

<nav>
    <h1 class="textol" style="color:white">biblioteca Diogénes</h1>
</nav>

<?php

$sql = "SELECT Alunos.nome AS nome_aluno, Alunos.id_livro_emprestado, Alunos.sala, Alunos.RA, Livros.titulo, IF(Alunos.id_livro_emprestado IS NULL, 'Não', 'Sim') as Emprestado FROM Livros LEFT JOIN Alunos ON Alunos.id_livro_emprestado = Livros.id";
$result = $conexao->query($sql);
echo '<h1 style="text-align:center; text-decoration:underline;"> Livros Cadrastados </h1>';
if ($result->num_rows > 0) {
    // Mostra os dados de cada linha
    while ($row = $result->fetch_assoc()) {

        echo "<div class='card m-3 p-4' style='width: 18rem;  '>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row["titulo"] . "</h5>";
        echo "<p class='card-text'>Emprestado: " . $row["Emprestado"] . "</p>";
        if ($row["Emprestado"] == 'Sim') {
            echo "<p class='card-text' >Nome do Aluno: " . $row["nome_aluno"] . "</p>";
            echo "<p class='card-text'>Sala: " . $row["sala"] . "</p>";
            echo "<p class='card-text'>RA: " . $row["RA"] . "</p>";
            echo "<form method='post' action=''>";
            echo "<input type='text' name='Aluninho' style='display: none;' value='" . $row["RA"] . "'/>";
            echo "<input type='text' name='Devolvendo' 
            style='display: none;' value='" . $row["id_livro_emprestado"] . "'/>";
            echo "<button class='btn btn-primary' type='submit' name='devolvido'>Devolvido</button>";
            echo "</form>";
        }
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "0 resultados";
}
?>
<?php
include_once('../principal/footer.php');
?>
<br>
<div class="botoes "><button type="button" class="btn1 m-3"><a href="../pages/cadrastolivro.php">
            <h3>Voltar</h3>
    </button>
    <button type="button" class="btn1"><a href="../pages/livros.html">
            <h3> Inicio</h3>
        </a>
    </button>
</div>
<style>
    nav {
        background-color: black;
    }

    .card {
        -webkit-box-shadow: -10px 0px 13px -7px #000000, 10px 0px 13px -7px #000000, 4px 5px 15px 5px rgba(0, 0, 0, 0);
        box-shadow: -10px 0px 13px -7px #000000, 10px 0px 13px -7px #000000, 4px 5px 15px 5px rgba(0, 0, 0, 0);

        display: inline-block;

    }

    body {
        background-color: #c5e9f0;
    }

    .botoes {
        display: flex;
        justify-content: center;
        align-items: center;

    }

    button {
        height: 40px;
        width: 150px;
        background-color: black;

    }

    .btn1 {
        background-color: #000000;
    }

    a {
        color: azure;
        font-size: 25px;


    }
</style>

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