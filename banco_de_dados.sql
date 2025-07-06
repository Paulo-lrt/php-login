-- Script para criação do banco de dados MySQL
-- Cria o banco de dados de nome "banco_de_dados" (ou o nome que você quiser)
CREATE DATABASE IF NOT EXISTS banco_de_dados CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Usa o banco de dados criado
USE banco_de_dados;

-- Cria a tabela de nome "usuarios" (ou outro nome)
CREATE TABLE IF NOT EXISTS usuarios (
    UUID CHAR(36) PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('admin', 'cliente', 'outro') DEFAULT 'cliente'
);
