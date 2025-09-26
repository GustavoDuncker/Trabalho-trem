<?php

include "db.php";

session_start();

if(empty($_SESSION["user_pk"])){
    header("Location: index.php");
    exit;
};

$register_msg = "";
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['register'])){
    $new_user = $_POST['nome'] ?? "";
    $new_func = $_POST['funcao'] ?? "";
    $new_cpf = $_POST['cpf'] ?? "";
    $new_ende = $_POST['endereco'] ?? "";
    $new_cont = $_POST['contato'] ?? "";
    $new_email = $_POST['email'] ?? "";
    $new_senha = $_POST['senha'] ?? "";
    if($new_user && $new_pass){
        $stmt = $mysqli -> prepare("INSERT INTO usuarios (nome, funcao, cpf, endereco, contato, email, senha) VALUES (?,?,?, ?, ?, ?, ?)");
        $stmt -> bind_param("sssssss", $new_user, $new_pass,$new_func , $new_cpf, $new_ende, $new_cont, $new_email);
        
        if($stmt->execute()) {
            $register_msg = "Usuário cadastrado com sucesso!";
        }else{
            $register_msg = "Erro ao cadastrar novo usuário.";
        };

        $stmt->close();
    }else{
        $register_msg = "Preencha todos os campos.";
    };
};

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/iconTrem.png" />
    <title>Cadastro</title>
    <link rel="stylesheet" href="../styles/cadastro.css">
    <script src="../scripts/cadastro.js"></script>
</head>
<body>
    <header>
        <a href="../index.php" id="txt-link">◀ Voltar</a>
        <div id="boxTitulo">
            <h1>CADASTRO DE MAQUINISTAS</h1>
        </div>
    </header>
    <main>
        <div class="entradas">
            <div class="nomeEntradas">NOME</div>
            <div class="error" id="errorNome"></div>
            <input class="boxEntradas" id="inputNome" name="nome" type="text"></input>
        </div>
        <div class="entradas">
            <select name="funcao">
                <option value="administrador">ADM</option>
                <option value="maquinista" selected>MAQUINISTA</option>
            </select>
            <div class="error" id="errorFuncao"></div>
            <input class="boxEntradas" id="inputFuncao"></input>
        </div>
        <div class="entradas">
            <div class="nomeEntradas">CPF</div>
            <div class="error" id="errorCpf"></div>
            <input class="boxEntradas" id="inputCpf" name="cpf"></input>
        </div>
        <div class="entradas">
            <div class="nomeEntradas">ENDEREÇO</div>
            <div class="error" id="errorEndereco"></div>
            <input class="boxEntradas" id="inputEndereco" name="endereco"></input>
        </div>
        <div class="entradas">
            <div class="nomeEntradas">CONTATO</div>
            <div class="error" id="errorCtt"></div>
            <input class="boxEntradas" id="inputCtt" name="contato"></input>
        </div>
        <div class="entradas">
            <div class="nomeEntradas">EMAIL</div>
            <div class="error" id="errorEmail"></div>
            <input class="boxEntradas" id="inputEmail" name="email"></input>
        </div>
        <div class="entradas">
            <div class="nomeEntradas">SENHA</div>
            <div class="error" id="errorSenha"></div>
            <input class="boxEntradas" id="inputSenha" name="senha" type="password"></input>
        </div>
        <div id="buttonCadastro">
            <button type="submit" name="register" id="buttonTxt" value="1">CADASTRAR</button>
        </div>
    </main>
</body>
</html>