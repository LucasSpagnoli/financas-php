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

<body>

    <div class="container my-5">
        <div class="bg-header">
            <h1>💰 Calculadora Financeira Pessoal</h1>
        </div>

        <div class="card p-4 mt-3">
            <h4>Adicionar Transação</h4>

            <form>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input type="text" id="descricao" class="form-control" placeholder="Ex: Supermercado" required>
                    </div>

                    <div class="col-md-3">
                        <label for="valor" class="form-label">Valor (R$)</label>
                        <input type="number" id="valor" class="form-control" step="0.01" required>
                    </div>

                    <div class="col-md-3">
                        <label for="categoria" class="form-label">Categoria</label>

                        <select id="categoria" class="form-select">
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
                        <input type="date" id="data" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-custom">Adicionar</button>

            </form>
        </div
        >
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
                    <tr>
                        <td>Supermercado</td>
                        <td>- R$ 120,50</td>
                        <td>Alimentação</td>
                        <td>2025-09-12</td>
                    </tr>
                    <tr>
                        <td>Salário</td>
                        <td>+ R$ 3.500,00</td>
                        <td>Outros</td>
                        <td>2025-09-05</td>
                    </tr>
                </tbody>

            </table>
        </div>

        <div class="card p-4 mt-4">
            <h4>Resumo</h4>

            <div class="row">
                <div class="col-md-4">
                    <div class="alert alert-success text-center">
                        <h5>Entradas</h5>
                        <p><strong>R$ 3.500,00</strong></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="alert alert-danger text-center">
                        <h5>Saídas</h5>
                        <p><strong>R$ 120,50</strong></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="alert alert-info text-center">
                        <h5>Saldo</h5>
                        <p><strong>R$ 3.379,50</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>