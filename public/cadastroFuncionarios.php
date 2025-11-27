<?php
include "../scripts/pegaCep.php";
include "../banco/db.php";

$json_data = pegarEndereco();

session_start();

if (empty($_SESSION["id"])) {
    header("Location: index.php");
    exit;
}

$register_msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['register'])) {
    $new_user = $_POST['nome'] ?? "";
    $new_func = $_POST['funcao'] ?? "";
    $new_cpf = $_POST['cpf'] ?? "";
    $new_cep = $_POST['cep'] ?? "";
    $new_rua = $_POST['rua'] ?? "";
    $new_numRua = $_POST['numRua'] ?? "";
    $new_cidade = $_POST['cidade'] ?? "";
    $new_estado = $_POST['estado'] ?? "";
    $new_cont = $_POST['contato'] ?? "";
    $novo_email = $_POST['novo_email'] ?? "";
    $nova_senha = $_POST['nova_senha'] ?? "";
    $senhaHash = password_hash($nova_senha, PASSWORD_DEFAULT);
    $fotoPerfil = null;
    if (isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] === UPLOAD_ERR_OK) {
        $fotoPerfil = file_get_contents($_FILES['fotoPerfil']['tmp_name']);
    }

    if ($novo_email && $nova_senha) {
        $stmt = $conn->prepare("INSERT INTO usuario (nome, funcao, cpf, cep, rua, numRua, cidade, estado, contato, email, senha, fotoPerfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $new_user, $new_func, $new_cpf, $new_cep, $new_rua, $new_numRua, $new_cidade, $new_estado, $new_cont, $novo_email, $senhaHash, $fotoPerfil);
        $stmt->send_long_data(11, $fotoPerfil);

        if ($stmt->execute()) {
            $register_msg = "Usuário cadastrado com sucesso!";
        } else {
            $register_msg = "Erro ao cadastrar novo usuário.";
        }

        $stmt->close();
    } else {
        $register_msg = "Preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/iconTrem.png" />
    <title>Cadastro</title>
    <link rel="stylesheet" href="../styles/cadastro.css">

    <script src="../scripts/cadastro.js" defer></script>
    <script src="../scripts/viacep.js" defer></script>
</head>

<body>
    <header>
        <a href="../index.php" id="txtLink">◀ Voltar</a>
        <div id="boxTitulo">
            <h1>CADASTRO DE MAQUINISTAS</h1>
        </div>
    </header>
    <main>

        <?php if ($register_msg): ?>
            <div style="color: red; margin-bottom: 10px;"><?= $register_msg ?></div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">

            <div class="entradas">
                <div class="nomeEntradas">NOME</div>
                <div class="error" id="errorNome"></div>
                <input class="boxEntradas" id="inputNome" name="nome" type="text">
            </div>

            <div class="entradas">
                <div class="nomeEntradas">FUNÇÃO</div>
                <select name="funcao">
                    <option value="administrador">ADM</option>
                    <option value="maquinista" selected>MAQUINISTA</option>
                </select>
                <div class="error" id="errorFuncao"></div>
            </div>

            <div class="entradas">
                <div class="nomeEntradas">CPF</div>
                <div class="error" id="errorCpf"></div>
                <input class="boxEntradas" id="inputCpf" name="cpf">
            </div>

            <div class="entradas">
                <div class="nomeEntradas">CEP</div>
                <div class="error" id="errorCEP"></div>
                <input 
                    class="boxEntradas" 
                    id="inputCEP" 
                    name="cep" 
                    value="<?= $json_data->cep ?? "" ?>">
            </div>

            <div class="entradas">
                <div class="nomeEntradas">Rua</div>
                <div class="error" id="errorRua"></div>
                <input 
                    class="boxEntradas" 
                    id="inputRua" 
                    name="rua" 
                    value="<?= $json_data->logradouro ?? "" ?>">
            </div>

            <div class="entradas">
                <div class="nomeEntradas">Número</div>
                <div class="error" id="errorNumero"></div>
                <input class="boxEntradas" id="inputNumero" name="numRua">
            </div>

            <div class="entradas">
                <div class="nomeEntradas">Cidade</div>
                <div class="error" id="errorCidade"></div>
                <input 
                    class="boxEntradas" 
                    id="inputCidade" 
                    name="cidade" 
                    value="<?= $json_data->localidade ?? "" ?>">
            </div>

            <div class="entradas">
                <div class="nomeEntradas">Estado</div>
                <div class="error" id="errorestado"></div>
                <input 
                    class="boxEntradas" 
                    id="inputEstado" 
                    name="estado" 
                    value="<?= $json_data->uf ?? "" ?>">
            </div>

            <div class="entradas">
                <div class="nomeEntradas">CONTATO</div>
                <div class="error" id="errorctt"></div>
                <input class="boxEntradas" id="inputCtt" name="contato">
            </div>

            <div class="entradas">
                <div class="nomeEntradas">EMAIL</div>
                <div class="error" id="erroremail"></div>
                <input class="boxEntradas" id="inputEmail" name="novo_email">
            </div>

            <div class="entradas">
                <div class="nomeEntradas">SENHA</div>
                <div class="error" id="errorsenha"></div>
                <input class="boxEntradas" id="inputSenha" name="nova_senha" type="password">
            </div>

            <div class="entradas">
                <div class="error" id="errorUpload"></div>
                <button type="button" id="buttonUpload" class="boxEntradas" style="width: 100%; height: 40px; margin-top: 5px;" onclick="window.location.href='uploadImagem.php'">UPLOAD IMAGEM</button>
            </div>

            <div id="buttonCadastro">
                <button type="submit" name="register" id="buttonTxt" value="1">CADASTRAR</button>
            </div>

        </form>
    </main>
</body>

</html>
