CREATE DATABASE IF NOT EXISTS netflix_laravel;
USE netflix_laravel;

-- tabela de usuários do sistema (login)
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- tabela filmes
CREATE TABLE filmes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    ano INT NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- tabela series
CREATE TABLE series (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    temporadas INT NOT NULL,
    genero VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- tabela usuarios (clientes da netflix, diferente do login)
CREATE TABLE usuarios (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    plano VARCHAR(50) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- usuário admin padrão (senha: 12345678)
INSERT INTO users (name, email, password, created_at, updated_at)
VALUES ('Admin', 'admin@netflix.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW());

-- alguns filmes de exemplo
INSERT INTO filmes (nome, categoria, ano, created_at, updated_at) VALUES
('Stranger Things', 'Ficção Científica', 2016, NOW(), NOW()),
('La Casa de Papel', 'Drama', 2017, NOW(), NOW()),
('Dark', 'Mistério', 2017, NOW(), NOW());

-- algumas series de exemplo
INSERT INTO series (nome, temporadas, genero, created_at, updated_at) VALUES
('Breaking Bad', 5, 'Drama', NOW(), NOW()),
('The Witcher', 3, 'Fantasia', NOW(), NOW()),
('Narcos', 3, 'Crime', NOW(), NOW());

-- alguns usuarios de exemplo
INSERT INTO usuarios (nome, email, plano, created_at, updated_at) VALUES
('João Silva', 'joao@email.com', 'Premium', NOW(), NOW()),
('Maria Santos', 'maria@email.com', 'Básico', NOW(), NOW()),
('Pedro Lima', 'pedro@email.com', 'Standard', NOW(), NOW());
