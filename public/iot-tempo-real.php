<?php

include "../banco/db.php";

$result = $conn->query("SELECT * FROM SensorLeitura ORDER BY dataHora DESC LIMIT 50");
$leituras = [];
while ($row = $result->fetch_assoc()) {
    $leituras[] = $row;
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/iconTrem.png" />
    <title>Monitoramento IoT - Tempo Real</title>
    <link rel="stylesheet" href="../styles/cadastro.css">
    <style>
        .iot-table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        .iot-table th, .iot-table td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        .iot-table th { background: #eee; }
    </style>
    <script>
    function atualizarTabela() {
        fetch('iot-tempo-real.php?ajax=1')
        .then(resp => resp.text())
        .then(html => {
            document.getElementById('iot-tabela').innerHTML = html;
        });
    }
    setInterval(atualizarTabela, 3000);
    </script>
</head>
<body>
    <header>
        <a href="inicioAdm.php" id="txtLink">◀ Voltar</a>
        <div id="boxTitulo">
            <h1>MONITORAMENTO IOT - TEMPO REAL</h1>
        </div>
    </header>
    <main>
        <div id="iot-tabela">
        <?php if (isset($_GET['ajax'])): ?>
            <?php foreach($leituras as $l): ?>
                <tr>
                    <td><?= htmlspecialchars($l['topico']) ?></td>
                    <td><?= htmlspecialchars($l['valor']) ?></td>
                    <td><?= htmlspecialchars($l['dataHora']) ?></td>
                </tr>
            <?php endforeach; ?>
            <?php exit; ?>
        <?php endif; ?>
        <table class="iot-table">
            <thead>
                <tr>
                    <th>Tópico</th>
                    <th>Valor</th>
                    <th>Data/Hora</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($leituras as $l): ?>
                <tr>
                    <td><?= htmlspecialchars($l['topico']) ?></td>
                    <td><?= htmlspecialchars($l['valor']) ?></td>
                    <td><?= htmlspecialchars($l['dataHora']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </main>
</body>
</html>
