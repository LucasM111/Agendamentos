//--------------------------AGENDAMENTOS-----------------------------------------

    // Função para verificar campos e habilitar/desabilitar o botão de salvar
    function verificarCamposAgendamentos() {
        // Obtém todos os valores dos campos
        var nome = document.getElementById("nome").value;
        var veiculo = document.getElementById("veiculo").value;
        var motorista = document.getElementById("motorista").value;
        var data = document.getElementById("data").value;
        var hora = document.getElementById("hora").value;
        var motivo = document.getElementById("motivo").value;
        var n_visitantes = document.getElementById("n_visitantes").value;
        var produto = document.getElementById("produto").value;

        // Obtém o botão de salvar
        var btnSalvar = document.getElementById("btnSalvar");

        // Verifica se todos os campos estão preenchidos
        var todosPreenchidos = nome && veiculo && motorista && data && hora && motivo && n_visitantes && produto;

        // Habilita/desabilita o botão com base na verificação
        btnSalvar.disabled = !todosPreenchidos;
    }

    // Adiciona o evento oninput para cada campo
    document.getElementById("nome").addEventListener("input", verificarCamposAgendamentos);
    document.getElementById("veiculo").addEventListener("input", verificarCamposAgendamentos);
    document.getElementById("motorista").addEventListener("input", verificarCamposAgendamentos);
    document.getElementById("data").addEventListener("input", verificarCamposAgendamentos);
    document.getElementById("hora").addEventListener("input", verificarCamposAgendamentos);
    document.getElementById("motivo").addEventListener("input", verificarCamposAgendamentos);
    document.getElementById("n_visitantes").addEventListener("input", verificarCamposAgendamentos);
    document.getElementById("produto").addEventListener("input", verificarCamposAgendamentos);

    // Chama a função uma vez para garantir que o botão esteja no estado correto inicialmente
    verificarCamposAgendamentos();

    //--------------------------FERIADOS-----------------------------------------
    
    // Função para verificar campos e habilitar/desabilitar o botão de salvar
    function verificarCamposFeriados() {
        // Obtém todos os valores dos campos
        var data = document.getElementById("data").value;
        var feriado = document.getElementById("sobrenome").value;

        // Obtém o botão de salvar
        var btnSalvar = document.querySelector("button[type='submit']");

        // Verifica se todos os campos estão preenchidos
        var todosPreenchidos = data && feriado;

        // Habilita/desabilita o botão com base na verificação
        btnSalvar.disabled = !todosPreenchidos;
    }

    // Adiciona o evento oninput para cada campo
    document.getElementById("data").addEventListener("input", verificarCamposFeriados);
    document.getElementById("sobrenome").addEventListener("input", verificarCamposFeriados);

    // Chama a função
    verificarCamposFeriados();

    //--------------------------MOTORISTAS-----------------------------------------

 // Função para verificar campos e habilitar/desabilitar o botão de salvar
 function verificarCamposMotoristas() {
    // Obtém todos os valores dos campos
    var nome = document.getElementById("nome").value;
    var sobrenome = document.getElementById("sobrenome").value;

    // Obtém o botão de salvar
    var btnSalvar = document.getElementById("btnSalvar");

    // Verifica se todos os campos estão preenchidos
    var todosPreenchidos = nome && sobrenome;

    // Habilita/desabilita o botão com base na verificação
    btnSalvar.disabled = !todosPreenchidos;
}

// Adiciona o evento oninput para cada campo
document.getElementById("nome").addEventListener("input", verificarCamposMotoristas);
document.getElementById("sobrenome").addEventListener("input", verificarCamposMotoristas);

// Chama a função uma vez para garantir que o botão esteja no estado correto inicialmente
verificarCamposMotoristas();

//--------------------------USUARIOS-----------------------------------------

// Função para verificar campos e habilitar/desabilitar o botão de salvar
function verificarCamposUsuarios() {
    // Obtém todos os valores dos campos
    var nome = document.getElementById("nome").value;
    var login = document.getElementById("login").value;
    var senha = document.getElementById("senha").value;
    var senha2 = document.getElementById("senha2").value;
    var ativo = document.getElementById("ativo").value;
    var categoria = document.getElementById("categoria").value;

    // Obtém o botão de salvar
    var btnSalvar = document.querySelector("button[type='submit']");

    // Verifica se todos os campos estão preenchidos
    var todosPreenchidos = nome && login && senha && senha2 && ativo && categoria;

    // Habilita/desabilita o botão com base na verificação
    btnSalvar.disabled = !todosPreenchidos;
}

// Adiciona o evento oninput para cada campo
document.getElementById("nome").addEventListener("input", verificarCamposUsuarios);
document.getElementById("login").addEventListener("input", verificarCamposUsuarios);
document.getElementById("senha").addEventListener("input", verificarCamposUsuarios);
document.getElementById("senha2").addEventListener("input", verificarCamposUsuarios);
document.getElementById("ativo").addEventListener("input", verificarCamposUsuarios);
document.getElementById("categoria").addEventListener("input", verificarCamposUsuarios);

// Chama a função uma vez para garantir que o botão esteja no estado correto inicialmente
verificarCamposUsuarios();

//--------------------------VEICULOS-----------------------------------------

    // Função para verificar campos e habilitar/desabilitar o botão de salvar
    function verificarCamposVeiculos() {
        // Obtém todos os valores dos campos
        var modelo = document.getElementById("modelo").value;
        var placa = document.getElementById("placa").value;

        // Obtém o botão de salvar
        var btnSalvar = document.querySelector("button[type='submit']");

        // Verifica se todos os campos estão preenchidos
        var todosPreenchidos = modelo && placa;

        // Habilita/desabilita o botão com base na verificação
        btnSalvar.disabled = !todosPreenchidos;
    }

    // Adiciona o evento oninput para cada campo
    document.getElementById("modelo").addEventListener("input", verificarCamposVeiculos);
    document.getElementById("placa").addEventListener("input", verificarCamposVeiculos);

    // Chama a função uma vez para garantir que o botão esteja no estado correto inicialmente
    verificarCamposVeiculos();