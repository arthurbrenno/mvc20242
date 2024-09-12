CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    data_nascimento DATE,
    genero ENUM('Masculino', 'Feminino', 'Outro'),
    endereco VARCHAR(255),
    telefone VARCHAR(15),
    email VARCHAR(100),
    documento_identidade VARCHAR(20) UNIQUE,
    carteira_motorista VARCHAR(20) UNIQUE,
    data_registro DATE DEFAULT CURRENT_DATE
);

CREATE TABLE veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    ano_fabricacao YEAR,
    placa VARCHAR(10) UNIQUE NOT NULL,
    cor VARCHAR(20),
    categoria ENUM('Compacto', 'Sedan', 'SUV', 'Caminhonete', 'Van'),
    preco_diaria DECIMAL(10, 2) NOT NULL,
    status ENUM('Disponível', 'Alugado', 'Manutenção') DEFAULT 'Disponível',
    quilometragem INT,
    data_aquisicao DATE
);

CREATE TABLE alugueis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,
    veiculo_id INT,
    data_inicio DATE,
    data_fim DATE,
    preco_total DECIMAL(10, 2),
    status ENUM('Em andamento', 'Concluído', 'Cancelado') DEFAULT 'Em andamento',
    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (veiculo_id) REFERENCES veiculos(id)
);
