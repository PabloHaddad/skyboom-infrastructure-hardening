-- 1. Criação das Tabelas
CREATE TABLE IF NOT EXISTS frotas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo_aeronave VARCHAR(20) NOT NULL,
    modelo VARCHAR(100) NOT NULL,
    status VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS operadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    licenca_anac VARCHAR(40) NOT NULL,
    status VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    nome VARCHAR(120) NOT NULL,
    cargo VARCHAR(80) NOT NULL,
    perfil VARCHAR(30) NOT NULL,
    acesso_ssh BOOLEAN DEFAULT FALSE,
    acesso_docker BOOLEAN DEFAULT FALSE,
    acesso_admin BOOLEAN DEFAULT FALSE,
    acesso_logs BOOLEAN DEFAULT FALSE,
    acesso_monitoramento BOOLEAN DEFAULT FALSE
);

-- 2. Inserção de Dados (População inicial para testes)
INSERT INTO operadores (nome, licenca_anac, status) VALUES
('Comandante João Lima', 'ANAC-123456', 'Ativo'),
('Co-piloto Carla Mendes', 'ANAC-987654', 'Prontidão');

INSERT INTO usuarios (usuario, nome, cargo, perfil, acesso_ssh, acesso_docker, acesso_admin, acesso_logs, acesso_monitoramento) VALUES
('adm_sbx', 'Administrador SkyBoom', 'Administrador de TI', 'administrador', true, true, true, true, true),
('op_sbx', 'Operador SkyBoom', 'Operador de Logística', 'operador', false, false, false, false, true),
('auditor_sbx', 'Auditor SkyBoom', 'Auditor de Segurança', 'auditor', false, false, false, false, true);
