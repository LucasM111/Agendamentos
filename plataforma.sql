-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Ago-2023 às 20:43
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `plataforma`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `veiculo` varchar(50) DEFAULT NULL,
  `motorista` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `motivo` varchar(50) DEFAULT NULL,
  `n_visitantes` int(11) DEFAULT NULL,
  `produto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `Nome`, `veiculo`, `motorista`, `data`, `hora`, `motivo`, `n_visitantes`, `produto`) VALUES
(1, 'Lucas Marques', 'Mercedes Benz C180', 'Vando', '2023-08-08', '15:38:00', 'Coleta na empresa', 2, 'Malhas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `imagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `imagem`) VALUES
(1, 'Informática', ''),
(3, 'Cosméticos', ''),
(4, 'Limpeza', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cpf` char(14) NOT NULL,
  `telefone` char(15) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `cpf`, `telefone`, `foto`, `login`, `senha`) VALUES
(2, 'Bill Gates', 'bill@gastes.com', '729.589.990-17', '(44) 99991-2345', 'clientes_1678405077', NULL, NULL),
(3, 'Camila Matos De Souza', 'camilamatos7186@gmail.com', '105.033.269-50', '(44) 99724-1170', 'clientes_1677202559', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `formas`
--

CREATE TABLE `formas` (
  `id` int(11) NOT NULL,
  `forma` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `formas`
--

INSERT INTO `formas` (`id`, `forma`) VALUES
(1, 'Cartão de Débito'),
(2, 'Cartão de Crédito'),
(5, 'PagSeguro'),
(6, 'Pix'),
(7, 'Vale');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `vendas_id` int(11) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  `valor` double NOT NULL,
  `qtde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`vendas_id`, `produtos_id`, `valor`, `qtde`) VALUES
(1, 2, 12000.9, 2),
(2, 3, 8900.9, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `motoristas`
--

CREATE TABLE `motoristas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `motoristas`
--

INSERT INTO `motoristas` (`id`, `nome`, `sobrenome`) VALUES
(1, 'Vando', 'Aparecido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `produto` varchar(200) NOT NULL,
  `categorias_id` int(11) NOT NULL,
  `valor` double NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `produto`, `categorias_id`, `valor`, `descricao`, `imagem`) VALUES
(2, 'MacBook Pro', 1, 12000.9, '<p>MacBook Pro<br></p>', '1673615989_2'),
(3, 'Asus VivoBook', 1, 8900.9, '<p>Asus VivoBook<br></p>', '1673616027_2'),
(6, 'Asus VivoBook', 1, 8900.9, '<p>Asus VivoBook<br></p>', '1673616027_2'),
(7, 'MacBook Pro', 1, 12000.9, '<p>MacBook Pro<br></p>', '1673615989_2'),
(8, 'MacBook Pro', 1, 12000.9, '<p>MacBook Pro<br></p>', '1673615989_2'),
(12, 'Pó Compacto Faces', 3, 39.9, 'Benefícios\r\nTextura leve;\r\nUniformiza o tom da pele;\r\nEfeito matte;\r\nDermatologicamente\r\nOftalmologicamente testado;\r\nReduz o brilho causado pelo excesso de oleosidade.\r\n', 'pomaquiagem.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ativo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `ativo`) VALUES
(1, 'Bill Gates', 'billgates', '$2y$10$PtIVqfKtvyJ.E1D1r0OuXuNDYgqWwy2dISNIUCKJpX/RdyXu97H1C', 'S'),
(2, 'Steve Jobs', 'stevejobs', '$2y$10$PtIVqfKtvyJ.E1D1r0OuXuNDYgqWwy2dISNIUCKJpX/RdyXu97H1C', 'S'),
(3, 'Camila Matos De Souza', 'CamilaM', '$2y$10$sPr3nBaOIDHGsz9FIj2StOo7x86aAyUwu9vQ5NIEw4RwN2VS.60ke', 'S'),
(4, 'Silvana Kelly da Silva', 'CamilaMaa', '$2y$10$UdB0dz7kj6QCytDoOb/12O4NWU18eU0tfAtJdp/0r95t6oQNkCsca', 'S'),
(5, 'Lucas Marques', 'Lucas', '$2y$10$1TZkN2qhJdo09TZwj00JUOaBoemKyJlCPALXUXMrHzPt9wWEO7mme', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `Modelo` varchar(100) DEFAULT NULL,
  `placa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `Modelo`, `placa`) VALUES
(1, 'Mercedes Benz C180', 'AUQ-8489');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `status` char(1) NOT NULL,
  `clientes_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `formas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `data`, `status`, `clientes_id`, `usuarios_id`, `formas_id`) VALUES
(1, '2023-01-11', 'A', 2, 1, 1),
(2, '2023-01-13', 'A', 2, 1, 1),
(3, '2022-12-10', 'A', 2, 1, 2),
(4, '2023-04-06', 'A', 2, 2, 1),
(5, '2023-04-06', 'A', 2, 2, 1),
(6, '2023-04-06', 'A', 2, 1, 1),
(7, '2023-04-06', 'C', 2, 2, 6),
(8, '2023-04-06', 'C', 2, 2, 1),
(9, '2023-04-06', 'P', 2, 2, 7),
(10, '2023-05-04', 'C', 2, 4, 5),
(11, '2023-05-21', 'A', 2, 3, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoria_UNIQUE` (`categoria`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`);

--
-- Índices para tabela `formas`
--
ALTER TABLE `formas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`vendas_id`,`produtos_id`),
  ADD KEY `fk_vendas_has_produtos_produtos1_idx` (`produtos_id`),
  ADD KEY `fk_vendas_has_produtos_vendas1_idx` (`vendas_id`);

--
-- Índices para tabela `motoristas`
--
ALTER TABLE `motoristas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produtos_categorias_idx` (`categorias_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendas_clientes1_idx` (`clientes_id`),
  ADD KEY `fk_vendas_usuarios1_idx` (`usuarios_id`),
  ADD KEY `fk_vendas_formas1_idx` (`formas_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `formas`
--
ALTER TABLE `formas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `motoristas`
--
ALTER TABLE `motoristas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `fk_vendas_has_produtos_produtos1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vendas_has_produtos_vendas1` FOREIGN KEY (`vendas_id`) REFERENCES `vendas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_categorias` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vendas_formas1` FOREIGN KEY (`formas_id`) REFERENCES `formas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vendas_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
