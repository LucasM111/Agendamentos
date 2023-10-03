<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Ajuda</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
        body {
            background-color: #f2f2f2;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .start-session {
            font-size: 24px;
            color: #333;
            margin-top: 20px;
        }

    </style>
<body>
    <div class="container">
        <h1 class = "text-center">Página de Ajuda</h1>
        <br>

        <h2>Caso seja o primeiro acesso do usuário à plataforma:</h2>
        <p>A sequência de cadastros correta é a seguinte:</p>
        <ul>
            <li><i class="fas fa-check"></i> Cadastro de Motorista</li>
            <li><i class="fas fa-check"></i> Cadastro de Veículo</li>
            <li><i class="fas fa-check"></i> Gerar Agendamento</li>
        </ul>

        <h2>Se o usuário já tiver previamente cadastrado informações de motorista e veículo:</h2>
        <p>Não será necessário realizar novos cadastros. Nesse caso, ele pode proceder diretamente com o agendamento de visitas.</p>

        <p>É importante destacar que a função "Gerar Agendamento" só estará disponível após a realização bem-sucedida das duas etapas anteriores.</p>

        <h2>Detalhamento das funcionalidades:</h2>
        <br>

        <h3>Cadastro de Motorista:</h3>
        <p>Esta funcionalidade tem o propósito de identificar o motorista, contribuindo para a segurança do processo. As informações solicitadas são simplesmente o "Nome" e o "Sobrenome". Abaixo, apresentamos um exemplo de preenchimento:</p>
        <ul>
            <li><i class="fas fa-check"></i> Nome: Vando</li>
            <li><i class="fas fa-check"></i> Sobrenome: Aparecido</li>
        </ul>

        <h3>Cadastro de Veículo:</h3>
        <p>A função de cadastro de veículo visa permitir que a equipe de segurança possa identificar se o veículo cadastrado corresponde ao veículo agendado. As informações solicitadas incluem o "Modelo do Veículo" e a "Placa do Veículo". Aqui está um exemplo de preenchimento:</p>
        <ul>
            <li><i class="fas fa-check"></i> Modelo do Veículo: Volkswagen Saveiro 1.6 Mi Surf</li>
            <li><i class="fas fa-check"></i> Placa do Veículo: APF-5429 (se a placa for do padrão Mercosul: BEE4R22)</li>
            <li><i class="fas fa-info-circle"></i> Observação: Não serão aceitas informações de placa incorretas durante a verificação feita pelo responsável de segurança da empresa no momento da visita.</li>
        </ul>

        <h3>Gerar Agendamento:</h3>
        <p>Esta é a função principal da plataforma, onde todos os detalhes sobre a visita devem ser fornecidos. Qualquer informação incorreta pode resultar na recusa de entrada no estabelecimento empresarial, portanto, é fundamental prestar atenção aos dados inseridos. As informações solicitadas incluem:</p>
        <ul>
            <li><i class="fas fa-check"></i> Nome do Visitante: Lucas Marques</li>
            <li><i class="fas fa-check"></i> Veículo: [Selecionar o veículo cadastrado anteriormente]</li>
            <li><i class="fas fa-check"></i> Motorista: [Selecionar o motorista cadastrado anteriormente]</li>
            <li><i class="fas fa-check"></i> Data de Agendamento: 03/10/2023 (o campo converterá automaticamente para o formato correto)</li>
            <li><i class="fas fa-check"></i> Hora: 17:07</li>
            <li><i class="fas fa-check"></i> Motivo do Agendamento: Entrega de Produtos / Coleta de Produtos (selecione uma das opções já cadastradas)</li>
            <li><i class="fas fa-check"></i> Quantidade de Visitantes: 2 (incluindo o motorista)</li>
            <li><i class="fas fa-check"></i> Produto: Malhas (informe qual produto será coletado ou entregue na empresa)</li>
        </ul>

        <p>Lembrando que o campo "Veículo" e o campo "Motorista" requerem a seleção de opções previamente cadastradas. O campo "Data" pode ser preenchido sem caracteres separadores (por exemplo, "03102023"), e o próprio sistema converterá para o formato correto (03/10/2023). O campo "Motivo de Agendamento" permite escolher entre as opções já cadastradas no sistema. Quanto ao campo "Quantidade de visitantes", informe o total de pessoas que irão até a empresa, contando com o motorista. Por exemplo, se o agendante estiver acompanhado de um motorista, a quantidade deve ser 2 pessoas; se apenas o motorista for até o estabelecimento, informe 1 pessoa. O campo "Produto" deve ser usado para especificar qual produto será coletado ou entregue na empresa.</p>
    </div>
    <br>
</body>
</html>
