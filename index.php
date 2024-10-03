<?php
 // Incluir a conexão com o banco de dados
require_once __DIR__ . '/conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urna Eletrônica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Urna Eletrônica</h1>
                <hr>

                <!-- Alerta de confirmação -->
                <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                    <div class="message-alert alert alert-success alert-dismissible fade show" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                          <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                        </svg><span class="mx-2">Voto registrado com sucesso!</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form id="votacao-form" action="processa_voto.php" method="POST">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col">
                            <ul class="list-group">
                                <label class="pt-1">
                                    <li class="list-group-item d-flex align-items-center">
                                        <img src="/avatar.png" class="rounded me-3" alt="Candidato 1" style="width:50px; height: 50px;">
                                        <input required type="radio" name="candidato" value="Candidato 1" class="form-check-input me-2">
                                        <strong>Candidato 1</strong>
                                    </li>
                                </label>
                                <label class="pt-1">
                                    <li class="list-group-item d-flex align-items-center">
                                        <img src="/avatar.png" class="rounded me-3" alt="Candidato 2" style="width:50px; height: 50px;">
                                        <input required type="radio" name="candidato" value="Candidato 2" class="form-check-input me-2">
                                        <strong>Candidato 2</strong>
                                    </li>
                                </label>
                                <label class="pt-1">
                                    <li class="list-group-item d-flex align-items-center">
                                        <img src="/avatar.png" class="rounded me-3" alt="Candidato 3" style="width:50px; height: 50px;">
                                        <input required type="radio" name="candidato" value="Candidato 3" class="form-check-input me-2">
                                        <strong>Candidato 3</strong>
                                    </li>
                                </label>
                                <label class="pt-1">
                                    <li class="list-group-item d-flex align-items-center">
                                        <img src="/avatar.png" class="rounded me-3" alt="Candidato 4" style="width:50px; height: 50px;">
                                        <input required type="radio" name="candidato" value="Candidato 4" class="form-check-input me-2">
                                        <strong>Candidato 4</strong>
                                    </li>
                                </label>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="list-group">
                                <label class="pt-1">
                                    <li class="list-group-item d-flex align-items-center">
                                        <img src="/avatar.png" class="rounded me-3" alt="Candidato 5" style="width:50px; height: 50px;">
                                        <input required type="radio" name="candidato" value="Candidato 5" class="form-check-input me-2">
                                        <strong>Candidato 5</strong>
                                    </li>
                                </label>
                                <label class="pt-1">
                                    <li class="list-group-item d-flex align-items-center">
                                        <img src="/avatar.png" class="rounded me-3" alt="Voto Nulo" style="width:50px; height: 50px;">
                                        <input required type="radio" name="candidato" value="Nulo" class="form-check-input me-2">
                                        <strong>Voto Nulo</strong>
                                    </li>
                                </label>
                                <label class="pt-1">
                                    <li class="list-group-item d-flex align-items-center">
                                        <img src="/avatar.png" class="rounded me-3" alt="Voto em Branco" style="width:50px; height: 50px;">
                                        <input required type="radio" name="candidato" value="Branco" class="form-check-input me-2">
                                        <strong>Voto em Branco</strong>
                                    </li>
                                </label>
                            </ul>
                        </div>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#confirmVoteModal">
                            Votar
                        </button>
                    </div>
                </form>
                <hr>
                <div class="text-center mt-4">
                    <a href="contagem.php" class="btn btn-link">Contagem de Votos</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmação de Voto -->
    <div class="modal fade" id="confirmVoteModal" tabindex="-1" aria-labelledby="confirmVoteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmVoteModalLabel">Confirmação de Voto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Você confirma seu voto no candidato selecionado?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" form="votacao-form" class="btn btn-primary">Confirmar Voto</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Verifica se o alerta existe e está visível
        const alertElement = document.querySelector('.message-alert.show');
        if (alertElement) {
            // Remove o alerta automaticamente após 5 segundos (5000 ms)
            setTimeout(function () {
                alertElement.remove();
            }, 5000);
        }
    </script>
</body>
</html>
