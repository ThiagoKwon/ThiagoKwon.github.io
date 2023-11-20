CREATE DATABASE PROJETO2;
USE PROJETO2;
CREATE TABLE Cliente (
    Nome VARCHAR(100),
    Peso INT,
    DataNasc INT,
    Senha VARCHAR(100),
    NomeUsuario VARCHAR(100) PRIMARY KEY
);

CREATE TABLE Profissionais (
    DataNasc INT,
    AreaAtuacao VARCHAR(100),
    NomeUsuario VARCHAR(100) PRIMARY KEY,
    Senha VARCHAR(100),
    Nome VARCHAR(100)
);

CREATE TABLE Desafio (
    ID_desafio INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100),
    Dificuldade VARCHAR(20),
    Descricao VARCHAR(100),
    Periodizacao VARCHAR(20),
    Tipo VARCHAR(100),
    Pontuacao INT,
    Status VARCHAR(100),
    fk_Profissionais_NomeUsuario VARCHAR(100)
);

CREATE TABLE Realiza (
    fk_Desafio_ID_desafio INT,
    fk_Cliente_NomeUsuario VARCHAR(100),
    Hora TIME,
    Data DATE
);
 
ALTER TABLE Desafio ADD CONSTRAINT FK_Desafio_2
    FOREIGN KEY (fk_Profissionais_NomeUsuario)
    REFERENCES Profissionais (NomeUsuario)
    ON DELETE CASCADE;
 
ALTER TABLE Realiza ADD CONSTRAINT FK_Realiza_1
    FOREIGN KEY (fk_Desafio_ID_desafio)
    REFERENCES Desafio (ID_desafio)
    ON DELETE SET NULL;
 
ALTER TABLE Realiza ADD CONSTRAINT FK_Realiza_2
    FOREIGN KEY (fk_Cliente_NomeUsuario)
    REFERENCES Cliente (NomeUsuario)
    ON DELETE SET NULL;
    
INSERT INTO Cliente (Nome, Peso, DataNasc, NomeUsuario) VALUES
    ('Ana Silva', 65, 19900101, 'ana_silva'),
    ('Carlos Oliveira', 75, 19851215, 'carlos_oliveira'),
    ('Mariana Santos', 55, 19951020, 'mariana_santos'),
    ('Rafael Pereira', 70, 19880305, 'rafael_pereira'),
    ('Juliana Lima', 60, 19921210, 'juliana_lima'),
    ('Pedro Souza', 80, 19801030, 'pedro_souza'),
    ('Camila Costa', 62, 19980425, 'camila_costa'),
    ('Fernando Rocha', 68, 19870412, 'fernando_rocha'),
    ('Isabela Martins', 57, 19930315, 'isabela_martins'),
    ('Gabriel Santos', 72, 19820108, 'gabriel_santos'),
    ('Lucia Oliveira', 63, 19911203, 'lucia_oliveira'),
    ('Mateus Lima', 78, 19860520, 'mateus_lima'),
    ('Aline Pereira', 58, 19970818, 'aline_pereira'),
    ('Roberto Souza', 73, 19841014, 'roberto_souza'),
    ('Carla Silva', 67, 19900922, 'carla_silva');


INSERT INTO Profissionais (DataNasc, AreaAtuacao, NomeUsuario, Nome) VALUES
    (19811205, 'Personal Trainer', 'p_trainer2', 'Laura Silva'),
    (19851020, 'Personal Trainer', 'p_trainer3', 'Rodrigo Costa'),
    (19870215, 'Personal Trainer', 'p_trainer4', 'Fernanda Lima'),
    (19830810, 'Personal Trainer', 'p_trainer5', 'Thiago Oliveira'),
    (19890425, 'Personal Trainer', 'p_trainer6', 'Camila Santos'),
    (19801130, 'Nutricionista', 'nutri_456', 'Vinicius Pereira'),
    (19840712, 'Nutricionista', 'nutri_789', 'Julia Costa'),
    (19860520, 'Nutricionista', 'nutri_1011', 'Lucas Martins'),
    (19890214, 'Nutricionista', 'nutri_1213', 'Amanda Souza'),
    (19830305, 'Nutricionista', 'nutri_1415', 'Marcos Lima');

INSERT INTO Desafio (ID_desafio, Nome, Dificuldade, Descricao, Periodizacao, Tipo, Pontuacao, Status, fk_Profissionais_NomeUsuario)
VALUES
    (1, 'Desafio de Cardio 1', 'Fácil', 'Treino leve de cardio', 'Semanal', 'Cardio', 50, 'Ativo', 'p_trainer2'),
    (2, 'Desafio de Musculação 1', 'Médio', 'Treino de musculação moderado', 'Mensal', 'Treino', 75, 'Ativo', 'p_trainer3'),
    (3, 'Desafio de Flexibilidade 1', 'Difícil', 'Desenvolver flexibilidade', 'Diário', 'Flexibilidade', 100, 'Concluído', 'p_trainer4'),
    (4, 'Desafio de Cardio 2', 'Médio', 'Treino de cardio regular', 'Quinzenal', 'Cardio', 80, 'Ativo', 'p_trainer5'),
    (5, 'Desafio de Musculação 2', 'Fácil', 'Treino leve de musculação', 'Semanal', 'Treino', 60, 'Ativo', 'p_trainer6'),
    (6, 'Desafio de Flexibilidade 2', 'Difícil', 'Desafio avançado de flexibilidade', 'Mensal', 'Flexibilidade', 90, 'Ativo', 'p_trainer2'),
    (7, 'Desafio de Cardio 3', 'Médio', 'Treino de cardio regular', 'Diário', 'Cardio', 70, 'Concluído', 'p_trainer3'),
    (8, 'Desafio de Musculação 3', 'Fácil', 'Treino leve de musculação', 'Quinzenal', 'Treino', 40, 'Ativo', 'p_trainer4'),
    (9, 'Desafio de Flexibilidade 3', 'Difícil', 'Desafio avançado de flexibilidade', 'Semanal', 'Flexibilidade', 95, 'Ativo', 'p_trainer5'),
    (10, 'Desafio de Cardio 4', 'Médio', 'Treino de cardio regular', 'Mensal', 'Cardio', 75, 'Ativo', 'p_trainer6'),
    (11, 'Desafio de Musculação 4', 'Fácil', 'Treino leve de musculação', 'Diário', 'Treino', 55, 'Concluído', 'p_trainer2'),
    (12, 'Desafio de Flexibilidade 4', 'Difícil', 'Desafio avançado de flexibilidade', 'Quinzenal', 'Flexibilidade', 85, 'Ativo', 'p_trainer3'),
    (13, 'Desafio de Cardio 5', 'Médio', 'Treino de cardio regular', 'Semanal', 'Cardio', 65, 'Ativo', 'p_trainer4'),
    (14, 'Desafio de Musculação 5', 'Fácil', 'Treino leve de musculação', 'Mensal', 'Treino', 45, 'Concluído', 'p_trainer5'),
    (15, 'Desafio de Flexibilidade 5', 'Difícil', 'Desafio avançado de flexibilidade', 'Diário', 'Flexibilidade', 88, 'Ativo', 'p_trainer6');

INSERT INTO Realiza (fk_Desafio_ID_desafio, fk_Cliente_NomeUsuario, Hora, Data)
VALUES
    (1, 'ana_silva', '09:00:00', '2023-01-15'),
    (1, 'carlos_oliveira', '10:30:00', '2023-02-20'),
    (1, 'mariana_santos', '15:45:00', '2023-03-10'),
    (1, 'rafael_pereira', '14:00:00', '2023-04-05'),
    (2, 'juliana_lima', '08:30:00', '2023-05-12'),
    (2, 'pedro_souza', '17:00:00', '2023-06-18'),
    (2, 'camila_costa', '11:15:00', '2023-07-25'),
    (3, 'fernando_rocha', '13:45:00', '2023-08-03'),
    (3, 'isabela_martins', '16:30:00', '2023-09-22'),
    (3, 'gabriel_santos', '10:00:00', '2023-10-08'),
    (4, 'lucia_oliveira', '14:30:00', '2023-11-14'),
    (4, 'mateus_lima', '12:00:00', '2023-12-20'),
    (4, 'aline_pereira', '09:45:00', '2024-01-05'),
    (5, 'roberto_souza', '18:00:00', '2024-02-10'),
    (5, 'carla_silva', '16:15:00', '2024-03-15');

SELECT * FROM desafio;    
    SELECT * FROM cliente;
    SELECT * FROM profissionais;
    SELECT * FROM realiza;


SELECT
    C.Nome AS Cliente,
    COUNT(R.fk_Desafio_ID_desafio) AS Total_Desafios_Concluidos
FROM
    Cliente C
JOIN
    Realiza R ON C.NomeUsuario = R.fk_Cliente_NomeUsuario
JOIN
    Desafio D ON R.fk_Desafio_ID_desafio = D.ID_desafio
WHERE
    D.Status = 'Concluído'
GROUP BY
    C.Nome
ORDER BY
    Total_Desafios_Concluidos DESC;


SELECT
    COUNT(*) AS ClientesIdosos
FROM
    Cliente
WHERE
    YEAR(CURDATE()) - YEAR(FROM_UNIXTIME(DataNasc, '%Y%m%d')) >= 60;
    
    
SELECT
    D.Tipo AS Tipo_Desafio,
    ROUND(AVG(D.Pontuacao), 1) AS Pontuacao_Media
FROM
    Desafio D
GROUP BY
    D.Tipo;

SELECT
    C.Nome AS Nome_Cliente,
    D.Nome AS Nome_Desafio,
    D.Tipo,
    D.Pontuacao
FROM
    Cliente C
JOIN
    Realiza R ON C.NomeUsuario = R.fk_Cliente_NomeUsuario
JOIN
    Desafio D ON R.fk_Desafio_ID_desafio = D.ID_desafio
WHERE
    D.Tipo = 'Cardio';

SELECT
    P.Nome AS Nome_Profissional,
    D.Nome AS Nome_Desafio,
    D.Status
FROM
    Profissionais P
JOIN
    Desafio D ON P.NomeUsuario = D.fk_Profissionais_NomeUsuario
WHERE
    D.Status = 'Ativo'
ORDER BY Nome_Profissional;

SELECT
    P.Nome AS Nome_Profissional,
    D.Nome AS Nome_Desafio,
    D.Status
FROM
    Profissionais P
JOIN
    Desafio D ON P.NomeUsuario = D.fk_Profissionais_NomeUsuario
WHERE
    D.Status = 'Ativo'
    AND D.Tipo = 'Cardio';