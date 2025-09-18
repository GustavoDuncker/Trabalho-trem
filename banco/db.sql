CREATE DATABASE IF NOT EXISTS smartferrovia;
USE smartferrovia;

CREATE TABLE PerfilUsuario (
    idPerfil INT PRIMARY KEY,
    nomePerfil VARCHAR(50) NOT NULL
);

CREATE TABLE Usuario (
    idUsuario INT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    senha VARCHAR(100),
    idPerfil INT,
    FOREIGN KEY (idPerfil) REFERENCES PerfilUsuario(idPerfil)
);

CREATE TABLE Estacao (
    idEstacao INT PRIMARY KEY,
    nome VARCHAR(100),
    cidade VARCHAR(100),
    estado VARCHAR(50)
);

CREATE TABLE Trem (
    idTrem INT PRIMARY KEY,
    identificacao VARCHAR(50) UNIQUE,
    modelo VARCHAR(50),
    anoFabricacao INT,
    energiaPorKm DECIMAL(10,2)
);

CREATE TABLE Sensor (
    idSensor INT PRIMARY KEY,
    tipoSensor VARCHAR(50), 
    localInstalacao VARCHAR(100), 
    idTrem INT NULL,
    idEstacao INT NULL,
    FOREIGN KEY (idTrem) REFERENCES Trem(idTrem),
    FOREIGN KEY (idEstacao) REFERENCES Estacao(idEstacao)
);

CREATE TABLE Telemetria (
    idTelemetria INT PRIMARY KEY,
    idTrem INT,
    velocidade DECIMAL(5,2),
    direcao VARCHAR(20),
    localizacao VARCHAR(100),
    dataHora DATETIME,
    FOREIGN KEY (idTrem) REFERENCES Trem(idTrem)
);

CREATE TABLE Rota (
    idRota INT PRIMARY KEY,
    nome VARCHAR(100)
);

CREATE TABLE Segmento (
    idSegmento INT PRIMARY KEY,
    idRota INT,
    ordem INT,
    idEstacaoOrigem INT,
    idEstacaoDestino INT,
    FOREIGN KEY (idRota) REFERENCES Rota(idRota),
    FOREIGN KEY (idEstacaoOrigem) REFERENCES Estacao(idEstacao),
    FOREIGN KEY (idEstacaoDestino) REFERENCES Estacao(idEstacao)
);

CREATE TABLE Viagem (
    idViagem INT PRIMARY KEY,
    idTrem INT,
    idRota INT,
    dataPartida DATETIME,
    dataChegadaPrevista DATETIME,
    dataChegadaReal DATETIME,
    FOREIGN KEY (idTrem) REFERENCES Trem(idTrem),
    FOREIGN KEY (idRota) REFERENCES Rota(idRota)
);

CREATE TABLE IndicadorIntegridade (
    idIndicador INT PRIMARY KEY,
    nome VARCHAR(100),
    unidade VARCHAR(20)
);

CREATE TABLE MonitoramentoIntegridade (
    idMonitoramento INT PRIMARY KEY,
    idTrem INT,
    idIndicador INT,
    valor DECIMAL(10,2),
    dataHora DATETIME,
    FOREIGN KEY (idTrem) REFERENCES Trem(idTrem),
    FOREIGN KEY (idIndicador) REFERENCES IndicadorIntegridade(idIndicador)
);

CREATE TABLE OrdemServico (
    idOrdem INT PRIMARY KEY,
    idTrem INT,
    descricao TEXT,
    dataAbertura DATE,
    dataConclusao DATE,
    status VARCHAR(20),
    FOREIGN KEY (idTrem) REFERENCES Trem(idTrem)
);

CREATE TABLE RelatorioMensal (
    idRelatorio INT PRIMARY KEY,
    mes INT,
    ano INT,
    eficienciaEnergetica DECIMAL(10,2),
    taxaPontualidade DECIMAL(5,2),
    causaAtrasoPrincipal VARCHAR(200),
    custoManutencaoMedio DECIMAL(10,2)
);

CREATE TABLE Alerta (
    idAlerta INT PRIMARY KEY,
    tipo VARCHAR(50),
    mensagem TEXT,
    dataHora DATETIME,
    criticidade VARCHAR(20) 
);

CREATE TABLE AlertaUsuario (
    idAlerta INT,
    idUsuario INT,
    PRIMARY KEY (idAlerta, idUsuario),
    FOREIGN KEY (idAlerta) REFERENCES Alerta(idAlerta),
    FOREIGN KEY (idUsuario) REFERENCES Usuario(idUsuario)
);