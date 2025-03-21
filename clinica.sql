-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/03/2025 às 00:09
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `id_agendamento` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_local` int(11) DEFAULT NULL,
  `data_agendamento` date DEFAULT NULL,
  `hora_agendamento` time DEFAULT NULL,
  `situacao_agendamento` varchar(10) DEFAULT NULL,
  `motivo_agendamento` text DEFAULT NULL,
  `motivo_cancelamento` text DEFAULT NULL,
  `status_agendamento` int(4) DEFAULT NULL,
  `data_cadastro_agendamento` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamento`
--

INSERT INTO `agendamento` (`id_agendamento`, `id_usuario`, `id_local`, `data_agendamento`, `hora_agendamento`, `situacao_agendamento`, `motivo_agendamento`, `motivo_cancelamento`, `status_agendamento`, `data_cadastro_agendamento`) VALUES
(6, 2, 10, '2025-03-22', '15:30:00', NULL, 'Problemas na coluna, grandes dores na região da barriga', NULL, 1, '2025-03-20 17:03:58'),
(8, 2, 11, '2025-03-22', '15:30:00', NULL, 'fortes doras na coluna', 'NAO TENHO MAIS AVC', 1, '2025-03-20 17:35:48'),
(9, 2, 9, '2025-03-22', '14:30:00', NULL, 'AVC', NULL, 1, '2025-03-20 17:52:24'),
(10, 4, 9, '2025-03-22', '16:30:00', NULL, 'nada', NULL, 1, '2025-03-20 19:45:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `cep_endereco` varchar(50) DEFAULT NULL,
  `logradouro` varchar(250) DEFAULT NULL,
  `bairro` varchar(170) DEFAULT NULL,
  `complemento` varchar(170) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `uf` varchar(15) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `cep_endereco`, `logradouro`, `bairro`, `complemento`, `numero`, `uf`, `id_usuario`) VALUES
(1, '04816-100', 'Praça almirante Pena Botto', 'Jd.Satélite', 'BL 3 APTO 33', '50', 'SP', 2),
(2, '04855-050', 'Praça almirante Pena Botto', 'Jd.Satélite', 'BL 3 APTO 33', '50', 'SP', 3),
(3, '12121-212', 'Rua Adm', 'Bairro Adm', 'BL 3 APTO 33', '50', 'SP', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `locais`
--

CREATE TABLE `locais` (
  `id_local` int(11) NOT NULL,
  `nome_local` varchar(200) DEFAULT NULL,
  `endereco_local` text DEFAULT NULL,
  `bairro_local` varchar(155) DEFAULT NULL,
  `uf_local` varchar(10) DEFAULT NULL,
  `telefone_local` varchar(150) DEFAULT NULL,
  `horario_abertura` time DEFAULT NULL,
  `horario_fechamento` time DEFAULT NULL,
  `situacao_local` int(11) DEFAULT NULL,
  `foto_1` longtext DEFAULT NULL,
  `foto_2` longtext DEFAULT NULL,
  `foto_3` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `locais`
--

INSERT INTO `locais` (`id_local`, `nome_local`, `endereco_local`, `bairro_local`, `uf_local`, `telefone_local`, `horario_abertura`, `horario_fechamento`, `situacao_local`, `foto_1`, `foto_2`, `foto_3`) VALUES
(9, 'Clinica Interlagos', 'Rua clemente 303', 'Jd.São Miguel', 'SP', '11943179054', '10:00:00', '20:00:00', 1, 'uploads/1742500043_312270e30bc8b5d32665.jpg', 'uploads/1742500043_ecaf4fb64bc66c16c0f0.jpg', 'uploads/1742500043_e2afb435ec6ec003d76b.png'),
(10, 'Clinica Borba Gato', 'Rua Bela Vista 103', 'Chácara Santo Antonio', 'SP', '11943179054', '07:00:00', '19:00:00', 1, 'uploads/1742500071_4274c3ab6e7a608cc859.jpg', 'uploads/1742500071_ca393fe382d028b5b4f5.jpg', 'uploads/1742500071_1c1d94934a93bb52b64d.png'),
(11, 'Clinica Pinheiros', 'Rua mendes goes 201', 'Clemente', 'SP', '11943179054', '10:00:00', '22:00:00', 1, 'uploads/1742500128_e49e3d5be7810420d4c3.jpg', 'uploads/1742503029_1742503029_dcb16cc6d522c3ac3d76.png', 'uploads/1742500128_9f74630307466c57d3e5.png'),
(12, 'Clinica parceira RJ', 'Rua carvalho 102', 'Grajau', 'RJ', '11943179054', '04:00:00', '22:00:00', 1, 'uploads/1742500170_9c883f54b2d14934acab.png', 'uploads/1742500170_264eea572eab062dfa63.jpeg', 'uploads/1742500170_cac23eeffca14458dc09.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(12) NOT NULL,
  `id_endereco` int(12) DEFAULT NULL,
  `nome_usuario` varchar(130) DEFAULT NULL,
  `email_usuario` varchar(155) DEFAULT NULL,
  `senha_usuario` text NOT NULL,
  `cpf_usuario` varchar(25) DEFAULT NULL,
  `numero_usuario` varchar(100) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `tipo_usuario` int(5) DEFAULT NULL,
  `foto_usuario` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_endereco`, `nome_usuario`, `email_usuario`, `senha_usuario`, `cpf_usuario`, `numero_usuario`, `data_nascimento`, `data_cadastro`, `tipo_usuario`, `foto_usuario`) VALUES
(2, NULL, 'Guilherme Dos Santos Reif', 'guilherme@gmail.com', '$2y$10$KP/3a./YCd76D4mEF.rcQ.6iR4mGw6eXM/DjjD5YkYWLYQyg5L68y', '536.733.988-96', '11943179054', '2004-10-21', '2025-03-19 12:59:53', 2, 'uploads/1742500910_1742500910_6c3e99d1c1d9308fcd37.jpeg'),
(4, NULL, 'Admin Sistema', 'admin@gmail.com', '$2y$10$J5qOq79Z8zsjyK3nHBIroupkHMvRxrPDKyvonOn05aWrwylr1HuGi', '121.222.122-21', '11943179054', '2004-10-21', '2025-03-20 17:22:04', 1, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`id_agendamento`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices de tabela `locais`
--
ALTER TABLE `locais`
  ADD PRIMARY KEY (`id_local`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `locais`
--
ALTER TABLE `locais`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
