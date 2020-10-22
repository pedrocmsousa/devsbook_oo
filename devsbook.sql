-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 02-Set-2020 às 12:00
-- Versão do servidor: 10.3.22-MariaDB-1ubuntu1
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `devsbook`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcomments`
--

CREATE TABLE `postcomments` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `postcomments`
--

INSERT INTO `postcomments` (`id`, `id_post`, `id_user`, `created_at`, `body`) VALUES
(1, 6, 1, '2020-08-27 11:39:22', 'No mundo atual, a percepção das dificuldades cumpre um papel essencial na formulação das posturas dos órgãos dirigentes com relação às suas atribuições.'),
(2, 7, 2, '2020-08-27 13:44:35', 'Opa'),
(3, 13, 1, '2020-09-02 01:48:37', 'Teste de comentários'),
(4, 12, 1, '2020-09-02 09:04:18', 'Teste de comentario...');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postlikes`
--

CREATE TABLE `postlikes` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `postlikes`
--

INSERT INTO `postlikes` (`id`, `id_post`, `id_user`, `created_at`) VALUES
(1, 1, 1, '2020-08-27 10:14:56'),
(2, 5, 2, '2020-08-27 10:27:40'),
(3, 5, 1, '2020-08-27 10:27:54'),
(5, 7, 1, '2020-08-27 13:44:26'),
(6, 13, 1, '2020-08-31 17:32:31'),
(7, 12, 1, '2020-09-02 09:04:02'),
(8, 21, 1, '2020-09-02 11:52:32'),
(9, 20, 1, '2020-09-02 11:52:37'),
(10, 19, 1, '2020-09-02 11:52:39'),
(11, 15, 1, '2020-09-02 11:52:41'),
(12, 23, 1, '2020-09-02 11:57:08'),
(13, 22, 1, '2020-09-02 11:57:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `type`, `created_at`, `body`) VALUES
(1, 1, 'text', '2020-08-25 21:25:51', 'Ainda assim, existem dúvidas a respeito de como o surgimento do comércio virtual desafia a capacidade de equalização dos procedimentos normalmente adotados.'),
(2, 1, 'text', '2020-08-27 09:22:18', 'No entanto, não podemos esquecer que a mobilidade dos capitais internacionais causa impacto indireto na reavaliação dos níveis de motivação departamental.'),
(3, 1, 'text', '2020-08-27 09:22:34', 'Acima de tudo, é fundamental ressaltar que a complexidade dos estudos efetuados representa uma abertura para a melhoria do fluxo de informações.'),
(4, 2, 'text', '2020-08-27 09:25:54', 'Do mesmo modo, a revolução dos costumes cumpre um papel essencial na formulação das direções preferenciais no sentido do progresso.'),
(5, 2, 'text', '2020-08-27 09:26:04', 'O que temos que ter sempre em mente é que a valorização de fatores subjetivos deve passar por modificações independentemente dos índices pretendidos.'),
(6, 2, 'text', '2020-08-27 09:26:20', 'O cuidado em identificar pontos críticos no consenso sobre a necessidade de qualificação auxilia a preparação e a composição dos níveis de motivação departamental.'),
(7, 1, 'photo', '2020-08-27 13:07:27', '1.jpg'),
(8, 1, 'text', '2020-08-29 14:11:20', 'O empenho em analisar a percepção das dificuldades obstaculiza a apreciação da importância das direções preferenciais no sentido do progresso.'),
(9, 4, 'text', '2020-08-29 14:14:06', 'Podemos já vislumbrar o modo pelo qual a adoção de políticas descentralizadoras afeta positivamente a correta previsão das regras de conduta normativas.'),
(10, 1, 'text', '2020-08-29 15:11:13', 'Todas estas questões, devidamente ponderadas, levantam dúvidas sobre se a valorização de fatores subjetivos maximiza as possibilidades por conta do processo de comunicação como um todo.'),
(11, 1, 'text', '2020-08-29 15:50:52', 'A prática cotidiana prova que o início da atividade geral de formação de atitudes promove a alavancagem de alternativas às soluções ortodoxas.'),
(12, 1, 'text', '2020-08-29 16:03:52', 'No mundo atual, o entendimento das metas propostas oferece uma interessante oportunidade para verificação das condições financeiras e administrativas exigidas.\r\n\r\n\r\nNunca é demais lembrar o peso e o significado destes problemas, uma vez que a necessidade de renovação processual estimula a padronização do sistema de formação de quadros que corresponde às necessidades.'),
(13, 1, 'text', '2020-08-29 17:53:10', 'O que temos que ter sempre em mente é que a adoção de políticas descentralizadoras exige a precisão e a definição das diversas correntes de pensamento.'),
(14, 1, 'text', '2020-09-02 10:46:11', 'O que temos que ter sempre em mente é que o acompanhamento das preferências de consumo garante a contribuição de um grupo importante na determinação dos métodos utilizados na avaliação de resultados.'),
(15, 1, 'photo', '2020-09-02 11:08:36', 'e0f804c6eb7d611cc2f45759a702105d.jpg'),
(19, 1, 'photo', '2020-09-02 11:25:30', 'ad767738bbfc4c5b37743f17225aac63.jpg'),
(20, 1, 'photo', '2020-09-02 11:29:11', '44bfb5bae0c66c3a7619d1c060e52681.jpg'),
(21, 1, 'photo', '2020-09-02 11:29:19', '972caab91db6ef411c3ce781fdc8bc5b.jpg'),
(22, 1, 'photo', '2020-09-02 11:56:15', 'd6fc4b33e6622923832ce07a642f6788.jpg'),
(23, 1, 'photo', '2020-09-02 11:56:39', '6cff9e5b822235e571f4e02e6a08070a.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `userrelations`
--

CREATE TABLE `userrelations` (
  `id` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `userrelations`
--

INSERT INTO `userrelations` (`id`, `user_from`, `user_to`) VALUES
(1, 2, 1),
(2, 1, 2),
(5, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `work` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `cover` varchar(100) NOT NULL DEFAULT 'cover.jpg',
  `token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `birthdate`, `city`, `work`, `avatar`, `cover`, `token`) VALUES
(1, 'sousacmpedro@gmail.com', '$2y$10$2NZU5kBc.KKEmboDg1IBfeDCUSN.e6pd92V3csMFQUwZs7QZ.Kose', 'Pedro Sousa', '1986-04-15', 'Belo Horizonte', 'Porteiro', '330e9fe4a5961a68804dc71d20371b33.jpg', '8344e66c1e18d8f6da0a42e6a05f0e09.jpg', 'b79403cde4fa2a614ee3a2040dc7d5fc'),
(2, 'leticiamandrade@gmail.com', '$2y$10$2NZU5kBc.KKEmboDg1IBfeDCUSN.e6pd92V3csMFQUwZs7QZ.Kose', 'Leticia Sousa', '1980-09-09', '', '', 'default.jpg', 'cover.jpg', 'fd253ce86f4c0b8ab121f470bd1efea6'),
(4, 'luizhenriqmachado@gmail.com', '$2y$10$G1UyjqpRQ5nJlpaRkpQTN.JehPk6cvTw3tFh1LKOGEhdhbYbswd52', 'Luiz Henrique', '1999-02-16', '', '', 'default.jpg', 'cover.jpg', '0472509adf6aff64c46b01114944b6f8');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `postcomments`
--
ALTER TABLE `postcomments`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `postlikes`
--
ALTER TABLE `postlikes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `userrelations`
--
ALTER TABLE `userrelations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `postcomments`
--
ALTER TABLE `postcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `postlikes`
--
ALTER TABLE `postlikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `userrelations`
--
ALTER TABLE `userrelations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
