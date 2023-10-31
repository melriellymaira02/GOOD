<?php
include_once('../conexao.php');
?>
<?php
$iddolivro = $_POST['deletar'];



try {
    $deletar = $conexao->query('DELETE FROM Livros WHERE ID=' . $iddolivro . '');
} catch (Exception $erro) {
    $del = $erro->getMessage();
    echo  '<p>Falha ao deletar no Banco de Dados contate os responsáveis</p>';
    echo '<p>Erro:</p><p>' . $del . '</p>';
    die();
}
