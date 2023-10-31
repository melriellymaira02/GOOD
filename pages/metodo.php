<?php
include_once('../conexao.php');

$email = $_POST['email'];
$senha = $_POST['password'];

$sql = "SELECT `senha` FROM Bibliotecarias WHERE email = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Verifique se o usuário existe e a senha está correta
if ($user && password_verify($senha, $user['senha'])) {
    // A senha está correta. Redirecione para livros.php
    header("Location:./cadrastolivro.php");
} else {
    // A senha está incorreta. Mostre uma mensagem de erro.
    echo "Email ou senha incorretos.";
}
