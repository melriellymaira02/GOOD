<?php
include_once('../conexao.php');
?>
<?php

$nomedoaluno = $_POST['aluno'];
$idade = $_POST['idade'];
$sala = $_POST['serie'];
$idlivroemprestado = $_POST['iddolivro'];
$RA = $_POST['ra'];


$statement = $conexao->prepare('INSERT INTO `alunos` (`RA`, `sala`, 
`idade`, `nome`, `id_livro_emprestado`) VALUES (?,?,?,?,?)');

$statement->bind_param('ssisi', $RA, $sala, $idade, $nomedoaluno, $idlivroemprestado);

$statement->execute();

header('Location:../index.php');
