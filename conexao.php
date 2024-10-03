<?php
// Configurações do banco de dados
$host     = $_ENV['DB_HOST']     ?? 'localhost'; // Nome do host
$dbname   = $_ENV['DB_DATABASE'] ?? 'eleicao';   // Nome do banco de dados
$username = $_ENV['DB_USER']     ?? 'root';      // Nome de usuário do banco de dados
$password = $_ENV['DB_PASSWORD'] ??  '';         // Senha do banco de dados

// Criar conexão com o banco de dados
$conn = mysqli_connect($host, $username, $password, $dbname);

// Verificar a conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>
