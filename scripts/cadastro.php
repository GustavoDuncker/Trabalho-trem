<?php
function validaCadastro($email, $senha, $nome, $funcao, $numero, $cpf, $endereco, $contato) {
    $invalidoEmail = array(' ', '!', '#', '$', '%', '^', '&', '*', '(', ')', '=', '+', ',', ';', '<', '>', '/', '\\', '|', '`', '~');
    $invalido = array('!', '#', '$', '%', '^', '&', '*', '(', ')', '=', '+', ',', ';', '<', '>', '/', '\\', '|', '`', '~');

    
    $possuiInvalidoEmail = false;
    foreach ($invalidoEmail as $char) {
        if (strpos($email, $char) !== false) {
            $possuiInvalidoEmail = true;
            break;
        }
    }
    $emailValido = filter_var($email, FILTER_VALIDATE_EMAIL) && !$possuiInvalidoEmail;

    
    $temComprimentoMinimoSenha = strlen($senha) >= 8;
    $temNumeroSenha = preg_match('/[0-9]/', $senha);
    $temLetraMaiusculaSenha = preg_match('/[A-Z]/', $senha);
    $contemCaractereProibidoSenha = strpos($senha, ';') !== false;

    
    $possuiInvalidoNome = false;
    foreach ($invalido as $char) {
        if (strpos($nome, $char) !== false) {
            $possuiInvalidoNome = true;
            break;
        }
    }
    $temNumeroNome = preg_match('/[0-9]/', $nome);

    
    $possuiInvalidoFuncao = false;
    foreach ($invalido as $char) {
        if (strpos($funcao, $char) !== false) {
            $possuiInvalidoFuncao = true;
            break;
        }
    }
    $temNumeroFuncao = preg_match('/[0-9]/', $funcao);

    
    $possuiInvalidoNumero = false;
    foreach ($invalido as $char) {
        if (strpos($numero, $char) !== false) {
            $possuiInvalidoNumero = true;
            break;
        }
    }
    $temNumeroNumero = preg_match('/[0-9]/', $numero);
    $temLetraMaiusculaNumero = preg_match('/[A-Z]/', $numero);
    $temLetraMinusculaNumero = preg_match('/[a-z]/', $numero);


    $possuiInvalidoCpf = false;
    foreach ($invalido as $char) {
        if (strpos($cpf, $char) !== false) {
            $possuiInvalidoCpf = true;
            break;
        }
    }
    $temComprimentoMinimoCpf = strlen($cpf) == 11;
    $temNumeroCpf = preg_match('/[0-9]/', $cpf);
    $temLetraMaiusculaCpf = preg_match('/[A-Z]/', $cpf);
    $temLetraMinusculaCpf = preg_match('/[a-z]/', $cpf);

    
    $possuiInvalidoEndereco = false;
    foreach ($invalido as $char) {
        if (strpos($endereco, $char) !== false) {
            $possuiInvalidoEndereco = true;
            break;
        }
    }

    
    $possuiInvalidoContato = false;
    foreach ($invalido as $char) {
        if (strpos($contato, $char) !== false) {
            $possuiInvalidoContato = true;
            break;
        }
    }
    $temNumeroContato = preg_match('/[0-9]/', $contato);
    $temComprimentoMinimoContato = strlen($contato) == 9;
    $temLetraMaiusculaContato = preg_match('/[A-Z]/', $contato);  
      $temLetraMinusculaContato = preg_match('/[a-z]/', $contato);

    
    if (!$emailValido) {
        return "Email inválido. Por favor, insira um email válido.";
    } elseif (!$temComprimentoMinimoSenha || !$temNumeroSenha || !$temLetraMaiusculaSenha || $contemCaractereProibidoSenha) {
        return "Senha inválida. A senha deve ter pelo menos 8 caracteres, um número, uma letra maiúscula e não conter o caractere ';'.";
    } elseif ($temNumeroNome || $possuiInvalidoNome) {
        return "Nome inválido.";
    } elseif ($temNumeroFuncao || $possuiInvalidoFuncao) {
        return "Função inválida.";
    } elseif (!$temNumeroNumero || $possuiInvalidoNumero || $temLetraMaiusculaNumero || $temLetraMinusculaNumero) {
        return "Número inválido.";
    } elseif (!$temNumeroCpf || !$temComprimentoMinimoCpf || $possuiInvalidoCpf || $temLetraMaiusculaCpf || $temLetraMinusculaCpf) {
        return "CPF inválido, insira apenas os números.";
    } elseif ($possuiInvalidoEndereco) {
        return "Endereço inválido.";
    } elseif (!$temNumeroContato || !$temComprimentoMinimoContato || $temLetraMinusculaContato || $temLetraMaiusculaContato || $possuiInvalidoContato) {
        return "Contato inválido, insira apenas os números e sem o DDD.";
    } else {
        return "Cadastro bem-sucedido.";
    }
}
?>