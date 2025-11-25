<?php
// MQTT Listener para HiveMQ e MySQL
require __DIR__ . '/../vendor/autoload.php';
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;

// Configurações do HiveMQ
$server   = 'e6607d8d5fec40a9974cfc1552a13e2f.s1.eu.hivemq.cloud';
$port     = 8883;
$username = 'nossosite';
$password = 'Site1234';
$clientId = 'php-listener-' . uniqid();

// Configurações do MySQL
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'smartferrovia';

// Conecta ao banco
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die('Erro ao conectar ao MySQL: ' . $conn->connect_error);
}

// Cria tabela se não existir
$conn->query("CREATE TABLE IF NOT EXISTS SensorLeitura (
    id INT AUTO_INCREMENT PRIMARY KEY,
    topico VARCHAR(50),
    valor VARCHAR(50),
    dataHora DATETIME DEFAULT CURRENT_TIMESTAMP
)");

// Função para processar e salvar
function salvarLeitura($conn, $topico, $valor) {
    $stmt = $conn->prepare('INSERT INTO SensorLeitura (topico, valor) VALUES (?, ?)');
    $stmt->bind_param('ss', $topico, $valor);
    $stmt->execute();
    $stmt->close();
}

// Conecta ao broker MQTT
$connectionSettings = (new ConnectionSettings())
    ->setUsername($username)
    ->setPassword($password)
    ->setUseTls(true);

$mqtt = new MqttClient($server, $port, $clientId);
$mqtt->connect($connectionSettings, true);

$topicos = [
    'TOPICO_PUB_DIST1',
    'TOPICO_PUB_TEMP',
    'TOPICO_PUB_UMI',
    'TOPICO_PUB_ILU',
    'TOPICO_PUB_DIST2',
];

foreach ($topicos as $topico) {
    $mqtt->subscribe($topico, function ($topic, $message) use ($conn) {
        // Aqui você pode validar/interpretar o valor se quiser
        salvarLeitura($conn, $topic, $message);
    }, 0);
}

echo "Escutando MQTT... Pressione Ctrl+C para sair.\n";
$mqtt->loop(true);

// Nunca chega aqui, mas por segurança
die();
