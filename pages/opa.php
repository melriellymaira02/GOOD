<?php
$son = '..';
include_once('../conexao.php');
?>

<?php
include_once('../principal/cabecalho.php')
?>

<?php
include('./inicio.html')
?>

<?php
include_once('./cadrastolivro.php');
?>

<?php
include_once('../principal/rodape.php');
header('Location:../index.php')
?>