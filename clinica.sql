-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/03/2025 às 14:14
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
(12, 6, 16, '2025-03-23', '11:30:00', NULL, 'Tonturas,dores de cabeça e visão embaçada', 'Agora estou já me sentindo bem, obrigada!', 5, '2025-03-21 14:07:28'),
(13, 7, 14, '2025-03-23', '11:30:00', NULL, 'Tonturar, dores de cabeça e visão embaçada', 'Não vou conseguir comparecer no local', 5, '2025-03-21 14:38:24');

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
(3, '12121-212', 'Rua Adm', 'Bairro Adm', 'BL 3 APTO 33', '50', 'SP', 4),
(4, '04816-100', '212', '1212', '1212', '121', 'SP', 5),
(5, '04844-434', 'Rua Teste', 'Bairro teste', 'teste Comp', '50', 'SP', 6),
(6, '08424-241', 'Rua Teste', 'Bairro teste', 'teste Comp', '50', 'SP', 7);

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
(14, 'Clinica Mais Santo Amaro', 'R. Guaiúba, 402', 'Cidade Dutra', 'SP', '(11) 5666-0306', '08:00:00', '15:00:00', 1, 'uploads/1742572083_6eb214c7fb88ba0198b6.jpeg', 'uploads/1742572083_2ed212b50984d61d0689.png', 'uploads/1742572083_4433c52c756434e3ad50.jpg'),
(15, 'Clinica Santa Isabella', 'R. Verbo Divino, 246 ', 'Chácara Santo Antônio ', 'SP', '(11) 94866-5461', '00:00:00', '00:00:00', 1, 'uploads/1742572248_9d49d49563941e2e7c64.jpg', 'uploads/1742572248_ef439fed20b081381cb3.jpg', 'uploads/1742572248_1068fa4126f934fc2e60.jpg'),
(16, 'Centro Médico Santo Amaro', 'Rua Isabel Schmidt, 324', 'Santo Amaro,', 'SP', '(11) 99721-3340', '07:30:00', '18:00:00', 1, 'uploads/1742572371_b4298383775b02161f78.jpg', 'uploads/1742572371_96bfee495512699ea337.jpg', 'uploads/1742572371_83eb03b1f23aa35275a5.jpg'),
(17, 'Clínica da Cidade', 'Av. Santa Catarina, 2165', 'Vila Mascote', 'SP', '(11) 5564-1949', '07:30:00', '19:00:00', 1, 'uploads/1742572488_b59fa7bb9b8b489f9aab.jpg', 'uploads/1742572488_361628bd47936fa222d2.jpg', 'uploads/1742572488_af767ee6e82ec17cd581.jpg');

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
(2, NULL, 'Guilherme Dos Santos Reif', 'guilherme@gmail.com', '$2y$10$KP/3a./YCd76D4mEF.rcQ.6iR4mGw6eXM/DjjD5YkYWLYQyg5L68y', '536.733.988-96', '11943179054', '2004-10-21', '2025-03-19 12:59:53', 2, 'uploads/1742572631_1742572631_8aa10033c899994e3e96.png'),
(4, NULL, 'Admin Sistema', 'admin@gmail.com', '$2y$10$J5qOq79Z8zsjyK3nHBIroupkHMvRxrPDKyvonOn05aWrwylr1HuGi', '121.222.122-21', '11943179054', '2004-10-21', '2025-03-20 17:22:04', 1, NULL),
(5, NULL, 'Maria Fernanda', 'maria@gmail.com', '$2y$10$yb0Y8LcAtqgFeAHWSJiTLOfsREyr0yl7DJyCBV2IHyXQjRMyC9tL6', '456.785.433-32', '12112121212', '1999-09-21', '2025-03-20 21:17:59', NULL, NULL),
(6, NULL, 'Paula Mendes', 'paulamendes@gmail.com', '$2y$10$baAsp9SwmollEWsyHze67.OBMwR5au5SPVVE32nvFEE/Ukn.WEfrG', '763.243.221-45', '119344343465', '0200-02-21', '2025-03-21 13:58:18', NULL, 'uploads/1742576422_1742576422_6db54a25f244f513e75e.png'),
(7, NULL, 'Roberto silva', 'roberto@gmail.com', '$2y$10$q.bEoj7seT4NTGBrW8YtVObmU3Zd.11zguvOULB6FlPLV/Si/tdOS', '548.727.232-32', '11932345674', '1998-09-21', '2025-03-21 14:33:06', NULL, 'uploads/1742578526_1742578526_391ac93cefdd15870489.jpg');

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
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `locais`
--
ALTER TABLE `locais`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
