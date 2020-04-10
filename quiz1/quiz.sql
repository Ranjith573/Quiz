
--
-- Database: `ranjith`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--
USE naveen;
CREATE TABLE `quiz` (
  `Qno` int(10) NOT NULL,
  `Question` text NOT NULL,
  `Option 1` varchar(20) NOT NULL,
  `Option 2` varchar(20) NOT NULL,
  `Option 3` varchar(20) NOT NULL,
  `Option 4` varchar(20) NOT NULL,
  `ans` varchar(20) NOT NULL,
  `Usr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `quiz` (`Qno`, `Question`, `Option 1`, `Option 2`, `Option 3`, `Option 4`, `ans`, `Usr`) VALUES
(1, 'SQL means?', 'structured query ', 'string query', 'sub query', 'strong query', 'structured query', 'structured query'),
(2, 'what is Apache2?', 'genrics', 'compiler', 'program', 'web server tool', 'web server tool', 'web server tool'),
(3, 'what is php?', 'hypertext preprocess', 'personal page', 'personal home page', 'processor', 'hypertext preprocess', 'hypertext preprocessor'),
(4, 'what is default apache2 directory?', '/var/www', '/www/html', '/html/var', '/var/www/html', '/var/www/html', '/var/www/html'),
(5, 'what is the default page in Apache2?', 'index.html', 'info.html', 'login.html', 'register.html', 'index.html', 'index.html');
