<?php
include 'conexao.php'; // Incluir a conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar o candidato escolhido
    $candidato = mysqli_real_escape_string($conn, $_POST['candidato']);

    // Inserir o voto no banco de dados
    $sql = "INSERT INTO voto (candidato) VALUES ('$candidato')";

    if (!mysqli_query($conn, $sql)) {
        die("Erro ao registrar o voto: " . mysqli_error($conn));
    }

    // Fechar a conexão
    mysqli_close($conn);

    // Redirecionar de volta à página principal ou exibir mensagem
    header("Location: index.php?status=success");
    exit();
} else {
    echo "Método de solicitação inválido.";
}
