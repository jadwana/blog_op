-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 13 jan. 2023 à 11:19
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `commentDate` datetime NOT NULL DEFAULT current_timestamp(),
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `validation` varchar(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `commentDate`, `post_id`, `user_id`, `validation`) VALUES
(1, 'contenu du commentaire 1', '2022-10-28 13:45:20', 1, 2, 'y'),
(2, ' commentaire  modifié par titato', '2022-12-02 10:56:01', 1, 7, 'y'),
(3, 'test3', '2022-10-28 13:46:23', 2, 4, 'y'),
(4, 'avec id', '2022-11-04 11:14:06', 1, 3, 'n'),
(5, 'test', '2022-11-07 09:07:59', 1, 3, 'n'),
(6, 'test 2 ajout', '2022-11-07 09:27:38', 1, 3, 'n'),
(7, 'ajout commentaire par util2 sur post1', '2022-11-07 15:09:56', 1, 3, 'y'),
(9, 'nv commentaire de titato', '2022-11-13 16:11:58', 1, 7, 'y'),
(10, 'un article très intéressant ! super!', '2023-01-02 10:40:56', 6, 7, 'y'),
(11, 'l\'article est super!', '2022-12-02 11:47:43', 6, 8, 'y'),
(12, 'un article au top !', '2022-12-09 10:26:00', 1, 7, 'y'),
(13, 'super!', '2022-12-09 17:21:05', 2, 9, 'n'),
(14, 'top', '2022-12-09 17:22:05', 4, 9, 'y'),
(15, 'très intéressant ', '2022-12-09 17:23:52', 2, 8, 'n'),
(16, 'bof pas top...', '2022-12-12 17:26:45', 2, 7, 'n'),
(17, 'j\'ai pas compris???', '2022-12-12 17:31:04', 2, 11, 'n'),
(18, 'super!', '2023-01-13 09:32:35', 2, 7, 'y'),
(19, 'test commentaire', '2022-12-23 10:54:11', 4, 8, 'n'),
(20, 'ffff', '2023-01-13 10:19:55', 2, 7, 'y');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT current_timestamp(),
  `chapo` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `creationDate`, `chapo`, `user_id`) VALUES
(1, 'mon 1er article', 'Lorem ipsum dolor sit amet. Eos aspernatur illum sed quibusdam omnis ut eaque veritatis qui itaque assumenda a animi possimus ut voluptatem galisum. Sit quia eius et soluta sapiente non assumenda repellat non perferendis dolor ut nisi voluptas.\r\n\r\nRem quia velit qui cumque nobis ut galisum animi. Qui reprehenderit quaerat non reiciendis deserunt hic dolore vitae ut nemo dolorem et maiores nihil id dolor delectus sed deleniti odio!\r\n\r\nEt quisquam animi quo molestiae animi qui totam distinctio 33 deserunt dolorem non delectus nemo. Ea blanditiis exercitationem cum culpa blanditiis et asperiores quaerat et doloribus reiciendis.', '2022-11-26 13:10:23', 'Rem quia velit qui cumque nobis ut galisum animi. Qui reprehenderit quaerat non reiciendis deserunt hic dolore vitae ut nemo dolorem et maiores nihil id dolor delectus sed deleniti odio!', 8),
(2, 'Article 2', 'Lorem ipsum dolor sit amet. Aut nesciunt maiores ea quibusdam velit et delectus dolores est placeat quas. At autem consequatur ex libero itaque et consequuntur omnis. 33 sint voluptatem sed maxime enim id corrupti quidem hic dicta sapiente rem ullam molestiae qui galisum quisquam At placeat beatae. Est doloremque corporis eum numquam aliquam qui voluptas accusantium eum sapiente atque non deleniti magni.\r\n\r\nSed voluptatum galisum est excepturi maxime qui omnis ducimus ea nesciunt rerum. Et nulla natus sit blanditiis iusto ea harum officiis. Non aperiam facilis sit animi omnis ea ipsum magni At perspiciatis laborum in explicabo voluptatem eum galisum incidunt.\r\n\r\nEt rerum maxime non ipsum galisum vel pariatur galisum qui accusantium architecto nam omnis temporibus? Ex officiis sint qui temporibus sint qui voluptatum explicabo et fugiat facilis.', '2022-12-02 17:10:24', 'Et rerum maxime non ipsum galisum vel pariatur galisum qui accusantium architecto nam omnis temporibus? Ex officiis sint qui temporibus sint qui voluptatum explicabo et fugiat facilis.', 8),
(4, 'nv', 'Lorem ipsum dolor sit amet. Qui ratione iste non eius voluptatem aut ipsum quod sed Quis rerum in quia nihil quo galisum repellendus? In quae reprehenderit aut sint aspernatur et laboriosam explicabo hic rerum omnis! Eum velit recusandae nam officiis consequatur est facilis sint et deleniti dignissimos aut aperiam autem qui perspiciatis consequuntur ex consequatur tenetur. Aut dolorum exercitationem ut veritatis illum nam laudantium consequatur.\r\n\r\nVel laboriosam asperiores sed eligendi odio et quasi eligendi aut ipsum earum. A debitis quam sit doloremque voluptate ea consequatur possimus. Nam aliquam maiores ut possimus rerum est pariatur ipsum? At alias quasi non exercitationem tempore sed maiores ratione aut sunt unde vel voluptatem alias a facilis nemo.', '2023-01-13 10:21:10', 'Eos laborum quos At animi autem nam obcaecati labore eum voluptatem labore hic debitis voluptas vel quia rerum. Ut dolorem totam id reprehenderit dolorem ut pariatur velit vel enim soluta? bbbb', 8),
(6, 'Trou de ver', 'Un trou de ver formerait un raccourci à travers l\'espace-temps. Pour le représenter plus simplement, on peut figurer l\'espace-temps non en quatre dimensions mais en deux, à la manière d\'un tapis ou d\'une feuille de papier, dont la surface serait pliée sur elle-même dans un espace à trois dimensions. L\'utilisation du raccourci « trou de ver » permettrait un voyage du point A directement au point B en un temps considérablement réduit par rapport au temps qu\'il faudrait pour parcourir la distance séparant ces deux points de manière linéaire, à la surface de la feuille. Visuellement, il faut s\'imaginer voyager non pas à la surface de la feuille de papier, mais à travers le trou de ver ; la feuille, étant repliée sur elle-même, permet au point A de toucher directement le point B, la rencontre des deux points correspondant au trou de ver.\r\n\r\nL\'utilisation d\'un trou de ver permettrait théoriquement le voyage d\'un point de l\'espace à un autre (déplacement dans l\'espace), le voyage d\'un point à l\'autre du temps (déplacement dans le temps), et le voyage d\'un point de l\'espace-temps à un autre (déplacement à travers l\'espace et, simultanément, à travers le temps).\r\n\r\nLes trous de ver sont des concepts purement théoriques : l\'existence et la formation physique de tels objets dans l\'Univers n\'ont pas été vérifiées. Ils ne doivent pas être confondus avec les trous noirs, dont l\'existence a été vérifiée en 2019 et dont le champ gravitationnel est si intense qu’il empêche toute forme de matière de s\'en échapper.', '2022-12-02 11:46:46', 'Un trou de ver (en anglais : wormhole) est, en astrophysique, un objet hypothétique qui relierait deux feuillets distincts ou deux régions distinctes de l\'espace-temps et se manifesterait, d\'un côté, comme un trou noir et, de l\'autre côté, comme un trou blanc.', 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `role`, `password`, `username`, `email`) VALUES
(7, 'user', '$2y$10$OE.H8dto2/SDs1gMlg3dlOqkYd.peDKsaLJz0y5.IGJhtshA2kTEy', 'titato', 'email@test.fr'),
(8, 'admin', '$2y$10$tJT2G0hHIZTKEDRcZxgUful3bwCdequbCycuHhbaqvp7omb/I9.nG', 'sandrine', 'test@mail.fr'),
(9, 'user', '$2y$10$InPToybThEixzOzbtJgeFOEcBSO.g9p2K5A44K.LltPMm23hkcHmy', 'etoile', 'test@mail.com'),
(11, 'user', '$2y$10$kqnUowMwN3n9YUC6CN3O2.SZPULr6XK2zSCEhqBz0RVp29oB6S13O', 'kirikou', 'kirikou@mail.fr'),
(12, 'user', '$2y$10$dBRtvPM8waF3an/rLtw/3u6x9TgFCkYPAI6LTNIsAZX5jIRIPSXoy', 'nemesis', 'nemesis@test.fr');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `posts_ibfk_1` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
