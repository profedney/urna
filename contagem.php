<?php
include 'conexao.php'; // Incluir a conexão com o banco de dados

// Consultar os votos no banco de dados
$sql = "SELECT candidato, COUNT(*) as contagem FROM voto GROUP BY candidato ORDER BY candidato";
$result = mysqli_query($conn, $sql);

// Total de votos para calcular a porcentagem
$total_votos = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $total_votos += $row['contagem'];
    }
    // Retornar o ponteiro do resultado para o início
    mysqli_data_seek($result, 0);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contagem de Votos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Resultado da Eleição</h1>
                <hr>
                <div class="list-group">
                    <?php
                    // Verificar se há resultados
                    if (mysqli_num_rows($result) > 0) {
                        // Exibir os dados de cada linha
                        while ($row = mysqli_fetch_assoc($result)) {
                            $candidato = htmlspecialchars($row['candidato']);
                            $contagem = htmlspecialchars($row['contagem']);
                            $porcentagem = $total_votos > 0 ? ($contagem / $total_votos) * 100 : 0;
                            ?>
                            <div class="list-group-item mb-1 d-flex align-items-center">
                                <img src="/avatar.png" class="rounded me-3" alt="<?php echo $candidato; ?>" style="width:50px; height: 50px;">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1"><?php echo $candidato; ?></h5>
                                    <small>Quantidade de Votos: <?php echo $contagem; ?></small>
                                </div>
                                <div class="w-50 ms-3">
                                    <div class="progress bg-secondary" aria-label="Progresso <?php echo $candidato; ?>" aria-valuenow="<?php echo $porcentagem; ?>" aria-valuemin="0" aria-valuemax="100" style="height: 30px">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated overflow-visible" role="progressbar" style="width: <?php echo $porcentagem; ?>%;" aria-valuenow="<?php echo $porcentagem; ?>" aria-valuemin="0" aria-valuemax="100">
                                            <span class="fw-bold mx-3"><?php echo round($porcentagem, 2) . '%'; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<div class='list-group-item'>Nenhum voto registrado.</div>";
                    }
                    ?>
                </div>
                <hr>
                <div class="text-center mt-4">
                    <a href="index.php" class="btn btn-link">Voltar à Página de Votação</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
// Fechar a conexão
mysqli_close($conn);
