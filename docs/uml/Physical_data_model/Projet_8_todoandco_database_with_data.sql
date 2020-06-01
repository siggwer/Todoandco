-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  jeu. 23 avr. 2020 à 09:51
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `todolist`
--
CREATE DATABASE IF NOT EXISTS `todolist` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `todolist`;

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_done` tinyint(1) NOT NULL,
  `date_is_done` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_527EDB25A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id`, `user_id`, `created_at`, `title`, `content`, `is_done`, `date_is_done`) VALUES
(1, 1, '2020-04-23 09:48:39', 'in', 'Fuga atque eligendi sit est quis eum optio eum. Maxime a aut fuga sit inventore possimus et. Deleniti natus fugit fuga non.', 0, '2020-04-23 09:48:39'),
(2, 1, '2020-04-23 09:48:39', 'magnam', 'Non similique ea ut voluptas eaque non. Et quas molestiae veritatis numquam ducimus quia delectus. Et dolor aut ut illum. Molestiae debitis voluptatem cum et.', 0, '2020-04-23 09:48:39'),
(3, 1, '2020-04-23 09:48:39', 'ad', 'Beatae repudiandae qui sed incidunt impedit. Est voluptates quia aut maxime voluptas dolorem. Recusandae quos sed sed quia.', 0, '2020-04-23 09:48:39'),
(4, 1, '2020-04-23 09:48:39', 'enim', 'Veritatis architecto ea iste suscipit dignissimos. Quasi atque quibusdam quo non voluptatum. Libero ut perferendis culpa sapiente itaque.', 0, '2020-04-23 09:48:39'),
(5, 1, '2020-04-23 09:48:39', 'veritatis', 'Quos ullam esse amet rerum. Totam dolor velit quam consequuntur ex excepturi itaque. Molestiae nihil quis nemo suscipit saepe corporis saepe. Et quas ducimus laborum sed omnis.', 0, '2020-04-23 09:48:39'),
(6, 1, '2020-04-23 09:48:39', 'et', 'Debitis dicta id aut aut aliquam quaerat quia illo. Ipsam in aut aut tempore dolorum.', 0, '2020-04-23 09:48:39'),
(7, 1, '2020-04-23 09:48:39', 'commodi', 'Quis minima molestias sequi eos. Qui assumenda maxime voluptas dolorum ad quidem distinctio. Dolores itaque deserunt et aut aut. Autem ex ad unde culpa quis.', 0, '2020-04-23 09:48:39'),
(8, 1, '2020-04-23 09:48:39', 'aut', 'Architecto et tempore deserunt repellendus omnis ea nemo dignissimos. Eum error assumenda et eveniet. Non laboriosam modi veritatis.', 0, '2020-04-23 09:48:39'),
(9, 1, '2020-04-23 09:48:39', 'ad', 'Dolores nihil totam recusandae praesentium. Dolores autem natus omnis quisquam. Corporis cupiditate non quis velit debitis cupiditate praesentium. Doloribus inventore quae quas ipsum quia corporis.', 0, '2020-04-23 09:48:39'),
(10, 1, '2020-04-23 09:48:39', 'velit', 'Consequatur maxime voluptatem modi laboriosam voluptatem sint maxime. Fugiat consequuntur possimus natus eos ab non aperiam. Quasi praesentium natus mollitia nesciunt.', 0, '2020-04-23 09:48:39'),
(11, 1, '2020-04-23 09:48:39', 'maiores', 'Eligendi ducimus enim sint omnis quos. Ut ut molestiae qui laudantium. Enim harum voluptas velit dolor aut. Itaque sed nobis odit voluptatum cum et totam.', 0, '2020-04-23 09:48:39'),
(12, 1, '2020-04-23 09:48:39', 'et', 'Magni sapiente ab suscipit commodi expedita molestiae. Pariatur sed aut assumenda qui accusamus omnis aperiam non. Praesentium repudiandae dolorem labore illum. Cupiditate est aut aut.', 0, '2020-04-23 09:48:39'),
(13, 1, '2020-04-23 09:48:39', 'sunt', 'At sed sunt id repudiandae. Blanditiis ducimus quos et. Odio provident enim non dolore consequatur est. Labore dolore soluta quam laudantium.', 0, '2020-04-23 09:48:39'),
(14, 1, '2020-04-23 09:48:39', 'aspernatur', 'Amet qui autem facere nihil. Error ea eum corrupti voluptas quidem. At est incidunt quo dolor ex. Qui occaecati voluptatibus dolores in vitae.', 0, '2020-04-23 09:48:39'),
(15, 1, '2020-04-23 09:48:39', 'fuga', 'Et veritatis qui omnis est. Inventore exercitationem sed autem quibusdam odit. Animi et eaque libero ut. Et saepe omnis quidem sunt sint.', 0, '2020-04-23 09:48:39'),
(16, 1, '2020-04-23 09:48:39', 'ducimus', 'Eaque a qui fugit ut ullam ut ducimus. Optio at nemo blanditiis qui repellendus et sit. Dolorum tempore ut dolore.', 0, '2020-04-23 09:48:39'),
(17, 1, '2020-04-23 09:48:39', 'ducimus', 'Provident rerum voluptatem natus veritatis totam voluptatem non. Blanditiis vitae non nam sequi. Dolores quaerat suscipit impedit voluptatibus unde sed fugit aut.', 0, '2020-04-23 09:48:39'),
(18, 1, '2020-04-23 09:48:39', 'dolorum', 'Quis facere reiciendis sit. Quia vel nemo ut ratione beatae earum.', 0, '2020-04-23 09:48:39'),
(19, 1, '2020-04-23 09:48:39', 'ullam', 'Eum hic fugiat quia dolorem vitae. Et et libero quisquam natus facere. Natus enim ut quis optio cupiditate commodi nisi.', 0, '2020-04-23 09:48:39'),
(20, 1, '2020-04-23 09:48:39', 'et', 'Excepturi consectetur exercitationem culpa sit sunt. Quam aspernatur et est quam voluptatibus. Laudantium delectus tenetur officia tenetur. Excepturi optio unde autem explicabo exercitationem.', 0, '2020-04-23 09:48:39'),
(21, 1, '2020-04-23 09:48:39', 'temporibus', 'Ut rem et provident debitis aut doloribus. Placeat voluptatem voluptate vitae dolor aut. Aut enim voluptates optio dolor officia.', 0, '2020-04-23 09:48:39'),
(22, 1, '2020-04-23 09:48:39', 'et', 'Quam quae voluptate ut qui voluptatem impedit deserunt. Impedit quidem ut sint. Ea enim aut et exercitationem.', 0, '2020-04-23 09:48:39'),
(23, 1, '2020-04-23 09:48:39', 'odit', 'Delectus eum quia amet. Ipsa voluptates rerum aliquam. Sint quam minus iste consequatur id.', 0, '2020-04-23 09:48:39'),
(24, 1, '2020-04-23 09:48:39', 'consectetur', 'Qui earum qui accusantium. Velit qui sunt doloribus esse delectus voluptatem recusandae. Aut nulla voluptas veritatis exercitationem ab.', 0, '2020-04-23 09:48:39'),
(25, 1, '2020-04-23 09:48:39', 'inventore', 'Error qui et architecto neque sit amet. Sunt est praesentium in perferendis. Sequi aspernatur vel voluptates est illum praesentium. Aut necessitatibus non excepturi vel perspiciatis aliquid rem qui.', 0, '2020-04-23 09:48:39'),
(26, 2, '2020-04-23 09:48:39', 'tenetur', 'Et doloremque sed dignissimos aut culpa officia corporis. Pariatur quasi ut aliquam natus modi quaerat voluptates atque.', 0, '2020-04-23 09:48:39'),
(27, 2, '2020-04-23 09:48:39', 'culpa', 'Aut unde nam dolores rerum ea quod impedit. Consequatur eius alias dolorum unde. Est ut quaerat dolorem. Voluptas iste non autem facere quisquam quas.', 0, '2020-04-23 09:48:39'),
(28, 2, '2020-04-23 09:48:39', 'molestiae', 'Consequatur optio sit quos nemo voluptatibus autem. Sed sint repellat est est saepe quia nemo. In possimus voluptas fugit incidunt.', 0, '2020-04-23 09:48:39'),
(29, 2, '2020-04-23 09:48:39', 'minus', 'Et occaecati sit culpa culpa animi unde. Nisi officia id sit nemo. Et maiores deserunt et delectus provident deserunt quis.', 0, '2020-04-23 09:48:39'),
(30, 2, '2020-04-23 09:48:39', 'possimus', 'Eaque aut dolorem labore. Molestiae est sit tenetur est optio. Iste enim ipsum fuga quibusdam ut qui dolorem. Et eos accusamus autem nihil officia.', 0, '2020-04-23 09:48:39'),
(31, 2, '2020-04-23 09:48:39', 'vel', 'Vel et ut minus ut adipisci rerum facilis. Autem quis quod ut deleniti est et. Accusantium dolor deleniti et autem voluptates rerum sequi.', 0, '2020-04-23 09:48:39'),
(32, 2, '2020-04-23 09:48:39', 'eos', 'Earum officia quia enim soluta ut. Aut omnis non magni et. Ullam quis quod architecto aspernatur.', 0, '2020-04-23 09:48:39'),
(33, 2, '2020-04-23 09:48:39', 'ratione', 'Assumenda eum laborum aut enim. Ut mollitia alias odit dicta repellendus expedita commodi. Autem recusandae cupiditate aperiam est quo iste laborum corrupti.', 0, '2020-04-23 09:48:39'),
(34, 2, '2020-04-23 09:48:39', 'nam', 'Iste et inventore velit est illo. Laudantium aut est praesentium aut. Sed ad voluptatem totam earum reprehenderit fugiat.', 0, '2020-04-23 09:48:39'),
(35, 2, '2020-04-23 09:48:39', 'perferendis', 'Neque ut id at commodi pariatur atque debitis. Est et odit omnis voluptatem facere. Expedita qui et reiciendis id.', 0, '2020-04-23 09:48:39'),
(36, 2, '2020-04-23 09:48:39', 'voluptatem', 'Vitae dolorem quia id ipsa. Quam odit enim nostrum officia laborum. Vel est eos debitis eaque qui non doloribus labore.', 0, '2020-04-23 09:48:39'),
(37, 2, '2020-04-23 09:48:39', 'quaerat', 'Aut eveniet ullam ut vero. Id molestias est quia et nostrum. Dolorem libero voluptates quia qui vel.', 0, '2020-04-23 09:48:39'),
(38, 2, '2020-04-23 09:48:39', 'rerum', 'Illo quae in et dolore. Quidem nostrum debitis non. Animi asperiores consequatur aut ipsum ipsa dolor nihil veritatis. Vitae non asperiores alias rerum nemo nihil exercitationem.', 0, '2020-04-23 09:48:39'),
(39, 2, '2020-04-23 09:48:39', 'ab', 'Vitae inventore quod aut. Libero voluptas ex voluptatem sint quasi qui nulla. Perspiciatis aut qui deserunt voluptatum sed.', 0, '2020-04-23 09:48:39'),
(40, 2, '2020-04-23 09:48:39', 'dolores', 'Voluptas velit quas facilis. Possimus assumenda facere ad ea. Neque autem officia quibusdam ea delectus. Repellat incidunt dolor ipsam sint quidem in.', 0, '2020-04-23 09:48:39'),
(41, 2, '2020-04-23 09:48:39', 'qui', 'Perferendis tempore et natus sit exercitationem. Omnis laboriosam culpa quo asperiores. Ut error accusantium autem accusamus sint autem placeat. Suscipit mollitia itaque quia.', 0, '2020-04-23 09:48:39'),
(42, 2, '2020-04-23 09:48:39', 'aperiam', 'Culpa eligendi totam hic aut. Eligendi magni libero hic necessitatibus. Est assumenda aliquid aliquam voluptatem aut. Voluptatum natus quia quia.', 0, '2020-04-23 09:48:39'),
(43, 2, '2020-04-23 09:48:39', 'laborum', 'Sint sit veniam aut aperiam enim nesciunt fugiat. Consequatur aut ad nostrum fugiat maiores. Illo voluptatem at beatae alias beatae nemo eum.', 0, '2020-04-23 09:48:39'),
(44, 2, '2020-04-23 09:48:39', 'tenetur', 'Quibusdam voluptas qui in mollitia. Quia illo ratione rerum provident reprehenderit tempora iure. Dolores facilis maiores nisi praesentium culpa velit.', 0, '2020-04-23 09:48:39'),
(45, 2, '2020-04-23 09:48:39', 'praesentium', 'Non adipisci omnis fuga reiciendis autem tenetur a corrupti. Libero rerum qui earum ullam illo reprehenderit dolor dignissimos. Blanditiis veniam molestiae ipsa dolorem qui est.', 0, '2020-04-23 09:48:39'),
(46, 2, '2020-04-23 09:48:39', 'soluta', 'Asperiores et reprehenderit ut sunt sint. Ipsam accusantium sed totam odio illum minima voluptas. Dolorum possimus ut officia.', 0, '2020-04-23 09:48:39'),
(47, 2, '2020-04-23 09:48:39', 'provident', 'Minus et explicabo maiores fugiat omnis quaerat sed. Aperiam illo distinctio explicabo. Ab consectetur et vel aperiam numquam fuga impedit.', 0, '2020-04-23 09:48:39'),
(48, 2, '2020-04-23 09:48:39', 'expedita', 'Omnis recusandae repudiandae ex perferendis necessitatibus maxime cupiditate quisquam. Eveniet non repellat labore ut quia.', 0, '2020-04-23 09:48:39'),
(49, 2, '2020-04-23 09:48:39', 'ex', 'Voluptatem sit debitis nobis voluptatem. Vel delectus voluptatem pariatur est qui modi deserunt. Debitis voluptates porro id facere omnis labore ea tenetur. At consequatur a consequatur eum.', 0, '2020-04-23 09:48:39'),
(50, 2, '2020-04-23 09:48:39', 'rerum', 'Aut voluptas quod id sunt inventore minus nemo sed. Accusamus voluptates est in non sapiente eveniet. Illo qui quidem culpa repellendus et nobis et. Tenetur ut numquam doloribus rerum quod odit.', 0, '2020-04-23 09:48:39'),
(51, 3, '2020-04-23 09:48:39', 'ut', 'Enim aliquam excepturi et omnis voluptates. Cum animi dolorem aspernatur temporibus quas sunt rerum. Et sapiente et quis possimus. Eos et blanditiis quis.', 0, '2020-04-23 09:48:39'),
(52, 3, '2020-04-23 09:48:39', 'laudantium', 'Cumque et nesciunt culpa repellendus iure et. Modi sequi qui in et quidem eaque sit. Ab quia ipsam nesciunt minima.', 0, '2020-04-23 09:48:39'),
(53, 3, '2020-04-23 09:48:39', 'accusamus', 'Dolor similique voluptatem ipsam ut. Quis veniam quia laborum sit voluptatem dignissimos. Ducimus enim est esse repellat a voluptas.', 0, '2020-04-23 09:48:39'),
(54, 3, '2020-04-23 09:48:39', 'aut', 'Maiores iusto iste saepe corrupti molestias aut veritatis. Natus error id minus est eveniet quas voluptate. Ipsum minus voluptatem est illo quo. Iste amet vel aspernatur beatae.', 0, '2020-04-23 09:48:39'),
(55, 3, '2020-04-23 09:48:39', 'magni', 'Explicabo maiores explicabo quia fugit assumenda. Sit ut incidunt aliquid beatae voluptates et reiciendis. Quia dignissimos nam ipsum qui itaque impedit. Porro excepturi voluptas accusamus totam rem.', 0, '2020-04-23 09:48:39'),
(56, 3, '2020-04-23 09:48:39', 'quia', 'Voluptas accusantium cum non sunt magni. Officia tenetur velit quia sapiente dignissimos. Eveniet expedita esse enim vitae exercitationem. Aperiam sit aut nisi voluptas quod.', 0, '2020-04-23 09:48:39'),
(57, 3, '2020-04-23 09:48:39', 'dolorum', 'Temporibus recusandae qui facilis repellendus. Sunt temporibus aspernatur quia fugit. Minima dolorem voluptas et maxime. In et non non sequi.', 0, '2020-04-23 09:48:39'),
(58, 3, '2020-04-23 09:48:39', 'voluptatum', 'Repellendus hic labore ea. Et iusto recusandae facere perferendis quis est quos. Dolore labore cumque sunt ab deleniti consequatur.', 0, '2020-04-23 09:48:39'),
(59, 3, '2020-04-23 09:48:39', 'aliquam', 'Ut rem consequuntur tempora adipisci pariatur commodi magni. Beatae dolores et beatae magnam earum doloremque. Ut impedit et est voluptates incidunt.', 0, '2020-04-23 09:48:39'),
(60, 3, '2020-04-23 09:48:39', 'ut', 'Laboriosam qui qui adipisci assumenda occaecati fuga. Architecto voluptatem quas culpa. Cumque molestiae id autem voluptas.', 0, '2020-04-23 09:48:39'),
(61, 3, '2020-04-23 09:48:39', 'delectus', 'Occaecati iusto qui et qui enim. Voluptates nam et a nemo dolore. Laborum in quibusdam officia accusantium nulla.', 0, '2020-04-23 09:48:39'),
(62, 3, '2020-04-23 09:48:39', 'aspernatur', 'Qui quae nihil cupiditate commodi. Est et qui earum veniam nostrum cumque temporibus. Dolorem ducimus quisquam et ab.', 0, '2020-04-23 09:48:39'),
(63, 3, '2020-04-23 09:48:39', 'ex', 'Sapiente magni eum hic reprehenderit voluptatum aut. Numquam est debitis velit rerum. Dolor accusamus modi ea quia ratione voluptas. Aut natus deserunt officia soluta fugit et necessitatibus.', 0, '2020-04-23 09:48:39'),
(64, 3, '2020-04-23 09:48:39', 'sint', 'Voluptatem et et laborum rerum et. Quam saepe officiis architecto quibusdam minus nisi. Dolorum quae eos error. Quos consectetur occaecati tempore cupiditate rerum eligendi.', 0, '2020-04-23 09:48:39'),
(65, 3, '2020-04-23 09:48:39', 'nisi', 'Dignissimos sunt quae vel adipisci velit ipsa. Eveniet reprehenderit impedit vel commodi odit quia. Odio ut est quisquam et illo. Qui a sed at non. Excepturi veniam officiis est optio modi et.', 0, '2020-04-23 09:48:39'),
(66, 3, '2020-04-23 09:48:39', 'ea', 'Distinctio et non exercitationem. Placeat ipsam non iusto in id sint aliquid facere. Ad quod earum neque et alias est.', 0, '2020-04-23 09:48:39'),
(67, 3, '2020-04-23 09:48:39', 'sequi', 'Dignissimos qui vitae et mollitia nam. Illum ut dolorem nihil laudantium quam aspernatur. Aut vero molestiae odio libero incidunt.', 0, '2020-04-23 09:48:39'),
(68, 3, '2020-04-23 09:48:39', 'accusantium', 'Qui libero et voluptatem aliquam distinctio ea doloribus. Aliquam aliquam iure excepturi sit in ut eum voluptatem. Dolorum et dicta aut quod sint nostrum quod.', 0, '2020-04-23 09:48:39'),
(69, 3, '2020-04-23 09:48:39', 'minus', 'Accusantium aut aspernatur qui voluptatum et aut quia. Hic sit est est ducimus qui eaque. Libero maxime ipsa aut aperiam sequi quas quia. Quia alias pariatur doloribus.', 0, '2020-04-23 09:48:39'),
(70, 3, '2020-04-23 09:48:39', 'aliquid', 'Laudantium aut dolor fugiat ut eius similique beatae. At et repudiandae vero illum distinctio. Et corporis cupiditate magnam eum aspernatur. Est in eius iste et quia unde.', 0, '2020-04-23 09:48:39'),
(71, 3, '2020-04-23 09:48:39', 'fuga', 'Voluptatum aut doloribus ipsa impedit voluptatem. Dolorem quia et sequi explicabo. Deleniti est quisquam et voluptate nostrum sit soluta. Qui eligendi fuga incidunt et ipsam sunt et.', 0, '2020-04-23 09:48:39'),
(72, 3, '2020-04-23 09:48:39', 'consequatur', 'Ut molestias nobis architecto magni ratione dolores. Ex rerum ut quidem optio quisquam maiores.', 0, '2020-04-23 09:48:39'),
(73, 3, '2020-04-23 09:48:39', 'blanditiis', 'Qui voluptas quis id asperiores fugiat est dolores. In sunt odio quis voluptatem quia quod. Et officiis quas qui qui molestias et.', 0, '2020-04-23 09:48:39'),
(74, 3, '2020-04-23 09:48:39', 'accusantium', 'Ut quia praesentium dolores recusandae. Architecto suscipit non et placeat ex voluptatum. Est aperiam rerum sint vero. Ut quia et et voluptatem asperiores.', 0, '2020-04-23 09:48:39'),
(75, 3, '2020-04-23 09:48:39', 'quo', 'Commodi debitis molestiae animi et. Occaecati nihil at qui modi sint illo. Quis est nihil eligendi laborum vitae nemo omnis.', 0, '2020-04-23 09:48:39'),
(76, 4, '2020-04-23 09:48:39', 'quaerat', 'Quasi ut maxime officia. Eius et consequatur quis repellat earum quo. Aut vitae tenetur dignissimos provident repudiandae nam ad sed. Non harum incidunt praesentium cupiditate aut repellendus.', 0, '2020-04-23 09:48:39'),
(77, 4, '2020-04-23 09:48:39', 'repellendus', 'Cum sed ratione consequatur unde et itaque. Id voluptas sit non similique eveniet. Impedit ullam nulla dolores aspernatur vitae omnis. Nobis ab doloremque aut voluptates accusantium.', 0, '2020-04-23 09:48:39'),
(78, 4, '2020-04-23 09:48:39', 'culpa', 'Dolores perspiciatis vel amet consequatur ad est et. Qui ducimus culpa hic fuga. Sint autem excepturi praesentium expedita omnis.', 0, '2020-04-23 09:48:39'),
(79, 4, '2020-04-23 09:48:39', 'totam', 'Et vitae qui voluptas exercitationem qui. Aut quidem enim rerum pariatur. Architecto fuga beatae praesentium. Nam natus minima et sint officiis ipsum ab. Aut dolor autem est vitae.', 0, '2020-04-23 09:48:39'),
(80, 4, '2020-04-23 09:48:39', 'repudiandae', 'Qui distinctio aspernatur id numquam. Eum dolores laudantium in qui. At eaque aliquam cumque cupiditate nesciunt deleniti.', 0, '2020-04-23 09:48:39'),
(81, 4, '2020-04-23 09:48:39', 'doloremque', 'Fugit quia et impedit saepe aut fugit. Similique voluptatem quo velit eum iusto. Eius et veniam officia nisi. Minus quod rerum commodi.', 0, '2020-04-23 09:48:39'),
(82, 4, '2020-04-23 09:48:39', 'incidunt', 'Id fugit suscipit voluptas asperiores nulla non deleniti. Et adipisci aliquam molestiae laboriosam a.', 0, '2020-04-23 09:48:39'),
(83, 4, '2020-04-23 09:48:39', 'voluptatem', 'Fugit aut labore iusto et atque id ea aut. Voluptatibus quos laboriosam sit et. Error dolore saepe libero temporibus. Unde inventore voluptatem beatae voluptas ut.', 0, '2020-04-23 09:48:39'),
(84, 4, '2020-04-23 09:48:39', 'velit', 'Et aut temporibus esse ab ea facere ut. Accusamus ratione nihil unde. Beatae corrupti eaque accusantium voluptas dolor blanditiis quaerat. Qui ipsa aut quaerat architecto rerum in sequi voluptatem.', 0, '2020-04-23 09:48:39'),
(85, 4, '2020-04-23 09:48:39', 'quia', 'Eaque est eveniet nesciunt tenetur non qui. Occaecati odio omnis minima itaque. Id nemo rerum at quo dignissimos deserunt eum. Aliquam ipsam vel sequi non quia odio.', 0, '2020-04-23 09:48:39'),
(86, 4, '2020-04-23 09:48:39', 'ratione', 'Odit dolor ea hic possimus natus vel fugit. Itaque veniam doloribus sed architecto quisquam architecto. Exercitationem ut omnis harum voluptatibus tempore voluptas et.', 0, '2020-04-23 09:48:39'),
(87, 4, '2020-04-23 09:48:39', 'odio', 'Consequatur beatae consequuntur at qui. Illo dolorum porro ullam magni.', 0, '2020-04-23 09:48:39'),
(88, 4, '2020-04-23 09:48:39', 'sit', 'Illum eius sunt accusantium ut deserunt culpa. Nulla perferendis est aut sit asperiores. Mollitia vero dolore tempore ut quas totam deserunt. Quos et error architecto aut voluptates et.', 0, '2020-04-23 09:48:39'),
(89, 4, '2020-04-23 09:48:39', 'molestiae', 'Quas est qui dolores veniam. In quidem sit sit doloremque quia impedit. Quaerat earum placeat officiis hic quo. Voluptatem voluptatem quia mollitia vero quas qui recusandae.', 0, '2020-04-23 09:48:39'),
(90, 4, '2020-04-23 09:48:39', 'quibusdam', 'Ea tempora quo id ea soluta. Voluptas non ut deleniti aut. Porro eos hic officiis officia aut sint molestiae. Explicabo quidem nesciunt dolores non aperiam nulla voluptas sit.', 0, '2020-04-23 09:48:39'),
(91, 4, '2020-04-23 09:48:39', 'quo', 'Est aut commodi deleniti. Enim rerum officia dolores blanditiis magnam.', 0, '2020-04-23 09:48:39'),
(92, 4, '2020-04-23 09:48:39', 'occaecati', 'Ex quia quas aliquid reiciendis harum. Quasi tenetur sed sed dicta. Et et quis aut qui. Laborum quidem iste ut quasi optio.', 0, '2020-04-23 09:48:39'),
(93, 4, '2020-04-23 09:48:39', 'optio', 'Eveniet doloremque dicta et quod sunt. Corporis ut non laboriosam facere nemo est ut. Ipsam iure placeat dolore dicta.', 0, '2020-04-23 09:48:39'),
(94, 4, '2020-04-23 09:48:39', 'sint', 'Sunt aut in magni vitae nostrum aut doloremque. Aut sint dignissimos nulla sed eius. Excepturi dolorem doloremque officia non quia earum doloribus a. Ipsum voluptas aliquid vel ducimus quo accusamus.', 0, '2020-04-23 09:48:39'),
(95, 4, '2020-04-23 09:48:39', 'corporis', 'Est explicabo modi fugiat culpa amet suscipit earum ratione. Voluptas eius rerum molestias eos. At sit velit pariatur eum dolores.', 0, '2020-04-23 09:48:39'),
(96, 4, '2020-04-23 09:48:39', 'nisi', 'Rerum possimus voluptates iusto perferendis. Dolores labore ut officiis commodi.', 0, '2020-04-23 09:48:39'),
(97, 4, '2020-04-23 09:48:39', 'odio', 'Deserunt dolorum possimus tenetur aut praesentium dolore. Aut omnis quam sit hic accusamus maiores ex qui. Veritatis odit officiis quia eum et qui enim. Voluptas repellat nisi nesciunt est est ea.', 0, '2020-04-23 09:48:39'),
(98, 4, '2020-04-23 09:48:39', 'quas', 'Maiores sed voluptatem suscipit. Qui velit ad omnis ea dignissimos. Officiis culpa earum magni qui. Molestiae dolor optio commodi.', 0, '2020-04-23 09:48:39'),
(99, 4, '2020-04-23 09:48:39', 'libero', 'Illo accusantium quidem totam id. Cum iusto inventore qui distinctio nam similique. Qui est optio consequatur totam qui unde natus.', 0, '2020-04-23 09:48:39'),
(100, 4, '2020-04-23 09:48:39', 'aliquid', 'Aperiam et dignissimos et quis. Laboriosam voluptate qui omnis enim fuga quasi quisquam. Dolores voluptas sit velit sunt. Non consequatur omnis quia veritatis fugiat at.', 0, '2020-04-23 09:48:39'),
(101, 5, '2020-04-23 09:48:39', 'quos', 'Voluptatem esse pariatur labore voluptatum et hic voluptatum. Nostrum aliquam accusamus alias tempora labore sit.', 0, '2020-04-23 09:48:39'),
(102, 5, '2020-04-23 09:48:39', 'reiciendis', 'Quae dolorem iure voluptas dolor. Sed voluptatem qui blanditiis. Et autem numquam voluptate ut perferendis.', 0, '2020-04-23 09:48:39'),
(103, 5, '2020-04-23 09:48:39', 'ut', 'Voluptas reiciendis voluptatibus nihil. Commodi aut numquam sint laudantium aut. Beatae tenetur animi nemo et maiores.', 0, '2020-04-23 09:48:39'),
(104, 5, '2020-04-23 09:48:39', 'ab', 'Quis commodi quae sit minus odit aut. Ullam pariatur voluptates aut dolores. Quia quae dolor et sequi. Quia ut et esse et id officiis pariatur recusandae.', 0, '2020-04-23 09:48:39'),
(105, 5, '2020-04-23 09:48:39', 'quo', 'Nisi repellendus et suscipit. Aut culpa laudantium rerum totam quam consequatur veniam vitae. Odit numquam eligendi et nisi quae accusantium.', 0, '2020-04-23 09:48:39'),
(106, 5, '2020-04-23 09:48:39', 'minus', 'Rerum iste qui qui qui quibusdam aspernatur. Consequatur architecto saepe et enim id dolores. Assumenda vero quia voluptas debitis ipsam autem.', 0, '2020-04-23 09:48:39'),
(107, 5, '2020-04-23 09:48:39', 'nisi', 'Voluptas sunt sit tempora velit nobis aut. Saepe perferendis repudiandae est reiciendis sint ratione quod ea. Explicabo et vitae et blanditiis et tempore.', 0, '2020-04-23 09:48:39'),
(108, 5, '2020-04-23 09:48:39', 'suscipit', 'Sed quo optio quidem quae temporibus. Vitae rem maiores sint temporibus ea excepturi. Harum dolorem impedit dolor temporibus ducimus.', 0, '2020-04-23 09:48:39'),
(109, 5, '2020-04-23 09:48:39', 'vero', 'Quo provident numquam aut veritatis enim voluptas. Magni dolores molestiae nostrum aut tempore. Accusamus vitae quo et.', 0, '2020-04-23 09:48:39'),
(110, 5, '2020-04-23 09:48:39', 'ipsam', 'Voluptatibus veritatis recusandae voluptatem ut sint. Sequi sed ipsa facilis sit quo. Ut esse ut omnis est non sapiente. Minima ut rerum tenetur vel minus.', 0, '2020-04-23 09:48:39'),
(111, 5, '2020-04-23 09:48:39', 'minima', 'Hic asperiores et et quis voluptatem. Id tempore voluptatem provident esse amet non quos. Dicta omnis quidem tenetur qui qui qui. Tempore expedita ut dolorem assumenda et qui eos sed.', 0, '2020-04-23 09:48:39'),
(112, 5, '2020-04-23 09:48:39', 'et', 'Pariatur sunt distinctio sed et asperiores non in. Nihil odio eius quia assumenda. Culpa iusto voluptatem dicta iste ullam nam.', 0, '2020-04-23 09:48:39'),
(113, 5, '2020-04-23 09:48:39', 'ut', 'Reiciendis et ratione recusandae qui voluptatibus dolor. Accusantium ut animi aut in modi officia repellat. Pariatur fuga est iusto molestiae et voluptas rerum. Est voluptatibus illum eos in vel.', 0, '2020-04-23 09:48:39'),
(114, 5, '2020-04-23 09:48:39', 'recusandae', 'Sed illo laboriosam laudantium. Cumque sint architecto vel tempore quis esse voluptas dolores. Nobis ea nesciunt ipsa sit quia iure.', 0, '2020-04-23 09:48:39'),
(115, 5, '2020-04-23 09:48:39', 'voluptas', 'Rerum eos deserunt tempore quis illo. Animi numquam eos nulla quo nisi odio provident. Pariatur qui voluptate hic esse consequatur. Labore commodi reprehenderit voluptas rerum incidunt eum rem.', 0, '2020-04-23 09:48:39'),
(116, 5, '2020-04-23 09:48:39', 'dignissimos', 'Sunt occaecati id totam et deserunt. Ut maiores quod ex tempore. Sunt nisi dicta sint id iure.', 0, '2020-04-23 09:48:39'),
(117, 5, '2020-04-23 09:48:39', 'nihil', 'Quidem fugiat sint quidem at accusantium nulla laborum. Ut porro quasi quia aliquid nulla. Est accusamus iure fuga ullam sit porro. Accusantium et molestias sit qui vel adipisci quisquam accusamus.', 0, '2020-04-23 09:48:39'),
(118, 5, '2020-04-23 09:48:39', 'quis', 'Qui rerum iure aut porro omnis praesentium. Autem consectetur mollitia tempore aut. Voluptatem et velit et qui. Animi commodi non cum qui et ut.', 0, '2020-04-23 09:48:39'),
(119, 5, '2020-04-23 09:48:39', 'sed', 'Ea qui eius nesciunt amet unde soluta. Pariatur accusamus facilis itaque id sit cumque unde. Dolore unde ullam ipsam dicta modi ex.', 0, '2020-04-23 09:48:39'),
(120, 5, '2020-04-23 09:48:39', 'quia', 'Suscipit et totam qui quod. Iste dolor fugiat est sint vero. Earum sint cupiditate porro cupiditate qui necessitatibus a.', 0, '2020-04-23 09:48:39'),
(121, 5, '2020-04-23 09:48:39', 'aliquam', 'Non deserunt soluta ipsam iure fugit quisquam. Distinctio voluptate sed fugit perferendis magnam veniam.', 0, '2020-04-23 09:48:39'),
(122, 5, '2020-04-23 09:48:39', 'qui', 'Ea quia architecto dicta repellat distinctio sit qui. Excepturi architecto veniam beatae enim dolor sapiente. Sunt autem quisquam esse error aliquam alias ab. Possimus non quia accusamus quam.', 0, '2020-04-23 09:48:39'),
(123, 5, '2020-04-23 09:48:39', 'eum', 'Cupiditate officiis sed placeat nam dolor. Enim et cupiditate asperiores eum officiis. Qui modi aut illum tempora ut. Iure debitis praesentium eum porro saepe.', 0, '2020-04-23 09:48:39'),
(124, 5, '2020-04-23 09:48:39', 'adipisci', 'Quas reiciendis debitis asperiores maxime quia quis voluptas. Est corporis ipsam excepturi reiciendis. Non iusto magni rerum doloribus omnis praesentium non.', 0, '2020-04-23 09:48:39'),
(125, 5, '2020-04-23 09:48:39', 'consequatur', 'Ut dolores provident quod amet in esse a. Repellat non laborum optio inventore iure sed similique mollitia. Animi aut et aliquid rerum excepturi sed fuga.', 0, '2020-04-23 09:48:39'),
(126, 6, '2020-04-23 09:48:39', 'provident', 'Aut qui fugit facere. Qui voluptatem at quod officiis quas veritatis. Autem in voluptatibus quia sed qui.', 0, '2020-04-23 09:48:39'),
(127, 6, '2020-04-23 09:48:39', 'rem', 'Cum cum consequatur iure in ut. Ea accusamus aspernatur incidunt consequatur illum. Architecto provident amet deserunt esse.', 0, '2020-04-23 09:48:39'),
(128, 6, '2020-04-23 09:48:39', 'aliquid', 'Velit et molestiae reiciendis adipisci occaecati at sapiente reprehenderit. Labore similique assumenda porro sed. Quis ab suscipit et veritatis vel.', 0, '2020-04-23 09:48:39'),
(129, 6, '2020-04-23 09:48:39', 'quia', 'Sunt saepe enim soluta nemo. Suscipit quia dolorum minus aut et. Voluptatem temporibus voluptatem omnis corrupti quas ab. Doloremque iste animi ut molestias aut rerum dolore.', 0, '2020-04-23 09:48:39'),
(130, 6, '2020-04-23 09:48:39', 'omnis', 'Est amet exercitationem nihil ex at laborum. Eveniet harum fugiat aut vero iusto. Minus sit eum ratione sapiente.', 0, '2020-04-23 09:48:39'),
(131, 6, '2020-04-23 09:48:39', 'eligendi', 'Perspiciatis aut tempore nihil numquam. Eveniet saepe quae ut ut minima modi. Ut excepturi temporibus tenetur pariatur dolores quisquam.', 0, '2020-04-23 09:48:39'),
(132, 6, '2020-04-23 09:48:39', 'odio', 'Ex cupiditate recusandae vitae. Odio quasi voluptatem sunt voluptatem quia animi sed. Autem beatae aut culpa soluta.', 0, '2020-04-23 09:48:39'),
(133, 6, '2020-04-23 09:48:39', 'aliquam', 'Atque aut ducimus expedita sed ut. Necessitatibus facilis culpa consectetur voluptatum quaerat ipsa dolorem non. In nesciunt ut dicta id qui cumque beatae. Omnis libero sunt in blanditiis.', 0, '2020-04-23 09:48:39'),
(134, 6, '2020-04-23 09:48:39', 'dolores', 'Omnis magnam dolorem minus aut. Voluptate ducimus et vel sapiente voluptatum. Debitis tenetur commodi nulla magnam non repudiandae. Nobis provident temporibus velit.', 0, '2020-04-23 09:48:39'),
(135, 6, '2020-04-23 09:48:39', 'consequuntur', 'Ut veniam ea aut nulla quasi. Magnam eius laboriosam qui quia quia laborum accusantium. Sit dolorum provident qui quis debitis odit est. Asperiores velit voluptas ab sunt quis ratione quia.', 0, '2020-04-23 09:48:39'),
(136, 6, '2020-04-23 09:48:39', 'quaerat', 'Veritatis debitis nemo et deserunt. Ipsum quia maiores non. Quos quas dolorum corrupti maiores.', 0, '2020-04-23 09:48:39'),
(137, 6, '2020-04-23 09:48:39', 'et', 'Consequuntur quis quia pariatur non aliquid est. Tempore quisquam animi iusto quod voluptas voluptatum animi. Sed sed omnis doloremque non veniam optio. Quia quasi et iste facere.', 0, '2020-04-23 09:48:39'),
(138, 6, '2020-04-23 09:48:39', 'distinctio', 'Et non ex architecto quis. Non rerum quasi ipsam aspernatur beatae dolores. Corrupti adipisci labore sunt numquam.', 0, '2020-04-23 09:48:39'),
(139, 6, '2020-04-23 09:48:39', 'ad', 'Modi est quia perferendis. Reiciendis qui minus esse eius. Ab molestiae unde nihil a maxime. Atque et ipsa eaque. Libero rerum cupiditate ea ut non sint. Et totam aut est consequuntur.', 0, '2020-04-23 09:48:39'),
(140, 6, '2020-04-23 09:48:39', 'veniam', 'Iure voluptatum sint itaque est est quasi corporis. Ad enim alias molestias. Rerum cumque praesentium voluptatem culpa vel. Aut sit nam sit asperiores libero omnis sed.', 0, '2020-04-23 09:48:39'),
(141, 6, '2020-04-23 09:48:39', 'occaecati', 'Molestiae sint ullam voluptatibus accusantium dolore neque. Mollitia voluptatem totam nulla pariatur tenetur. Ipsum repellendus inventore maiores.', 0, '2020-04-23 09:48:39'),
(142, 6, '2020-04-23 09:48:39', 'rerum', 'Veritatis et voluptas expedita sunt consequatur. Asperiores illum hic est nemo qui necessitatibus impedit qui. Veniam minus maiores voluptas et accusantium tempora laborum. Eum est velit et vero.', 0, '2020-04-23 09:48:39'),
(143, 6, '2020-04-23 09:48:39', 'qui', 'Non voluptatum id autem eos. Dolor deleniti maxime voluptatum possimus.', 0, '2020-04-23 09:48:39'),
(144, 6, '2020-04-23 09:48:39', 'sapiente', 'Corporis optio veniam id repellat quam quibusdam aut tempore. Adipisci expedita saepe excepturi nisi architecto nam sed. Eaque veniam qui explicabo aspernatur ut.', 0, '2020-04-23 09:48:39'),
(145, 6, '2020-04-23 09:48:39', 'et', 'Ratione illo aperiam sequi voluptates. Aut occaecati natus quis minus omnis. Quas sequi vero voluptatem exercitationem labore aut. Quis et quas aliquid cum quia dolores.', 0, '2020-04-23 09:48:39'),
(146, 6, '2020-04-23 09:48:39', 'dolor', 'Et occaecati ut qui est veritatis numquam est. Quidem et cupiditate doloribus et quae voluptas cum. Modi maiores at eligendi excepturi natus qui ipsum.', 0, '2020-04-23 09:48:39'),
(147, 6, '2020-04-23 09:48:39', 'non', 'Quo consequatur rerum et voluptatem ullam expedita. Aut rem et optio doloremque dolorem. Nostrum quas eum aut sint. Porro illum voluptatibus ratione ipsa enim soluta.', 0, '2020-04-23 09:48:39'),
(148, 6, '2020-04-23 09:48:39', 'consequatur', 'Qui alias consequatur enim voluptates voluptas ducimus id. Et exercitationem magnam enim necessitatibus. Quia ratione quidem a.', 0, '2020-04-23 09:48:39'),
(149, 6, '2020-04-23 09:48:39', 'accusamus', 'Esse vel hic aspernatur. Qui voluptates consequatur ea et sint.', 0, '2020-04-23 09:48:39'),
(150, 6, '2020-04-23 09:48:39', 'veritatis', 'Aliquam qui ea ad vel voluptatum non. Qui velit quia voluptas perferendis. Enim alias qui neque sint.', 0, '2020-04-23 09:48:39'),
(151, 7, '2020-04-23 09:48:39', 'aspernatur', 'Omnis eum quidem ad laboriosam vel. Rerum ut natus quae voluptatem nihil consequatur. Dolorem explicabo corrupti culpa itaque rerum. Quaerat et dolorem iste sit quo totam ipsa ut.', 0, '2020-04-23 09:48:39'),
(152, 7, '2020-04-23 09:48:39', 'sint', 'Velit voluptas non sint quis ipsa nihil. Similique fugit voluptas facere et harum voluptatem dicta. Eum natus dolores et ut voluptas libero. Rem voluptatem nisi quam aperiam ea sed ea.', 0, '2020-04-23 09:48:39'),
(153, 7, '2020-04-23 09:48:39', 'quia', 'Recusandae reiciendis enim cumque ut. Natus animi vitae et sequi minus.', 0, '2020-04-23 09:48:39'),
(154, 7, '2020-04-23 09:48:39', 'voluptas', 'Quis iure tempore accusantium repudiandae. Temporibus accusamus minima ratione voluptas dolores. Qui vitae id debitis sit hic. Dolorum explicabo libero facilis iure.', 0, '2020-04-23 09:48:39'),
(155, 7, '2020-04-23 09:48:39', 'rem', 'Ad et libero eveniet ex repudiandae sed. Libero ut velit dolorum amet et. Quod assumenda ea modi deleniti. Quidem ducimus soluta veniam. Eum aut aut blanditiis non.', 0, '2020-04-23 09:48:39'),
(156, 7, '2020-04-23 09:48:39', 'adipisci', 'Maiores quaerat quidem nihil iure consequatur itaque. Laudantium corrupti id aut sit voluptatem rerum sunt. Voluptas laudantium quia provident rerum impedit voluptas molestias.', 0, '2020-04-23 09:48:39'),
(157, 7, '2020-04-23 09:48:39', 'ducimus', 'Animi blanditiis non ut voluptates laboriosam sit. Debitis consectetur ducimus voluptatem ut delectus. Atque voluptate officiis eveniet velit.', 0, '2020-04-23 09:48:39'),
(158, 7, '2020-04-23 09:48:39', 'ut', 'Quidem quisquam quos nisi veniam. Voluptatem omnis suscipit mollitia ut fugit. Architecto aperiam ex omnis. Omnis blanditiis facilis recusandae hic voluptatibus porro.', 0, '2020-04-23 09:48:39'),
(159, 7, '2020-04-23 09:48:39', 'sed', 'Consequatur consequatur iste ut non. A nihil alias sint necessitatibus voluptates dolorem. Sit et modi sapiente dolorem reprehenderit. Porro laboriosam ea asperiores dolor asperiores culpa autem.', 0, '2020-04-23 09:48:39'),
(160, 7, '2020-04-23 09:48:39', 'tempora', 'Minus ipsum ea dolor incidunt. Consequatur animi in totam dolor aut neque. Dolores fuga voluptatem harum dolorum. Ut veritatis ex mollitia temporibus ullam porro voluptatem.', 0, '2020-04-23 09:48:39'),
(161, 7, '2020-04-23 09:48:39', 'aut', 'Vitae dignissimos consequuntur nulla asperiores facere. Sed iusto autem et nulla cupiditate et praesentium. Earum voluptate nam nihil qui.', 0, '2020-04-23 09:48:39'),
(162, 7, '2020-04-23 09:48:39', 'doloribus', 'Similique aut exercitationem fugiat tempore. Pariatur consequatur ipsa et voluptatum doloremque sit soluta. Tempore ipsa ad molestias atque qui aliquid aut.', 0, '2020-04-23 09:48:39'),
(163, 7, '2020-04-23 09:48:39', 'voluptatum', 'A libero veniam eligendi quos consequatur. Ipsam qui omnis error officiis consequatur voluptate ea. Voluptas repudiandae illum et voluptas quis.', 0, '2020-04-23 09:48:40'),
(164, 7, '2020-04-23 09:48:40', 'et', 'Assumenda qui voluptatem excepturi eum facilis aspernatur quia et. Aut unde nam rerum iure eos explicabo aliquid.', 0, '2020-04-23 09:48:40'),
(165, 7, '2020-04-23 09:48:40', 'dolorum', 'Distinctio soluta rerum ut magni et voluptas et. Reprehenderit amet qui eum ad dolores at mollitia. Sit eos ad ea rerum.', 0, '2020-04-23 09:48:40'),
(166, 7, '2020-04-23 09:48:40', 'ipsa', 'Ratione quis illo itaque et modi aut et. Voluptatem a provident laborum sapiente. Et quae qui veniam consequuntur blanditiis expedita.', 0, '2020-04-23 09:48:40'),
(167, 7, '2020-04-23 09:48:40', 'possimus', 'Quibusdam sed hic molestias voluptate nam officiis optio doloribus. Iusto modi fuga cupiditate magnam. Nisi ea sint eius expedita nemo autem tempora alias.', 0, '2020-04-23 09:48:40'),
(168, 7, '2020-04-23 09:48:40', 'neque', 'Est fugiat eaque rerum ea aliquam. Rerum saepe omnis nisi quidem ab eaque totam. Vel quidem culpa ullam.', 0, '2020-04-23 09:48:40'),
(169, 7, '2020-04-23 09:48:40', 'impedit', 'Non veniam quae hic est corporis enim tempora. Sapiente nam quae consectetur veritatis ducimus. Aliquid et amet non quidem est consectetur eos ut. Ut repellendus impedit itaque neque.', 0, '2020-04-23 09:48:40'),
(170, 7, '2020-04-23 09:48:40', 'commodi', 'Ut ad atque natus deleniti optio eum. Unde cum quos ducimus et hic facilis. Voluptate quasi eligendi earum nam cupiditate nobis. At velit eos est numquam.', 0, '2020-04-23 09:48:40'),
(171, 7, '2020-04-23 09:48:40', 'nulla', 'Illum quaerat iure officia atque. Quia eos eum tempore et nostrum rem quam. Rem sint quibusdam ut voluptatem.', 0, '2020-04-23 09:48:40'),
(172, 7, '2020-04-23 09:48:40', 'ipsa', 'Blanditiis velit distinctio fugit dolorem. Facilis velit voluptates nostrum et nesciunt quas. Sint non eum earum dicta quis quidem.', 0, '2020-04-23 09:48:40'),
(173, 7, '2020-04-23 09:48:40', 'animi', 'Laborum molestias non odio rerum facilis deleniti. Eius magnam quam voluptate odio facere. Sunt voluptatem omnis similique totam.', 0, '2020-04-23 09:48:40'),
(174, 7, '2020-04-23 09:48:40', 'qui', 'Velit eum recusandae eius temporibus ut. Temporibus distinctio exercitationem dolor architecto doloremque et. Qui eum optio aut vel quidem et aut.', 0, '2020-04-23 09:48:40'),
(175, 7, '2020-04-23 09:48:40', 'eaque', 'Assumenda distinctio molestiae rerum qui incidunt laudantium. Excepturi sint tempora sit ipsa eaque. Illum quaerat eum nemo sequi rerum quia fugiat. Rerum qui officia perferendis ex.', 0, '2020-04-23 09:48:40'),
(176, 8, '2020-04-23 09:48:40', 'ut', 'Rerum omnis fugit est est temporibus. Possimus sint quos non perferendis veritatis. Omnis dolores sint quam aliquid et tenetur eos. Minus est eum et est.', 0, '2020-04-23 09:48:40'),
(177, 8, '2020-04-23 09:48:40', 'quidem', 'Nobis illum non quisquam et quae. Totam deserunt in maxime voluptatem doloremque culpa nihil. Voluptatem qui adipisci quo similique.', 0, '2020-04-23 09:48:40'),
(178, 8, '2020-04-23 09:48:40', 'est', 'Veniam sed consectetur perspiciatis inventore et laboriosam totam. Labore corporis incidunt est consequatur qui soluta. Est sed molestias rem unde voluptas.', 0, '2020-04-23 09:48:40'),
(179, 8, '2020-04-23 09:48:40', 'ex', 'Unde nesciunt numquam rerum. Ut aliquam excepturi eveniet et.', 0, '2020-04-23 09:48:40'),
(180, 8, '2020-04-23 09:48:40', 'aliquid', 'Sed magni tempore eum numquam. Assumenda consequuntur ut mollitia quas velit iure. Saepe nulla quae laborum sit. Blanditiis at soluta provident vitae et ullam.', 0, '2020-04-23 09:48:40'),
(181, 8, '2020-04-23 09:48:40', 'est', 'Tempore error consectetur quasi. Ipsam earum et aut non doloremque. Aut ducimus suscipit suscipit vel ut ea ratione.', 0, '2020-04-23 09:48:40'),
(182, 8, '2020-04-23 09:48:40', 'praesentium', 'Qui iusto quo sit repudiandae quaerat voluptates. Illum repellat necessitatibus voluptas voluptas. Quia quisquam ipsa et quaerat.', 0, '2020-04-23 09:48:40'),
(183, 8, '2020-04-23 09:48:40', 'provident', 'Rerum quia sed eos explicabo. Quasi sunt ut dolor velit. Ut aliquam laborum voluptatem eaque omnis magni ipsum.', 0, '2020-04-23 09:48:40'),
(184, 8, '2020-04-23 09:48:40', 'sed', 'Rerum modi possimus praesentium distinctio aut hic. Ut quia asperiores non. Laboriosam molestias et voluptatibus laborum ut.', 0, '2020-04-23 09:48:40'),
(185, 8, '2020-04-23 09:48:40', 'qui', 'Quisquam ipsum a ipsum qui laboriosam. Magni corrupti rem eveniet assumenda voluptatem. Est voluptatem ipsam occaecati nobis facilis. Tempora eligendi magnam similique impedit blanditiis.', 0, '2020-04-23 09:48:40'),
(186, 8, '2020-04-23 09:48:40', 'rerum', 'Molestiae quia voluptate voluptatem omnis accusantium. Excepturi recusandae ipsam qui asperiores omnis vitae. Veritatis ipsam esse qui.', 0, '2020-04-23 09:48:40'),
(187, 8, '2020-04-23 09:48:40', 'nisi', 'Itaque sunt possimus soluta impedit aut. Exercitationem voluptatem est in ducimus. Nobis molestias sint aut doloremque aspernatur explicabo. Corporis pariatur et delectus ea alias nisi dolorem.', 0, '2020-04-23 09:48:40'),
(188, 8, '2020-04-23 09:48:40', 'repudiandae', 'In ab necessitatibus illum et ipsum aliquam deleniti vitae. Ducimus labore et inventore. Atque molestiae sed quasi sint. Id quo qui tempora sed consequatur.', 0, '2020-04-23 09:48:40'),
(189, 8, '2020-04-23 09:48:40', 'nemo', 'Sint doloremque qui veniam ab vel. Consequatur ducimus consequatur est nam. Dolor commodi esse porro dolorum sit velit eos. Ab quasi temporibus ut recusandae et.', 0, '2020-04-23 09:48:40'),
(190, 8, '2020-04-23 09:48:40', 'sit', 'Iste doloremque id aspernatur esse. Nostrum ea est quia illo voluptatibus. Repellat quis sint impedit reprehenderit consectetur non in.', 0, '2020-04-23 09:48:40'),
(191, 8, '2020-04-23 09:48:40', 'voluptas', 'Dolorum consequatur dolore sint qui nemo nemo. Aliquid asperiores et occaecati neque illum. Omnis quam repellat non voluptatibus quod necessitatibus sunt.', 0, '2020-04-23 09:48:40'),
(192, 8, '2020-04-23 09:48:40', 'qui', 'Dignissimos totam fugit porro laborum. Quia praesentium fuga repellat quia earum. Quis culpa sunt velit veritatis.', 0, '2020-04-23 09:48:40'),
(193, 8, '2020-04-23 09:48:40', 'maiores', 'Voluptas ratione rerum quisquam voluptas esse. Enim quisquam voluptas sit neque minus. Ut ipsam voluptatem nam repellendus. Harum rerum eos asperiores vel rerum a harum.', 0, '2020-04-23 09:48:40'),
(194, 8, '2020-04-23 09:48:40', 'tenetur', 'Et numquam aliquam cum rerum quo quia numquam. Libero atque voluptas quibusdam earum. Deleniti eos omnis fugit vel ut eaque.', 0, '2020-04-23 09:48:40'),
(195, 8, '2020-04-23 09:48:40', 'rerum', 'Totam sunt cupiditate et voluptas est qui aut. Adipisci mollitia quaerat repellendus unde velit sint autem. Quo nemo qui aut.', 0, '2020-04-23 09:48:40'),
(196, 8, '2020-04-23 09:48:40', 'qui', 'Ut dolorem sit natus deserunt adipisci. Velit voluptas quia eius similique adipisci eos aut. Rerum mollitia neque autem id. Aut quibusdam omnis non assumenda voluptatem ut nobis.', 0, '2020-04-23 09:48:40'),
(197, 8, '2020-04-23 09:48:40', 'beatae', 'Fuga veniam adipisci qui eveniet. Dolorem dicta earum molestiae qui. Aliquid dolorem sed iure consequuntur architecto facere consectetur voluptatem.', 0, '2020-04-23 09:48:40'),
(198, 8, '2020-04-23 09:48:40', 'fugiat', 'Consectetur sit et voluptatem. Et ut omnis saepe aut. Incidunt mollitia nobis eveniet quasi enim quis autem. Ipsa voluptates quidem fugiat ipsa quis qui debitis.', 0, '2020-04-23 09:48:40'),
(199, 8, '2020-04-23 09:48:40', 'autem', 'Iusto exercitationem qui doloribus non possimus. Expedita in rem perspiciatis quisquam sapiente dolore. Atque architecto dicta odit quia. Nihil et est et.', 0, '2020-04-23 09:48:40'),
(200, 8, '2020-04-23 09:48:40', 'blanditiis', 'Molestiae explicabo tempore enim in quod est nostrum. Cupiditate dolorem blanditiis nam. Iste ut non alias.', 0, '2020-04-23 09:48:40'),
(201, 9, '2020-04-23 09:48:40', 'accusamus', 'Consectetur accusamus fuga animi itaque ut omnis rerum. Id ea accusantium iure beatae neque culpa numquam. Recusandae excepturi aut nisi omnis aliquid quas sunt. Commodi repellat ea omnis ipsam.', 0, '2020-04-23 09:48:40'),
(202, 9, '2020-04-23 09:48:40', 'repellendus', 'Cumque vel vitae est eos. Perspiciatis provident dolor et et assumenda. Recusandae sunt facere eligendi repudiandae delectus assumenda quis. Delectus quo officiis repellat sit voluptatem assumenda.', 0, '2020-04-23 09:48:40'),
(203, 9, '2020-04-23 09:48:40', 'accusamus', 'Magni quae eum quia odit animi quidem. Totam eaque sed earum officiis illum. Non dolorem sunt non ipsum. In quia non animi perferendis qui aut perspiciatis.', 0, '2020-04-23 09:48:40'),
(204, 9, '2020-04-23 09:48:40', 'nobis', 'Ut magnam assumenda porro. Quod dicta animi dolor fugiat repellat deserunt molestias. Magni eos tempore in fugit.', 0, '2020-04-23 09:48:40'),
(205, 9, '2020-04-23 09:48:40', 'nihil', 'Iste sint aut explicabo ratione minima quibusdam. Incidunt et impedit occaecati dolores cum. Ipsam non velit accusamus sed occaecati et. Nisi quis ducimus nostrum laboriosam et voluptas.', 0, '2020-04-23 09:48:40'),
(206, 9, '2020-04-23 09:48:40', 'aliquid', 'Et aperiam asperiores et quia dolore. Consequatur minima culpa eveniet ipsam dolores. Deserunt debitis accusantium aut quod dolores provident ut.', 0, '2020-04-23 09:48:40'),
(207, 9, '2020-04-23 09:48:40', 'omnis', 'Dolorum et excepturi voluptatum similique illo maxime aperiam. Laudantium hic nam est. Repellat nemo aut nemo minima. Esse est mollitia quae sint voluptatem.', 0, '2020-04-23 09:48:40'),
(208, 9, '2020-04-23 09:48:40', 'sint', 'Dolorem praesentium sed vero architecto. Vero laborum hic et aspernatur. Laborum ducimus sed tempora consequatur et.', 0, '2020-04-23 09:48:40'),
(209, 9, '2020-04-23 09:48:40', 'quia', 'Et inventore ea reiciendis quas aspernatur sequi. Ea iure rerum tempore commodi. Quasi eligendi in rem dolorem id omnis.', 0, '2020-04-23 09:48:40'),
(210, 9, '2020-04-23 09:48:40', 'impedit', 'Reiciendis sit sequi accusantium asperiores perferendis. Aliquid nisi ut et quia eligendi.', 0, '2020-04-23 09:48:40'),
(211, 9, '2020-04-23 09:48:40', 'qui', 'Et in temporibus debitis numquam. Ut soluta quis ipsa aspernatur molestiae. Ut sed ut voluptatem.', 0, '2020-04-23 09:48:40'),
(212, 9, '2020-04-23 09:48:40', 'unde', 'Consequatur quae qui vero in nihil debitis praesentium quam. Animi accusamus voluptas sit ea. Commodi incidunt amet consequatur necessitatibus.', 0, '2020-04-23 09:48:40'),
(213, 9, '2020-04-23 09:48:40', 'cum', 'Est hic cumque praesentium placeat consequatur dolorum nostrum. Rem non sunt omnis quibusdam quo. Vel earum inventore minus assumenda.', 0, '2020-04-23 09:48:40'),
(214, 9, '2020-04-23 09:48:40', 'voluptatem', 'Id consequatur aliquam ut explicabo. Et id asperiores cumque explicabo est. Deserunt minima sed necessitatibus beatae dignissimos laudantium. Eos molestias est ab voluptatem.', 0, '2020-04-23 09:48:40'),
(215, 9, '2020-04-23 09:48:40', 'rerum', 'Et corrupti qui ipsam eaque quae dolor. Facilis sunt dolores voluptas numquam totam. Velit earum voluptates quia beatae ut.', 0, '2020-04-23 09:48:40'),
(216, 9, '2020-04-23 09:48:40', 'omnis', 'Ut quis nulla quasi numquam aut consequatur. Repellat culpa est et id aut aut maxime nisi. Unde cupiditate autem consequatur sit ut recusandae enim.', 0, '2020-04-23 09:48:40'),
(217, 9, '2020-04-23 09:48:40', 'velit', 'Quos pariatur voluptas accusantium dignissimos voluptatem. Et praesentium nobis adipisci animi sit. Odit et ex libero nihil expedita dolor.', 0, '2020-04-23 09:48:40'),
(218, 9, '2020-04-23 09:48:40', 'dolor', 'Optio consequatur repellendus quia recusandae aut architecto. Ipsum cum voluptatum suscipit exercitationem nulla labore. Ut debitis qui dicta consequuntur.', 0, '2020-04-23 09:48:40'),
(219, 9, '2020-04-23 09:48:40', 'ipsum', 'Enim tenetur porro nisi tempore hic. Unde ullam velit non qui eos molestiae. Necessitatibus eum accusamus pariatur quibusdam est molestiae tempora.', 0, '2020-04-23 09:48:40'),
(220, 9, '2020-04-23 09:48:40', 'doloribus', 'Dolores minus blanditiis nobis ipsa sequi. Quasi et exercitationem temporibus voluptatem. Ut in veniam saepe nihil.', 0, '2020-04-23 09:48:40'),
(221, 9, '2020-04-23 09:48:40', 'ratione', 'Quae pariatur reiciendis dolor pariatur maxime deserunt nihil. Similique non et labore aspernatur adipisci. In porro saepe est dolor consectetur ipsam.', 0, '2020-04-23 09:48:40'),
(222, 9, '2020-04-23 09:48:40', 'aut', 'Culpa illo natus et excepturi. Pariatur assumenda rerum culpa nemo est id asperiores. Suscipit dignissimos explicabo provident sit optio ut. Voluptates ut qui quia amet.', 0, '2020-04-23 09:48:40'),
(223, 9, '2020-04-23 09:48:40', 'voluptas', 'Voluptatum praesentium qui rerum ipsa odio est. Ad nihil dolorem et possimus quis qui id. Accusamus dicta aperiam non rerum. Temporibus consequatur a nulla iusto voluptas aut.', 0, '2020-04-23 09:48:40'),
(224, 9, '2020-04-23 09:48:40', 'quam', 'Necessitatibus molestiae dignissimos quis voluptas recusandae. Aut omnis molestiae in totam facere tempora. Rerum soluta earum necessitatibus officiis error dignissimos mollitia.', 0, '2020-04-23 09:48:40'),
(225, 9, '2020-04-23 09:48:40', 'natus', 'Rerum eveniet officiis non et eum sed dolor. Voluptas reprehenderit explicabo assumenda ut. Voluptatum vel blanditiis qui vel excepturi qui cumque ut.', 0, '2020-04-23 09:48:40'),
(226, 10, '2020-04-23 09:48:40', 'molestias', 'Ut et vitae qui quasi ea. Perferendis autem rem fugiat dolores qui necessitatibus. Est optio repellat animi ea quis iste laudantium quia. Quam soluta fuga ipsa et.', 0, '2020-04-23 09:48:40'),
(227, 10, '2020-04-23 09:48:40', 'atque', 'Saepe consequatur iure id accusamus magni ea. Quia sed autem libero earum deserunt omnis quae. Quaerat aliquam ea rerum.', 0, '2020-04-23 09:48:40'),
(228, 10, '2020-04-23 09:48:40', 'qui', 'Voluptate et doloribus blanditiis aut dolor esse eligendi. Et ut incidunt ipsam doloribus sit consectetur fuga. Nemo rem repudiandae at quibusdam.', 0, '2020-04-23 09:48:40'),
(229, 10, '2020-04-23 09:48:40', 'aut', 'Qui in veniam enim fuga. Omnis iste sit consequuntur expedita alias adipisci non. Inventore dolor itaque et.', 0, '2020-04-23 09:48:40'),
(230, 10, '2020-04-23 09:48:40', 'officiis', 'Esse laboriosam exercitationem sit est a quis. Explicabo ad consequatur laudantium dolor ut ipsum maxime. Aut quo sapiente impedit magnam.', 0, '2020-04-23 09:48:40'),
(231, 10, '2020-04-23 09:48:40', 'consequatur', 'Excepturi nihil ea harum aut et nam. Exercitationem delectus aut culpa enim molestiae earum. Officiis et et nesciunt nemo aliquam quibusdam pariatur.', 0, '2020-04-23 09:48:40'),
(232, 10, '2020-04-23 09:48:40', 'in', 'Occaecati ut dolorem itaque nihil voluptas minus alias. Dignissimos eos velit dolorem aut. Minima cumque unde voluptatem.', 0, '2020-04-23 09:48:40');
INSERT INTO `task` (`id`, `user_id`, `created_at`, `title`, `content`, `is_done`, `date_is_done`) VALUES
(233, 10, '2020-04-23 09:48:40', 'consequatur', 'Et nesciunt omnis sapiente ipsam vero. Rerum quas ad voluptate facere ad fugit aliquam. Autem suscipit repellat esse iste labore libero.', 0, '2020-04-23 09:48:40'),
(234, 10, '2020-04-23 09:48:40', 'voluptatibus', 'Animi sed facilis alias voluptatem quia. Aut nostrum et non qui ut totam beatae vel. Ipsa harum nihil sit minima et laboriosam.', 0, '2020-04-23 09:48:40'),
(235, 10, '2020-04-23 09:48:40', 'quidem', 'Rerum tempora eius voluptas possimus. Asperiores ut vitae molestiae. Distinctio harum quod fugiat eligendi id quia velit.', 0, '2020-04-23 09:48:40'),
(236, 10, '2020-04-23 09:48:40', 'molestiae', 'Delectus placeat pariatur omnis quia ut voluptates ratione. Quisquam accusamus eius et quaerat qui. Culpa aspernatur corrupti est non laborum. Cum eum est nihil voluptatibus vel.', 0, '2020-04-23 09:48:40'),
(237, 10, '2020-04-23 09:48:40', 'ducimus', 'Incidunt amet eaque eaque sequi. Eum hic ut sint harum odio enim dolor. Optio nesciunt est et fuga.', 0, '2020-04-23 09:48:40'),
(238, 10, '2020-04-23 09:48:40', 'consequatur', 'Fugiat deserunt maiores sit impedit iusto. Rem odit id nulla praesentium soluta quia unde. Id tempora placeat provident.', 0, '2020-04-23 09:48:40'),
(239, 10, '2020-04-23 09:48:40', 'quibusdam', 'Qui delectus ea sed dolorum. Ut vel quia nemo quam laudantium. Nulla nulla velit aut vitae. Sed dolores quo enim ex repellat ad.', 0, '2020-04-23 09:48:40'),
(240, 10, '2020-04-23 09:48:40', 'hic', 'Repellat perferendis eos hic deserunt ut incidunt omnis. Quia exercitationem labore soluta voluptatem qui non. Nemo dolorum dolorem ab nemo rerum optio dolores.', 0, '2020-04-23 09:48:40'),
(241, 10, '2020-04-23 09:48:40', 'qui', 'Blanditiis et itaque impedit voluptatem quis. Et voluptate autem eveniet aut atque optio. Sed beatae laudantium laboriosam repudiandae quaerat et.', 0, '2020-04-23 09:48:40'),
(242, 10, '2020-04-23 09:48:40', 'aut', 'Vero totam est voluptates. Ut eum iure pariatur libero earum rem numquam. Voluptatum eius ut veniam nemo.', 0, '2020-04-23 09:48:40'),
(243, 10, '2020-04-23 09:48:40', 'est', 'Nobis quam optio explicabo voluptatibus doloremque est voluptas. Ipsam eum assumenda eos. Recusandae laboriosam ut illum illo.', 0, '2020-04-23 09:48:40'),
(244, 10, '2020-04-23 09:48:40', 'nisi', 'Et ratione assumenda deleniti eum consequatur velit porro. Sed deleniti debitis fugiat rerum quia omnis. Quis voluptas ad ut ut et minus aspernatur.', 0, '2020-04-23 09:48:40'),
(245, 10, '2020-04-23 09:48:40', 'amet', 'Enim quis aut ut numquam enim nesciunt similique. Ut fuga suscipit blanditiis ipsum voluptas dolores nostrum est. Id vitae ratione rerum aspernatur non tempore. Error qui quae repudiandae.', 0, '2020-04-23 09:48:40'),
(246, 10, '2020-04-23 09:48:40', 'non', 'Nihil voluptas doloremque est iusto et ipsa perferendis. Aut dolores maiores rerum tempora sit nemo cum qui. Dignissimos voluptatem nihil ut placeat nihil quos.', 0, '2020-04-23 09:48:40'),
(247, 10, '2020-04-23 09:48:40', 'praesentium', 'Nostrum asperiores et quis officiis voluptatem maxime est. Qui distinctio dolorem sint tempore necessitatibus. Fugiat earum aut rerum aliquid et placeat.', 0, '2020-04-23 09:48:40'),
(248, 10, '2020-04-23 09:48:40', 'ea', 'Voluptates ipsum est delectus voluptatem accusamus. Dicta voluptatem earum laborum assumenda. Animi asperiores ullam quae in. Rerum provident ut consequatur iste unde.', 0, '2020-04-23 09:48:40'),
(249, 10, '2020-04-23 09:48:40', 'nam', 'Eos aut molestiae asperiores ullam. Sed deleniti nam possimus cum deleniti quas. Molestiae nemo provident doloribus nesciunt.', 0, '2020-04-23 09:48:40'),
(250, 10, '2020-04-23 09:48:40', 'totam', 'Numquam sed ea qui ullam molestias ipsum. Distinctio veritatis excepturi est. Iusto molestiae voluptates recusandae est at aut eum.', 0, '2020-04-23 09:48:40');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `created_at`, `roles`) VALUES
(1, 'username1', '$argon2id$v=19$m=65536,t=4,p=1$L2R1TVdmcGJrdVZTWmlrTw$irVtccYSaH', 'email1@email.fr', '2020-04-23 09:48:37', 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(2, 'username2', '$argon2id$v=19$m=65536,t=4,p=1$SmNYM284aW9pSTIxWlZQLg$dt58ZTriQa', 'email2@email.fr', '2020-04-23 09:48:37', 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(3, 'username3', '$argon2id$v=19$m=65536,t=4,p=1$VHpWWUE0ZUhvQVV1NElGNg$cl8EiLuy9l', 'email3@email.fr', '2020-04-23 09:48:37', 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(4, 'username4', '$argon2id$v=19$m=65536,t=4,p=1$T3dLNXl3dHB3OWcwdUQwRw$ZMMIHuCA7n', 'email4@email.fr', '2020-04-23 09:48:38', 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(5, 'username5', '$argon2id$v=19$m=65536,t=4,p=1$TjRZaWVJc01wdG5ZZE1Gag$+5ZwtOTzf9', 'email5@email.fr', '2020-04-23 09:48:38', 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(6, 'username6', '$argon2id$v=19$m=65536,t=4,p=1$a1JKRHJpUzdWOUpXZ2pXTg$123fifpDpQ', 'email6@email.fr', '2020-04-23 09:48:38', 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(7, 'username7', '$argon2id$v=19$m=65536,t=4,p=1$TFhFREJIQ0x6bzA4eGdDQw$h/BNjTUMnL', 'email7@email.fr', '2020-04-23 09:48:38', 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(8, 'username8', '$argon2id$v=19$m=65536,t=4,p=1$aVpzcFFzVTVZdW80c2xWbQ$Ak2sQ9axmW', 'email8@email.fr', '2020-04-23 09:48:39', 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(9, 'username9', '$argon2id$v=19$m=65536,t=4,p=1$WkRzdmo4TDI2cGRiTnkvTg$9HMzY+CwxJ', 'email9@email.fr', '2020-04-23 09:48:39', 'a:1:{i:0;s:9:\"ROLE_USER\";}'),
(10, 'username10', '$argon2id$v=19$m=65536,t=4,p=1$VjhsUTZtemJLMXo2OFFjRQ$jiFvMYWKu4', 'email10@email.fr', '2020-04-23 09:48:39', 'a:1:{i:0;s:9:\"ROLE_USER\";}');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `FK_527EDB25A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
