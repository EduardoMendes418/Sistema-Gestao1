-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Mar-2018 às 19:58
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto10_viagem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.useronline`
--

CREATE TABLE `tb_admin.useronline` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `utima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_admin.useronline`
--

INSERT INTO `tb_admin.useronline` (`id`, `ip`, `utima_acao`, `token`) VALUES
(19, '::1', '2018-03-27 14:36:48', '5aba76e35d23b'),
(20, '::1', '2018-03-27 14:38:49', '5aba814c4b305');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `user`, `password`, `img`, `nome`, `cargo`) VALUES
(1, 'eduardo19', '1212', '5a7c538d3940e.jpg', 'Eduardo J Mendes', 2),
(3, 'eduardo2', '1212', 'edu.jpg', 'Eduardo Rodrigues', 1),
(4, 'ed', '12345', '20160815_202350.jpg', 'Eduardo de Jesus Mendes', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.visitas`
--

CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_admin.visitas`
--

INSERT INTO `tb_admin.visitas` (`id`, `ip`, `dia`) VALUES
(5, '::1', '2018-01-30'),
(6, '::1', '2018-01-30'),
(7, '199.199.19.1', '2018-01-29'),
(8, '::1', '2018-02-08'),
(9, '::1', '2018-02-15'),
(10, '::1', '2018-02-28'),
(11, '::1', '2018-03-07'),
(12, '::1', '2018-03-12'),
(13, '::1', '2018-03-14'),
(14, '::1', '2018-03-20'),
(15, '::1', '2018-03-27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.categorias`
--

CREATE TABLE `tb_site.categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slong` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_site.categorias`
--

INSERT INTO `tb_site.categorias` (`id`, `nome`, `slong`, `order_id`) VALUES
(7, 'Geral', 'geral', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.depoimentos`
--

CREATE TABLE `tb_site.depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  `data` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_site.depoimentos`
--

INSERT INTO `tb_site.depoimentos` (`id`, `nome`, `depoimento`, `data`, `order_id`) VALUES
(27, 'Edu1', 'text', '22/22/2222', 27),
(28, 'edu2', 'text', '33/33/3333', 28),
(29, 'edu3', 'text', '44/44/4444', 29),
(30, 'edu4', 'hehehehehee', '66/66/6666', 30),
(31, 'Eduardo de Jesus Mendes', 'depoi', '22/22/2222', 31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.noticias`
--

CREATE TABLE `tb_site.noticias` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `capa` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `slong` varchar(255) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_site.noticias`
--

INSERT INTO `tb_site.noticias` (`id`, `categoria_id`, `titulo`, `conteudo`, `capa`, `order_id`, `slong`, `data`) VALUES
(13, 7, 'Lorem ips', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ut erat a tellus tincidunt scelerisque a nec nisl. Nam et aliquet lacus. Suspendisse bibendum scelerisque lacinia. Cras pellentesque urna commodo auctor molestie. Fusce sit amet dolor ut justo maximus aliquet. Vivamus et cursus metus.</span><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ut erat a tellus tincidunt scelerisque a nec nisl. Nam et aliquet lacus. Suspendisse bibendum scelerisque lacinia. Cras pellentesque urna commodo auctor molestie. Fusce sit amet dolor ut justo maximus aliquet. Vivamus et cursus metus.</span></p>\r\n<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ut erat a tellus tincidunt scelerisque a nec nisl. Nam et aliquet lacus. Suspendisse bibendum scelerisque lacinia. Cras pellentesque urna commodo auctor molestie. Fusce sit amet dolor ut justo maximus aliquet. Vivamus et cursus metus.</span></p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img src=\"http://www.mochileirodigital.com.br/wp-content/uploads/2014/07/viagens-300x255.jpg\" alt=\"Imagem relacionada\" /></p>\r\n<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ut erat a tellus tincidunt scelerisque a nec nisl. Nam et aliquet lacus. Suspendisse bibendum scelerisque lacinia. Cras pellentesque urna commodo auctor molestie. Fusce sit amet dolor ut justo maximus aliquet. Vivamus et cursus metus.</span><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ut erat a tellus tincidunt scelerisque a nec nisl. Nam et aliquet lacus. Suspendisse bibendum scelerisque lacinia. Cras pellentesque urna commodo auctor molestie. Fusce sit amet dolor ut justo maximus aliquet. Vivamus et cursus metus.</span><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ut erat a tellus tincidunt scelerisque a nec nisl. Nam et aliquet lacus. Suspendisse bibendum scelerisque lacinia. Cras pellentesque urna commodo auctor molestie. Fusce sit amet dolor ut justo maximus aliquet. Vivamus et cursus metus.</span><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ut erat a tellus tincidunt scelerisque a nec nisl. Nam et aliquet lacus. Suspendisse bibendum scelerisque lacinia. Cras pellentesque urna commodo auctor molestie. Fusce sit amet dolor ut justo maximus aliquet. Vivamus et cursus metus.</span></p>\r\n<p><strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Ass:<em>Eduardo Mendes</em></span></strong></p>', '5aba76b5de80d.jpg', 13, 'lorem-ips', '2018-03-27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.servicos`
--

CREATE TABLE `tb_site.servicos` (
  `id` int(11) NOT NULL,
  `servicos` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_site.servicos`
--

INSERT INTO `tb_site.servicos` (`id`, `servicos`, `order_id`) VALUES
(1, '1º Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pellentesque lectus in blandit egestas.', 1),
(2, '2ºLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pellentesque lectus in blandit egestas. Mauris eu tellus non libero blandit viverra ac nec tellus.', 2),
(3, '3ºLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pellentesque lectus in blandit egestas. Mauris eu tellus non libero blandit viverra ac nec tellus.', 3),
(4, '4ºLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pellentesque lectus in blandit egestas. Mauris eu tellus non libero blandit viverra ac nec tellus.', 4),
(5, 'dsdsaasd', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.slider`
--

CREATE TABLE `tb_site.slider` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_site.slider`
--

INSERT INTO `tb_site.slider` (`id`, `nome`, `slide`, `order_id`) VALUES
(10, 'sliswe1', '5a8afa6979acc.jpg', 10),
(11, 'slider2', '5a8afa7a4ae4c.jpg', 11),
(12, 'slider3', '5a8afa898327a.jpg', 12),
(13, 'Eduardo de Jesus Mendes', '5a8b73d34b7bf.png', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site_editar`
--

CREATE TABLE `tb_site_editar` (
  `titulo` varchar(255) NOT NULL,
  `nome_autor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `icone1` varchar(255) NOT NULL,
  `descricao1` text NOT NULL,
  `icone2` varchar(255) NOT NULL,
  `descricao2` text NOT NULL,
  `icone3` varchar(255) NOT NULL,
  `descricao3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_site_editar`
--

INSERT INTO `tb_site_editar` (`titulo`, `nome_autor`, `descricao`, `icone1`, `descricao1`, `icone2`, `descricao2`, `icone3`, `descricao3`) VALUES
('Viagem', 'Destinos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec faucibus nulla. Praesent a erat placerat velit aliquam tempus vitae sed nisl. Sed in quam ac mauris viverra tempus. Fusce at magna arcu. Proin consectetur tincidunt enim, in iaculis odio maximus vel. Donec purus turpis, venenatis eget eros scelerisque, tincidunt molestie diam\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec faucibus nulla. Praesent a erat placerat velit aliquam tempus vitae sed nisl. Sed in quam ac mauris viverra tempus. Fusce at magna arcu. Proin consectetur tincidunt enim, in iaculis odio maximus vel. Donec purus turpis, venenatis eget eros scelerisque, tincidunt molestie diam\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec faucibus nulla. Praesent a erat placerat velit aliquam tempus vitae sed nisl. Sed in quam ac mauris viverra tempus. Fusce at magna arcu. Proin consectetur tincidunt enim, in iaculis odio maximus vel. Donec purus turpis, venenatis eget eros scelerisque, tincidunt molestie diam', 'fa fa-map-marker', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec faucibus nulla. Praesent a erat placerat velit aliquam tempus vitae sed nisl. Sed in quam ac mauris viverra tempus. Fusce at magna arcu. Proin consectetur tincidunt enim, in iaculis odio maximus vel. Donec purus turpis, venenatis eget eros scelerisque, tincidunt molestie diam', 'fa fa-map-marker', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec faucibus nulla. Praesent a erat placerat velit aliquam tempus vitae sed nisl. Sed in quam ac mauris viverra tempus. Fusce at magna arcu. Proin consectetur tincidunt enim, in iaculis odio maximus vel. Donec purus turpis, venenatis eget eros scelerisque, tincidunt molestie diam', 'fa fa-map-marker', 'Proin consectetur tincidunt enim, in iaculis odio maximus vel. Donec purus turpis, venenatis eget eros scelerisque, tincidunt molestie diam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin.useronline`
--
ALTER TABLE `tb_admin.useronline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.categorias`
--
ALTER TABLE `tb_site.categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.noticias`
--
ALTER TABLE `tb_site.noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site.slider`
--
ALTER TABLE `tb_site.slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin.useronline`
--
ALTER TABLE `tb_admin.useronline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_site.categorias`
--
ALTER TABLE `tb_site.categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_site.noticias`
--
ALTER TABLE `tb_site.noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_site.slider`
--
ALTER TABLE `tb_site.slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
