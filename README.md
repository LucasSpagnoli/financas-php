💰 Calculadora Financeira Pessoal
Uma aplicação web simples, construída em um único arquivo PHP, para o gerenciamento de transações financeiras pessoais. Permite registrar ganhos e gastos de forma rápida e visualiza um resumo do saldo atual.

(Sugestão: Tire um print da sua aplicação funcionando e coloque aqui)

✨ Funcionalidades Principais
Adicionar Transações: Um formulário intuitivo para registrar novas transações, especificando:

Descrição do item

Valor (R$)

Categoria (Alimentação, Transporte, Lazer, etc.)

Data da transação

Tipo (Ganho ou Gasto)

Listagem Dinâmica: Todas as transações adicionadas são exibidas em uma tabela organizada, mostrando os detalhes de cada registro.

Resumo Financeiro em Tempo Real: Um painel de resumo que exibe automaticamente:

Total de Entradas: A soma de todos os ganhos.

Total de Saídas: A soma de todos os gastos.

Saldo Total: A diferença entre as entradas e saídas.

Persistência de Dados por Sessão: As informações são salvas na sessão do PHP ($_SESSION), o que significa que seus dados permanecem disponíveis enquanto você não fechar o navegador.

Limpeza de Dados: Um botão "Limpar" permite apagar todas as transações registradas e zerar o saldo com apenas um clique, após uma confirmação para evitar perdas acidentais.

Prevenção de Duplicidade: O projeto implementa o padrão Post/Redirect/Get (PRG), que evita que a mesma transação seja enviada múltiplas vezes caso o usuário recarregue a página após o envio de um formulário.

🛠️ Tecnologias Utilizadas
PHP: Linguagem principal para toda a lógica de back-end, incluindo o processamento do formulário e o gerenciamento de sessões.

HTML5: Para a estruturação semântica da página.

Bootstrap 5: Framework CSS utilizado para criar um layout responsivo e estilizado de forma rápida e eficiente.

🚀 Como Executar o Projeto
Para rodar este projeto, você precisará de um ambiente de servidor local com suporte a PHP.

Instale um servidor local: Utilize uma ferramenta como XAMPP, WAMP ou MAMP.

Inicie o servidor: Inicie os módulos Apache e PHP.

Copie o arquivo: Coloque o arquivo index.php na pasta raiz do seu servidor (geralmente htdocs no XAMPP).

Acesse no navegador: Abra seu navegador e acesse o endereço http://localhost/index.php.
