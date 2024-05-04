-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para cinekaizoku
CREATE DATABASE IF NOT EXISTS `cinekaizoku` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `cinekaizoku`;

-- Copiando estrutura para tabela cinekaizoku.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL DEFAULT '',
  `datahoraregistro` datetime NOT NULL,
  PRIMARY KEY (`idcategoria`),
  KEY `idcategoria` (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela cinekaizoku.categorias: ~9 rows (aproximadamente)
DELETE FROM `categorias`;
INSERT INTO `categorias` (`idcategoria`, `categoria`, `datahoraregistro`) VALUES
	(2, 'Ação', '0000-00-00 00:00:00'),
	(3, 'Terror', '0000-00-00 00:00:00'),
	(4, 'Romance', '0000-00-00 00:00:00'),
	(5, 'Aventura', '0000-00-00 00:00:00'),
	(6, 'Animação', '0000-00-00 00:00:00'),
	(7, 'Drama', '0000-00-00 00:00:00'),
	(8, 'Suspense', '0000-00-00 00:00:00'),
	(9, 'Ficçao', '0000-00-00 00:00:00'),
	(10, 'Comédia', '0000-00-00 00:00:00');

-- Copiando estrutura para tabela cinekaizoku.filmes
CREATE TABLE IF NOT EXISTS `filmes` (
  `idfilme` int(11) NOT NULL AUTO_INCREMENT,
  `nomefilme` varchar(255) NOT NULL DEFAULT '',
  `anofilme` year(4) NOT NULL,
  `categorias_idcategoria` int(11) NOT NULL,
  `sinopse` varchar(255) NOT NULL DEFAULT '',
  `datahoraregistro` datetime NOT NULL,
  PRIMARY KEY (`idfilme`),
  KEY `idfilme` (`idfilme`),
  KEY `categoriafilme` (`categorias_idcategoria`) USING BTREE,
  CONSTRAINT `fk_categorias_idcategoria` FOREIGN KEY (`categorias_idcategoria`) REFERENCES `categorias` (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela cinekaizoku.filmes: ~25 rows (aproximadamente)
DELETE FROM `filmes`;
INSERT INTO `filmes` (`idfilme`, `nomefilme`, `anofilme`, `categorias_idcategoria`, `sinopse`, `datahoraregistro`) VALUES
	(1, 'Velozes e Furiosos 10', '2023', 2, 'Dom Toretto e sua família precisam lidar com o adversário mais letal que já enfrentaram. Alimentada pela vingança, uma ameaça terrível emerge das sombras do passado para destruir o mundo de Dom e todos que ele ama.', '2024-04-04 20:02:55'),
	(2, 'Godzila vs Kong', '2021', 3, 'Kong e seus protetores embarcam em uma jornada perigosa para encontrar seu verdadeiro lar. Jia, uma garota órfã que tem um vínculo único e poderoso com a poderosa besta, acompanha a aventura. No entanto, eles logo se encontram no caminho de Godzilla, comp', '2024-04-04 20:03:57'),
	(3, 'Napoleão', '2023', 7, 'As origens do comandante militar Napoleão e sua rápida ascensão. Uma visão através do prisma de seu relacionamento e muitas vezes volátil com sua esposa e por ser amor verdadeiro, Josephine.', '2024-04-04 20:04:37'),
	(4, 'Patrulha Canina', '2023', 6, 'Os filhotes da Patrulha Canina ganham poderes após um meteoro mágico cair na cidade. Para um deles, é um grande sonho que se tornou realidade, mas a felicidade dos patrulheiros pode estar ameaçada quando o maior inimigo dos filhotes foge da prisão.', '2024-04-04 20:05:06'),
	(5, 'Jogos Vorazes – A Cantiga dos Pássaros e das Serpentes', '2023', 2, 'A Cantiga dos Pássaros e das Serpentes é a história do ditador de Panem antes de chegar ao poder. Anos antes, Coriolanus Snow vivia na capital, nascido na grande casa de Snow, que não anda muito bem em popularidade e financeiramente. Ele se prepara para s', '2024-04-04 20:06:50'),
	(6, 'Gato de Botas 2: O Último Pedido', '2022', 6, 'O Gato de Botas descobre que sua paixão pela aventura cobrou seu preço: ele já gastou oito de suas nove vidas. Ele então parte em uma jornada épica para encontrar o mítico Último Desejo e restaurar suas nove vidas.', '2024-04-04 20:08:44'),
	(7, 'Doutor Estranho no Multiverso da Loucura', '2020', 9, 'Em Doutor Estranho no Multiverso da Loucura, após derrotar Dormammu e enfrentar Thanos nos eventos de Vingadores: Ultimato, o Mago Supremo, Stephen Strange (Benedict Cumberbatch), e seu parceiro Wong (Benedict Wong), continuam suas pesquisas sobre a Joia ', '2024-04-04 20:10:29'),
	(9, 'Black Clover - A Espada do Rei Mago', '2023', 6, 'Um garoto destemido e sem poderes mágicos luta pelo título de Rei Mago enfrentando quatro rivais que foram banidos e agora ameaçam destruir o Reino Clover.', '2024-04-06 16:52:20'),
	(10, 'Maze Runner: Correr ou Morrer', '2014', 5, 'Em um futuro apocalíptico, o jovem Thomas é escolhido para enfrentar o sistema. Ele acorda dentro de um escuro elevador em movimento e não consegue se lembrar nem de seu nome. Na comunidade isolada em que foi abandonado, Thomas conhece outros garotos que ', '2024-04-06 18:52:47'),
	(11, ' Maze Runner: Prova de Fogo', '2015', 5, 'Depois de escapar do labirinto, Thomas e os garotos que o acompanharam em sua fuga encontram uma realidade bem diferente: a superfície da Terra foi queimada pelo Sol e eles precisam lidar com criaturas disformes chamadas Cranks.', '2024-04-06 18:55:50'),
	(12, 'Maze Runner: A Cura Mortal', '2018', 5, 'Thomas parte em uma missão para encontrar a cura de uma doença mortal e descobre que os planos da C.R.U.E.L podem trazer consequências catastróficas para a humanidade.', '2024-04-06 18:57:25'),
	(13, 'Kung-Fu Futebol Clube', '2001', 10, 'Sing, que é adepto da prática do kung fu shaolin, resolve usar os seus chutes poderosos em outro esporte. Ele reúne os amigos lutadores e monta um time de futebol que consegue se dar bem no campeonato da cidade.', '2024-04-06 19:03:13'),
	(14, 'Carros', '2001', 6, 'Ao viajar para a Califórnia, o famoso carro de corridas Relâmpago McQueen se perde e vai parar em Radiator Springs, uma cidadezinha na Rota 66. Ele conhece novos amigos e aprende lições que mudam sua forma de encarar a vida.', '2024-04-06 19:08:08'),
	(15, 'Gente Grande', '2010', 10, 'A morte do treinador de basquete de infância de velhos amigos reúne a turma no mesmo lugar que celebraram um campeonato anos atrás. Os amigos, acompanhados de suas esposas e filhos, descobrem que idade não significa o mesmo que maturidade.', '2024-04-06 19:14:02'),
	(17, 'Gente Grande 2', '2013', 10, 'Lenny Feder e a família se mudam para a própria cidade natal com o objetivo ficarem perto dos amigos, mas acabam tendo que enfrentar alguns fantasmas do passado, como a covardia diante de valentões e o famigerado bullying na escola.', '2024-04-06 19:15:41'),
	(18, 'Super-Herói: O Filme', '2008', 10, 'O jovem estudante Rick Riker tem sua vida mudada quando, numa excursão a um laboratório de pesquisa animal, é picado por uma libélula geneticamente alterada. No dia seguinte, ele acorda com superpoderes.', '2024-04-06 19:24:45'),
	(19, 'Harry Potter e a Pedra Filosofal', '2001', 9, 'Harry Potter é um garoto órfão que vive infeliz com seus tios, os Dursleys. Ele recebe uma carta contendo um convite para ingressar em Hogwarts, uma famosa escola especializada em formar jovens bruxos.', '2024-04-06 19:25:49'),
	(20, 'Pixels', '2015', 5, 'Em busca de contato com seres extraterrestres, a humanidade enviou imagens e sons variados sobre sua própria cultura nos mais diversos satélites lançados ao espaço. Após encontrar um desses registros, uma raça alienígena resolve criar monstros digitais in', '2024-04-06 19:27:53'),
	(21, 'O Espetacular Homem-Aranha', '2012', 2, 'O jovem Peter Parker quer saber mais sobre sua origem. Ele encontra uma pasta que pertenceu ao seu pai e tenta descobrir por que seus pais desapareceram. A sua busca o leva a Oscorp e ao dr. Curt Connors, que tem como alter ego o letal Lagarto.', '2024-04-06 19:31:45'),
	(22, 'O Espetacular Homem-Aranha 2 - A Ameaça de Electro', '2014', 2, 'O jovem Peter Parker está fascinado com as habilidades que adquiriu como Homem-Aranha. Agora, ele precisa lidar com dois problemas: o retorno de um velho amigo, Harry Osborn, e a chegada de um vilão mais forte e poderoso, Electro.', '2024-04-06 19:32:22'),
	(23, 'Todo Mundo em Pânico', '2000', 10, 'Depois do assassinato de uma bela colega de classe, um grupo de adolescentes desorientados descobre que há um assassino entre eles. A heroína Cindy Campbell e a sua turma de amigos tentam se proteger do perigo, mas Gail Hailstorm, uma repórter irritante, ', '2024-04-06 19:44:41'),
	(24, 'Hancock', '2008', 2, 'Hancock é um super-herói desajeitado que protege os cidadãos de Los Angeles, mas causa danos colaterais a cada ato heroico que realiza. Ele não se importa com o que as pessoas pensam a seu respeito. Depois de salvar a vida de um executivo, ele conhece a b', '2024-04-07 03:34:44'),
	(25, 'Um Amor para Recordar', '2002', 4, 'Um jovem delinquente do ensino médio é obrigado a ser o tutor de uma escola de baixa renda. Lá, ele se apaixona pela filha do pastor e vive uma paixão cheia de diferenças e surpresas.', '2024-04-07 15:48:42'),
	(26, 'Oppenheimer ', '2023', 7, 'O físico J. Robert Oppenheimer trabalha com uma equipe de cientistas durante o Projeto Manhattan, levando ao desenvolvimento da bomba atômica.', '2024-04-08 16:25:47'),
	(27, 'Superbad - É Hoje', '2007', 10, 'Os adolescentes Seth e Evan têm grandes esperanças para uma festa de formatura. Eles pretendem beber e conquistar as garotas para que eles possam se tornar parte da turma mais popular da escola, mas a ansiedade de separação e dois policiais entediados com', '2024-05-01 05:46:41');

-- Copiando estrutura para tabela cinekaizoku.imgfilmes
CREATE TABLE IF NOT EXISTS `imgfilmes` (
  `idimg` int(11) NOT NULL AUTO_INCREMENT,
  `filmes_idfilme` int(11) NOT NULL,
  `imgnome` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`idimg`),
  KEY `idimg` (`idimg`),
  KEY `filmes_idfilme` (`filmes_idfilme`),
  CONSTRAINT `fk_filmes_idfilme` FOREIGN KEY (`filmes_idfilme`) REFERENCES `filmes` (`idfilme`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela cinekaizoku.imgfilmes: ~19 rows (aproximadamente)
DELETE FROM `imgfilmes`;
INSERT INTO `imgfilmes` (`idimg`, `filmes_idfilme`, `imgnome`) VALUES
	(1, 1, '448eb32b385bb73e448541155ebf80a5.jpg'),
	(2, 2, '6a7e9f28df48f9fcec9d58e9b097b80a.jpg'),
	(3, 3, 'cfdfc8b321f52d8c8ed9d7bbf88f5ed5.jpg'),
	(4, 4, 'a1f45381d65670b2193c400214f85da0.png'),
	(5, 5, '54cede84124e6929d2ba7166924d0203.jpg'),
	(6, 6, 'f4a2f08dd9410a79d1c701611a1083ec.jpg'),
	(7, 7, 'b5a5e44c95c16f049e17f030f0845bc7.jpg'),
	(9, 9, '3d97049ef261606a74a8b075eb646e4b.jpg'),
	(10, 10, 'fbc4fd8bfe66d8f376557a07e2ac85fb.jpg'),
	(11, 11, '59f3e7eb8f579d426664ee2cc6492514.jpg'),
	(12, 12, '8042da7f9e88fe07d18dac2415f0fc8e.jpg'),
	(13, 13, 'd90094b77ff6d18683ba2ba704783150.jpg'),
	(14, 14, 'f4f617e308d8a11361d42f45b09cd363.jpg'),
	(15, 15, '4d108cec2867bf8a2f59475726e1818a.jpg'),
	(16, 17, 'd082b944a449ba9f260ec4399e7efceb.jpg'),
	(17, 18, '2a766bb3cbb970da4303a63c7b1521c6.jpg'),
	(18, 19, '111b9a2082ec1ab2cef5e5c504ae6da8.jpg'),
	(19, 20, 'ed5fc014ca5f894c08bb929afeabcc38.jpg'),
	(20, 21, 'cafb0c1d157ddc9f1d96f3d784361f4c.jpg'),
	(21, 22, 'ae9ecf9d306cdd3281a378cb2a454e88.jpg'),
	(22, 23, '56f58c6ffed0bab3e5ed2ba87c69a3ef.jpg'),
	(23, 24, '07cf6cc49507c6e5419dff8d477d9cd9.jpg'),
	(24, 25, '7b798bef6850724b3fda0ec9607ba505.jpg'),
	(25, 26, 'edae1097c3e387346fb2a5631cb9174d.jpg'),
	(26, 27, 'ae2ac9ab6f0f7902338eb5e354eef601.jpg');

-- Copiando estrutura para tabela cinekaizoku.mylist
CREATE TABLE IF NOT EXISTS `mylist` (
  `idlistafilmes` int(11) NOT NULL AUTO_INCREMENT,
  `filmes_idfilme` int(11) NOT NULL,
  PRIMARY KEY (`idlistafilmes`),
  KEY `idlistafilmes` (`idlistafilmes`),
  KEY `filmes_idfilme` (`filmes_idfilme`),
  CONSTRAINT `fk_filmes_idfilme2` FOREIGN KEY (`filmes_idfilme`) REFERENCES `filmes` (`idfilme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela cinekaizoku.mylist: ~0 rows (aproximadamente)
DELETE FROM `mylist`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
