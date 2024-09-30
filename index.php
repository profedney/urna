<?php
include 'conexao.php'; // Incluir a conexão com o banco de dados
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urna Eletrônica</title>
</head>
<body>
    <h1>Urna Eletrônica</h1>
    <form action="processa_voto.php" method="POST">
        <label>
            <input type="radio" name="candidato" value="Candidato 1">
            Candidato 1
        </label><br>

        <label>
            <input type="radio" name="candidato" value="Candidato 2">
            Candidato 2
        </label><br>

        <label>
            <input type="radio" name="candidato" value="Candidato 3">
            Candidato 3
        </label><br>

        <label>
            <input type="radio" name="candidato" value="Candidato 4">
            Candidato 4
        </label><br>

        <label>
            <input type="radio" name="candidato" value="Candidato 5">
            Candidato 5
        </label><br>

        <label>
            <input type="radio" name="candidato" value="nulo">
            Voto Nulo
        </label><br>

        <label>
            <input type="radio" name="candidato" value="branco">
            Voto em Branco
        </label><br>

        <button type="submit">Votar</button>
    </form>
    <a href="contagem.php">Contagem de Votos</a>
</body>
</html>
