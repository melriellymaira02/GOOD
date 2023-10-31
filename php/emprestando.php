<?php
include_once('../conexao.php');
?>

<?php
$path = '..';
include_once('../principal/header.php');
?>

<nav>
    <h1 class="textol">biblioteca Diogénes</h1>
</nav>

<?php

$sql = "SELECT Alunos.nome AS nome_aluno, Alunos.sala, Alunos.RA, Livros.titulo, IF(Alunos.id_livro_emprestado IS NULL, 'Não', 'Sim') as Emprestado FROM Livros LEFT JOIN Alunos ON Alunos.id_livro_emprestado = Livros.id";
$result = $conexao->query($sql);
echo '<h1 style="text-align:center; text-decoration:underline;"> Livros Cadrastados </h1>';
if ($result->num_rows > 0) {
    // Mostra os dados de cada linha
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card m-3 ' style='width: 18rem;'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row["titulo"] . "</h5>";
        echo "<p class='card-text'>Emprestado: " . $row["Emprestado"] . "</p>";
        if ($row["Emprestado"] == 'Sim') {
            echo "<p class='card-text' >Nome do Aluno: " . $row["nome_aluno"] . "</p>";
            echo "<p class='card-text'>Sala: " . $row["sala"] . "</p>";
            echo "<p class='card-text'>RA: " . $row["RA"] . "</p>";
        }
        echo "</div>";
        echo "</div>";
    }
    echo '  <button type="button" class="btn btn-primary btn-lg">Large button</button>';
    echo '<button type="button" class="btn btn-secondary btn-lg">Large button</button>';
} else {
    echo "0 resultados";
}
?>
<?php
include_once('../principal/footer.php');
?>
<style>
    nav {
        background-color: black;
    }

    .card {
        -webkit-box-shadow: -10px 0px 13px -7px #000000, 10px 0px 13px -7px #000000, 4px 5px 15px 5px rgba(0, 0, 0, 0);
        box-shadow: -10px 0px 13px -7px #000000, 10px 0px 13px -7px #000000, 4px 5px 15px 5px rgba(0, 0, 0, 0);
    }

    body {
        background-color: #c5e9f0;
    }
</style>