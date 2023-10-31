<?php
include_once('../conexao.php');
?>

<?php
$son = '..';
include_once('../principal/header.php')
?>

<?php
$sql = "SELECT * FROM Livros";

$resultado = mysqli_query($conexao, $sql);

echo 'opa';

echo '<div class="badge bg-primary text-wrap" style="width: 6rem;">
This text should wrap.
</div>';
if (mysqli_num_rows($resultado) == 0) {
    echo '<p>O banco de dados não tem dados</p>';
} else {
    while ($linha = mysqli_fetch_array($resultado)) {
        echo '<table>';
        echo '<tr>';
        echo '<th>ID<th>' . '<th>Nome<th>' . '<th>Editora<th>' . '<th>ClassInd<th>' . '<th>Autor<th>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>' . $linha['ID'] . '<td>' . '<td>' . $linha['Nome'] . '<td>' . '<td>' . $linha['Editora'];
        echo '<td>' . '<td>' . $linha['ClassInd'] . '<td>' . '<td>' . $linha['Autor'] . '<td>' .
            '<td><img src="../image/' . $linha['filename'] . '"/>  <td>';
        echo '</tr>';
        echo '</table>';
        echo '<form action="../CRUD/delete.php" method="post"> 
            <button name="deletar" value="' . $linha['ID'] . '" type="submit">Deletar</button>
            </form>';
    }
}
?>

<?php
include_once('../principal/footer.php');
?>