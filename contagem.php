<?php
include 'conexao.php'; // Incluir a conexão com o banco de dados

// Consultar os votos no banco de dados
$sql = "SELECT candidato, COUNT(*) as contagem FROM voto GROUP BY candidato";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contagem de Votos</title>
    <link rel="stylesheet" href="style.css"> <!-- Link para o CSS externo -->
</head>
<body>
    <div class="container">
        <h1>Resultado da Eleição</h1>
        <table>
            <tr>
                <th>Candidato</th>
                <th>Quantidade de Votos</th>
            </tr>
            <?php
            // Verificar se há resultados
            if (mysqli_num_rows($result) > 0) {
                // Exibir os dados de cada linha
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . htmlspecialchars($row['candidato']) . "</td><td>" . htmlspecialchars($row['contagem']) . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Nenhum voto registrado.</td></tr>";
            }
            ?>
        </table>
        <a href="index.php" class="voltar-link">Voltar à Página de Votação</a> <!-- Link para voltar -->
    </div>
</body>
</html>
<?php
// Fechar a conexão
mysqli_close($conn);
?>
