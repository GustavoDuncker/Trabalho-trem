<?php 
include "../banco/db.php";
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: loginAdm.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto_perfil'])) {
    $targetDir = "../assets/images";
    $fileName = uniqid() . '_' . basename($_FILES['foto_perfil']['name']);
    $targetFile = $targetDir . $fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES['foto_perfil']['tmp_name']);
    if ($check === false) {
        $error = "Não é uma imagem.";
        $uploadOk = 0;
    }

    if ($_FILES['foto_perfil']['size'] > 2 * 1024 * 1024) {
        $error = "Arquivo muito grande. Máximo 2MB.";
        $uploadOk = 0;
    }

    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
        $error = "Apenas JPG, JPEG & PNG são permitidos.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $targetFile)) {
            $stmt = $conn->prepare("UPDATE usuario SET foto_perfil = ? WHERE idUsuario = ?");
            $stmt->bind_param("si", $fileName, $_SESSION['id']);
            $stmt->execute();
            $stmt->close();
            header("Location: cadastroFuncionarios.php");
            exit();
        } else {
            $error = "Erro ao enviar o arquivo.";
        }
    }
}
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>
    <style>
        body {
            background: #fff;
            color: rgb(0, 83, 207);
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .upload-container {
            background: rgba(0, 0, 0, 0.95);
            padding: 40px 32px;
            border-radius: 14px;
            text-align: center;
            max-width: 350px;
            width: 100%;
        }
        h2 {
            margin-bottom: 24px;
        }
        input[type="file"] {
            margin: 16px 0;
            background: #222;
            color: #fff;
            border-radius: 8px;
            border: none;
            padding: 8px;
        }
        button {
            background:rgb(0, 83, 207);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 12px;
            transition: background 0.2s;
        }
        button:hover {
            background:rgb(0, 83, 207);
        }
        a {
            color:rgb(0, 83, 207);
            text-decoration: none;
            display: block;
            margin-top: 18px;
        }
        .error {
            color: #ff4444;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="upload-container">
        <h2 style="font-weight: bold; color: #fff;">Enviar Foto de Perfil</h2>
        <?php if (!empty($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="foto_perfil" accept="image/png, image/jpeg, image/jpg" required><br>
            <button type="submit">Enviar</button>
        </form>
        <a href="cadastroFuncionarios.php">Voltar ao Cadastro</a>
    </div>
</body>
</html>