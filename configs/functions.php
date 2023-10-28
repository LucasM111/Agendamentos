<?php

function mensagem($titulo, $msg)
{
	echo "
		<script>
			Swal.fire({
				title: '{$titulo}',
				text: '{$msg}',
			}).then((result) => {
				history.back();
			});
		</script>
		";
	exit;
}

function formatarValor($valor)
{
	// 5.900,00 -> 5900.00
	$valor = str_replace(".", "", $valor);
	// 5900,00 -> 5900.00
	return str_replace(",", ".", $valor);
}

function formatarData($data)
{
	// 06/04/2023 -> 2023-04-06
	$data = explode("/", $data);
	return $data[2] . "-" . $data[1] . "-" . $data[0];
}

function validarPlaca($placa)
{
	// Remove espaços em branco e deixa todas as letras em maiúsculas
	$placa = strtoupper(preg_replace('/\s/', '', $placa));

	// placas tradicionais (XXX-9999)
	$Tradicional = '/^[A-Z]{3}-\d{4}$/';

	// modelo Mercosul (AAA9A99)
	$Mercosul = '/^[A-Z]{3}\d[A-Z]\d{2}$/';

	if (preg_match($Tradicional, $placa) || preg_match($Mercosul, $placa)) {
		return true; // A placa é válida
	} else {
		return false; // A placa não é válida
	}
}

function senhaValida($senha)
{
	// Verifique se a senha possui pelo menos 1 letra maiúscula
	if (preg_match('/[A-Z]/', $senha) === 0) {
		return false;
	}

	// Verifique se a senha possui pelo menos 1 número
	if (preg_match('/[0-9]/', $senha) === 0) {
		return false;
	}

	// Verifique se a senha possui pelo menos 1 letra minúscula
	if (preg_match('/[a-z]/', $senha) === 0) {
		return false;
	}

	// A senha atende a todos os critérios
	return true;
}

function validarNomeSobrenome($nomeCompleto)
{
	$nomeCompleto = trim($nomeCompleto);


	if (preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/', $nomeCompleto)) {

		if (strpos($nomeCompleto, ' ') !== false) {
			list($nome, $sobrenome) = explode(' ', $nomeCompleto, 2);


			if (!empty($nome) && !empty($sobrenome)) {
				return true;
			}
		}
	}

	return false; // Nome e sobrenome inválidos
}

function validarModeloCarro($modelo)
{
	if (preg_match('/^(.*[A-Za-z]){3}[A-Za-z0-9\s\-_,.&()]*$/', $modelo)) {
		return true;
	} else {
		return false;
	}
}

function validarLogin($login) {
    if (strlen($login) >= 5 && ctype_alnum($login)) {
        return true;
    } else {
        return false;
    }
}