<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Financeira</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<?php
session_start();

function formatacao($numb)
{
    return number_format($numb, 2, ',', '.');
};

if (!isset($_SESSION['transacoes'])) {
    $_SESSION['transacoes'] = [];
}

$entradas = 0;
$saidas = 0;
foreach ($_SESSION['transacoes'] as $transacao) {
    if ($transacao['tipo'] === 'ganho') {
        $entradas += $transacao['valor'];
    } else {
        $saidas += $transacao['valor'];
    };
};
$total = $entradas + $saidas;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($_POST['acao'] === 'adicionar') {
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
        $valor = filter_input(INPUT_POST, 'valor', FILTER_VALIDATE_FLOAT);
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_SPECIAL_CHARS);
        $categoria = $_POST['categoria'];
        $tipo = $_POST['tipo'];

        $transacao = [
            'descricao' => $descricao,
            'valor' => (($tipo === 'gasto') && ($valor > 0)) ? ($valor * -1) : ($valor), // Chama a função que formata o número pra 1000 virar 1.000,00, com if ternário que corrije caso algum gasto esteja positivo
            'data' => $data,
            'categoria' => $categoria,
            'tipo' => $tipo
        ];

        $_SESSION['transacoes'][] = $transacao;
    } else {
        $_SESSION['transacoes'] = [];
    }
    // Serve pra não reenviar os dados ao recarregar a página:
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<body>
    <div class="container my-5">
        <div class="bg-header">
            <h1>💰 Calculadora Financeira Pessoal</h1>
        </div>

        <div class="card p-4 mt-3">
            <h4>Adicionar Transação</h4>

            <form action="index.php" method="post">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input type="text" id="descricao" class="form-control" placeholder="Ex: Supermercado" name="descricao" required>
                    </div>

                    <div class="col-md-3">
                        <label for="valor" class="form-label mt-md-0 mt-3">Valor (R$)</label>
                        <input type="number" id="valor" name="valor" class="form-control" step="0.01" placeholder="0.00" required>
                    </div>

                    <div class="col-md-3">
                        <label for="categoria" class="form-label mt-md-0 mt-3">Categoria</label>
                        <select id="categoria" class="form-select" name="categoria" required>
                            <option value="" disabled selected>Escolha...</option>
                            <option value="Alimentação">Alimentação</option>
                            <option value="Transporte">Transporte</option>
                            <option value="Lazer">Lazer</option>
                            <option value="Saúde">Saúde</option>
                            <option value="Outros">Outros</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="data" class="form-label">Data</label>
                        <input name="data" type="date" id="data" class="form-control" required>
                    </div>

                    <div class="col-md-3">
                        <label for="categoria" class="form-label mt-md-0 mt-3">Categoria</label>
                        <select id="categoria" class="form-select" name="tipo" required>
                            <option value="" disabled selected>Tipo...</option>
                            <option value="gasto">Gasto</option>
                            <option value="ganho">Ganho</option>
                        </select>
                    </div>
                </div>

                <button type="submit" name="acao" value="adicionar" class="btn btn-custom">Adicionar</button>
                <button type="submit" formnovalidate name="acao" value="limpar" class="btn btn-danger">Limpar</button>
            </form>
        </div>

        <div class="card p-4 mt-4">
            <h4>Transações</h4>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Categoria</th>
                        <th>Data</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    if ($_SESSION['transacoes']) {
                        foreach ($_SESSION['transacoes'] as $transacao):
                            echo '<tr>';
                            echo '<td>' . $transacao['descricao'] . '</td>';
                            echo '<td> R$ ' . formatacao($transacao['valor']) . '</td>';
                            echo '<td>' . $transacao['categoria'] . '</td>';
                            echo '<td>' . date('d/m/Y', strtotime($transacao['data'])) . '</td>';
                            echo '</tr>';
                        endforeach;
                    } else {
                        echo '<tr>';
                        echo '<td> Nada registrado ainda. </td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>

            </table>
        </div>

        <div class="card p-4 mt-4">
            <h4>Resumo</h4>

            <div class="row">
                <div class="col-md-4">
                    <div class="alert alert-success text-center">
                        <h5>Entradas</h5>
                        <p><strong><?php echo 'R$' . formatacao($entradas) ?></strong></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="alert alert-danger text-center">
                        <h5>Saídas</h5>
                        <p><strong><?php echo 'R$' . formatacao($saidas) ?></strong></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="alert alert-info text-center">
                        <h5>Saldo</h5>
                        <p><strong><?php echo 'R$' . formatacao($total) ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>