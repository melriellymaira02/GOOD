<?php
$ip = 'localhost:3307';
$dbname = 'librey';
$user = 'root';
$password = '';


try {
    $conexao = new mysqli($ip, $user, $password, $dbname);
} catch (Exception $erro) {
    $opa = $erro->getMessage();
    echo  '<p>Falha ao conectar ao Banco de Dados contate os responsáveis</p>';
    echo '<p>Erro:</p><p>' . $opa . '</p>';
    die();
}
