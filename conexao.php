<?php
// Configurações do banco de dados
$host = 'localhost'; // Nome do host
$dbname = 'eleicao'; // Nome do banco de dados
$username = 'root'; // Nome de usuário do banco de dados
$password = ''; // Senha do banco de dados

// Criar conexão com o banco de dados
$conn = mysqli_connect($host, $username, $password, $dbname);

// Verificar a conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>
