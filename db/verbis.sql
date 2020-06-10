-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: localhost    Database: verbis
-- ------------------------------------------------------
-- Server version	8.0.20-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

USE verbis;

--
-- Table structure for table `corrections`
--

DROP TABLE IF EXISTS `corrections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `corrections` (
  `id` int NOT NULL AUTO_INCREMENT,
  `note` varchar(45) NOT NULL,
  `comments` text NOT NULL,
  `isselected` tinyint(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `wording_id` int NOT NULL,
  `person_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_corrections_wordings1_idx` (`wording_id`),
  KEY `fk_corrections_peoples1_idx` (`person_id`),
  CONSTRAINT `fk_corrections_persons1_idx` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_corrections_wordings1_idx` FOREIGN KEY (`wording_id`) REFERENCES `wordings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corrections`
--

LOCK TABLES `corrections` WRITE;
/*!40000 ALTER TABLE `corrections` DISABLE KEYS */;
/*!40000 ALTER TABLE `corrections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institutions`
--

DROP TABLE IF EXISTS `institutions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `institutions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `institution` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institutions`
--

LOCK TABLES `institutions` WRITE;
/*!40000 ALTER TABLE `institutions` DISABLE KEYS */;
INSERT INTO `institutions` VALUES (1,'Escola Estadual Major Sant\'Clair'),(2,'IFNMG - Campus Arinos');
/*!40000 ALTER TABLE `institutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent` int NOT NULL DEFAULT '0',
  `menu` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `ordinance` int NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (9,0,'Redação','#',1,1),(10,0,'Chave','secret',2,1),(11,14,'Usuário','user',1,1),(13,0,'Proposta de Redação','theme',3,1),(14,0,'Configuração','#',5,1),(15,14,'Menu','menu',2,1),(20,14,'Perfil','role',3,1),(21,9,'Corrigir','correction/wordings',1,1),(22,9,'Corrigidas','correction',2,1),(23,0,'Minhas Redações','wording',4,1),(24,9,'Selecionadas','wording/selecteds',3,1);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `user_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_pessoas_users1_idx` (`user_id`),
  CONSTRAINT `fk_person_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persons`
--

LOCK TABLES `persons` WRITE;
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` VALUES (4,'Eude Soares de Lacerda',7),(11,'Maria Flávia Pereira Barbosa',13),(12,'Junia Cleize Gomes Pereira',14),(14,'João Vitor',16),(15,'Adriana Magalhães Farias',17),(16,'Camila Almeida',18),(17,'Ana Carolina Almeida Miranda',19),(18,'Marcus Vinícius Ferreira Souza',20),(19,'Jhonattan',21),(20,'Matheus Henrique',22),(21,'Maria isabel ferreira santos',23),(22,'João Pedro Gonçalves Barbosa',24),(23,'Gustavo Lucas Ribeiro Batista',25),(24,'Isabella',26),(25,'João Lucas Rezende',27),(26,'Gabrielle Pereira da Silva',28),(27,'Jaqueline Pereira',29),(29,'Daisy Maria Rodrigues',31),(30,'Maria Vitória Santana da Silva',32),(31,'wdson mendes',33),(32,'Laura',34),(33,'Samuel Almeida Damaceno',35),(34,'Gleiciane da Silva Mendonça',36),(35,'vitória barcelos valadares',37),(36,'Davi Soares da Mota Machado',38),(37,'Francielly',39),(38,'Vitor Alves Viana ',40);
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Corretor','Privilégios de Corretor, concedidos após a inserção do Administrador.'),(2,'Administrador','Usuário administrativo, tem acesso a tudo.'),(3,'Discente','Aluno com acesso ao sistema.');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_menus`
--

DROP TABLE IF EXISTS `roles_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles_menus` (
  `role_id` int unsigned NOT NULL,
  `menu_id` int NOT NULL,
  PRIMARY KEY (`role_id`,`menu_id`),
  KEY `fk_roles_has_menus_menus1_idx` (`menu_id`),
  KEY `fk_roles_has_menus_roles1_idx` (`role_id`),
  CONSTRAINT `fk_roles_has_menus_menus1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_roles_has_menus_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_menus`
--

LOCK TABLES `roles_menus` WRITE;
/*!40000 ALTER TABLE `roles_menus` DISABLE KEYS */;
INSERT INTO `roles_menus` VALUES (1,9),(2,9),(1,10),(2,10),(2,11),(1,13),(2,13),(2,14),(2,15),(2,20),(1,21),(2,21),(1,22),(2,22),(2,23),(3,23),(1,24),(2,24);
/*!40000 ALTER TABLE `roles_menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_users`
--

DROP TABLE IF EXISTS `roles_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles_users` (
  `user_id` int unsigned NOT NULL,
  `role_id` int unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`),
  CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_users`
--

LOCK TABLES `roles_users` WRITE;
/*!40000 ALTER TABLE `roles_users` DISABLE KEYS */;
INSERT INTO `roles_users` VALUES (13,1),(14,1),(7,2),(16,2),(17,3),(18,3),(19,3),(20,3),(21,3),(22,3),(23,3),(24,3),(25,3),(26,3),(27,3),(28,3),(29,3),(31,3),(32,3),(33,3),(34,3),(35,3),(36,3),(37,3),(38,3),(39,3),(40,3);
/*!40000 ALTER TABLE `roles_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secrets`
--

DROP TABLE IF EXISTS `secrets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `secrets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` varchar(45) NOT NULL,
  `validity` date NOT NULL,
  `quantity` int NOT NULL,
  `institution_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `chave_UNIQUE` (`value`),
  KEY `fk_keys_institutions1_idx` (`institution_id`),
  CONSTRAINT `fk_keys_institutions1` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secrets`
--

LOCK TABLES `secrets` WRITE;
/*!40000 ALTER TABLE `secrets` DISABLE KEYS */;
INSERT INTO `secrets` VALUES (15,'PNM20181113235751','2018-11-30',40,1),(16,'PNM20181113235810','2018-11-30',20,2);
/*!40000 ALTER TABLE `secrets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `serie` varchar(45) NOT NULL,
  `class` varchar(45) NOT NULL,
  `person_id` int NOT NULL,
  `institution_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `people_id_UNIQUE` (`person_id`),
  KEY `fk_students_peoples1_idx` (`person_id`),
  KEY `fk_students_institutions1_idx` (`institution_id`),
  CONSTRAINT `fk_students_institutions1` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_students_persons1` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (6,'3','Agro 2',15,2),(7,'2','Informática I',16,2),(8,'3','Agropecuária 1',17,2),(9,'2','2° Informática ll',18,2),(10,'3','Agropecuária II',19,2),(11,'2','Info 2',20,2),(12,'3','Agropecuária I',21,2),(13,'3','Informática 1',24,2),(14,'3','Meio ambiente ',26,2),(15,'2','Informatica 2',27,2),(17,'2','2° info 1',29,2),(18,'2','2° INFO 1',30,2),(19,'2','Informatica 1',31,2),(20,'2','Informática',33,2),(21,'9','Ouro Preto ',34,1),(22,'9','Ouro Preto ',35,1),(23,'9','Ouro Preto',36,1),(24,'2','2° informática 1',37,2),(25,'9','Ouro Preto ',38,1);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `themes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `theme` varchar(60) NOT NULL,
  `validity` date NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
INSERT INTO `themes` VALUES (5,'CAMINHOS PARA SUPERAR A DESIGUALDADE SOCIAL NO BRASIL','2018-11-30','Proposta especial para a segunda etapa do PAS - UNB.'),(6,'A MATERNIDADE PRECOCE NO BRASIL','2018-11-30','Tema especial para os alunos do 9º ano da Escola Estadual Major Saint´Clair.');
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_tokens`
--

DROP TABLE IF EXISTS `user_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_tokens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `created` int unsigned NOT NULL,
  `expires` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`),
  KEY `expires` (`expires`),
  CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tokens`
--

LOCK TABLES `user_tokens` WRITE;
/*!40000 ALTER TABLE `user_tokens` DISABLE KEYS */;
INSERT INTO `user_tokens` VALUES (32,17,'69f5ded10ba08d0cb2fe9f11b05768b745370def','3f08b4924a7e2fcf2f06be14da846d4d11693ca7',1541009980,1542219580),(33,18,'0ab0c74afa07ebf7b23fb654cf4e1bd7508d71ac','bf5bd185fdb1d9961a36e72e2bdd335702123843',1541010123,1542219723),(34,19,'234b53d23111db5348ad7facf53b6f0996611f30','2d0c8da40537b11c2a71a20aa1391d7369c4d770',1541010382,1542219982),(35,20,'7a60d5b641b646c45a54332d8a3089fe69f66e8b','e10f255610a4e45db59f85bf75af25f79b0b91a4',1541011332,1542220932),(36,21,'48361d084a67b4a3522c0975ed8f0d981cc3e5d2','03f5e8bd50968ff6aa22218be41bb46ae9c434db',1541012317,1542221917),(37,22,'8a6a72918e5344426531de98f9c474e9233efae2','f809a6694148c08ac3bdb24016ecbb3b618b8478',1541013882,1542223482),(38,23,'4878dcdd6f00231805d78726e1e8e571bff58c20','af5c912da47fc096f6cf75028d89d2bbba17c53b',1541014858,1542224458),(39,24,'254a09a2e31c8953bf3e3f08b06de05e12ff127c','3920e115efefb5a4776c068b2089071de84edc1b',1541020958,1542230558),(47,27,'76dff093af4a7c623009e9eebe30c14226bc8914','a58fdcfd0e0b85f632c0b5fd3077adbb3026edff',1541113320,1542322920),(48,28,'df8b5c9d2c4a00d4d9971c1eb33ddce2e941f30c','4f432796b176e041bd4b30b72154d65c9b10faef',1541119390,1542328990),(60,29,'31c6693e81c41576dff5e77d55507780d9f17c29','a3479382b5a0ad3a10accda6d074ef8c172b0be5',1541341966,1542551566),(61,29,'2e897f8a579e8100a18169caf1edc4886dabce4d','0086d00286909620006c0659e033af6150d3b14e',1541342762,1542552362),(66,29,'2e897f8a579e8100a18169caf1edc4886dabce4d','ab4b621464347209348b52f2ad333276ac8f4239',1541443258,1542652858),(70,31,'bb2f1d403dee48ff9de70276bbab013861891fd7','70c9838622147e5c5d2f893c93389d6f50ae48b6',1541760921,1542970521),(71,32,'d84e10b072b4277eaa9e03c3f946f5776227d1e5','7b6f405c185ab75cecbdf00e3a92d2e3a2782a7e',1541894109,1543103709),(73,31,'bb2f1d403dee48ff9de70276bbab013861891fd7','a6e891304a6316147844886524fa4664eff5058f',1542049695,1543259295),(74,26,'8c3ba4e54c80033bb0eb3abd0f7efce05fb2e43a','7b39699c24591e399daea64442876cab4c9d8bd5',1542050391,1543259991),(76,26,'3e5e8837c56d1c461f36b69ba5c72482b60e59c6','a6fa5d3ba27c488f3dbea937746e1fffd50a0741',1542051577,1543261177),(77,34,'166e601c068134758a149e197552ccf7965388b4','638d74e729c52fe4a1da10c82b37ff3d5a1cdeb2',1542062133,1543271733),(78,35,'606595ce0e4d38deb5153db4d62e32fc33618b25','121cd3707f6b371da9c4c26bb8879c9c90f2e258',1542110576,1543320176),(80,16,'1d5980d130391a86a9aa37117b19f555652a7251','9ffca3fb4704d7f56046c44167b2e1c9370fe941',1542160442,1543370042),(81,20,'7a60d5b641b646c45a54332d8a3089fe69f66e8b','fd436a8ea2d64b7361ea8a0a2b822b2840adf1c5',1542205953,1543415553),(82,37,'7fc3c461589d1aad0b8055ade3823f5f92a8a61c','db47def942c81a4ddb067a06e4148acc5776eb4d',1542218661,1543428261),(83,35,'606595ce0e4d38deb5153db4d62e32fc33618b25','b15bccedade67c3c1a07fd297738209e763cd411',1542232031,1543441631),(84,22,'59cac4dd88a7d21e151f6fa41e61a51abfc618f5','669579052e66bd657077b568cfa1dc0c72e9951c',1542304624,1543514224),(85,20,'7a60d5b641b646c45a54332d8a3089fe69f66e8b','821c27016c1d2551c6c9cb925ca430b91ec39549',1542319798,1543529398),(86,35,'606595ce0e4d38deb5153db4d62e32fc33618b25','a06e9ee8438050a4d3fc6cf0fb769025cbede0c4',1542373039,1543582639),(87,29,'2e897f8a579e8100a18169caf1edc4886dabce4d','91c77f2cd9ec8a7b1abec010738685d5ba7ed8e1',1542460382,1543669982),(89,39,'ad8a7f46f6bad5e364010c24883651ab7bdcc6f1','31213a2bc4352e477a7f1fc3fb79ee6c7fc39bd3',1543256025,1544465625),(93,22,'6ab77051bd3d6e3f44ede9388cce7acb1db78edc','ac3907e372bbf6ce2468a6780b4961c67ba4f352',1543429817,1544639417),(95,40,'09f11b865b896102248adea5ce94ccedb8166ac9','c30caff266763fda0484540d317f7f6504030f1d',1543599605,1544809205),(97,22,'e8761e5ab07187c141f9877d6cb4b8b4d14d31f3','4522c470aeeb67feee439278d9fb63af86843d41',1544206865,1545416465),(98,22,'6f7e2c0b2720a430810d747f318e18152df220d3','4587c095026a37322cc7d2dc9622108db0b8551e',1545324497,1546534097),(99,22,'6f7e2c0b2720a430810d747f318e18152df220d3','a2c13fb14ba1526c91e4d2c1066ddf76aedb6adf',1545324939,1546534539),(100,22,'6f7e2c0b2720a430810d747f318e18152df220d3','059a76b0a1da22cc5fdd72e0865a0ea5df2c8342',1546790332,1547999932),(101,22,'e45056ea79a4cc819344f8936af2f7e7aa937a11','2d7b5389990c55f1286bac54d1e75d818890b66d',1546890628,1548100228),(102,22,'e45056ea79a4cc819344f8936af2f7e7aa937a11','b46f268844f278663d278e5ecaea83d714dfa4dc',1548445250,1549654850),(103,22,'6f7e2c0b2720a430810d747f318e18152df220d3','3e3857b63a6a65f750cebd1188d1491f4969473c',1548445285,1549654885),(104,22,'6f17a13af1cc2638fa53211ad072064c1467da80','670cd04131984bbacba050a5c33eaed094602a1b',1551010306,1552219906),(105,16,'76252bfa4b1b146e717beb61bbe37bb1c91de905','0de26c8bc496adc22aa84a9d6aef87217d4f8387',1552856668,1554066268),(106,22,'2b9ec38d3a388e07659997c47ff84ec95e7ef892','6551215d476df2bc72eb1e17abc1d403c9856ad3',1554559959,1555769559);
/*!40000 ALTER TABLE `user_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `logins` int unsigned NOT NULL DEFAULT '0',
  `last_login` int unsigned DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'eude.lacerda@ifnmg.edu.br','eude.lacerda','d46da5ce1e3f08d1c9905e2eda688a004946b4d014e6b5445641d7717a0d6316',66,1589310114,1),(13,'maria.barbosa@ifnmg.edu.br','maria.barbosa','d46da5ce1e3f08d1c9905e2eda688a004946b4d014e6b5445641d7717a0d6316',19,1545419233,1),(14,'junia.pereira@ifnmg.edu.br','junia.pereira','da0926b3a3af1abea28f0f88e2afaff165cca6977d5a7cc060de5508ac2d7a20',0,NULL,1),(16,'joaovictorfariass@gmail.com','joaoVitor123','da0926b3a3af1abea28f0f88e2afaff165cca6977d5a7cc060de5508ac2d7a20',28,1552856668,1),(17,'adriana.magalhaes346@gmail.com','Adriana','fbe2407881d99dde462d35ba44c9cecfe08f807feb2822d7da03bc81e0016dd0',1,1541009980,1),(18,'camilaalmeida140@yahoo.com','Camila Almeida','5e0f32cce94d188c6bdced16552126f373f55732c9d3ef65555765ebad649908',2,1541379471,1),(19,'carolmiranda532@gmail.com','Ana Carol','3a221885e583a4fcbcdb0b73b319f260165b5a00ae6b4ac97858cc0ca59802bc',1,1541010382,1),(20,'marcusviniciusfs124@gmail.com','Marcus Vinícius','f34af578f758207f96d3ef1a78173e2e8b1c645907f7bc2d53400ac510c79e24',3,1542319798,1),(21,'daivid1607@gmail.com','jhonaivid','a090fd732eb2d3aa73453cf0d106a8c9a737a096768ecb67cbfc0f830895597e',2,1541037450,1),(22,'matheush.ifnmg@gmail.com','Matheus H.','6cea794eff2222e202a756bc60ecc2da2067b48422084cfe758211c47f7c244a',34,1554559959,1),(23,'isabhel0105@gmail.com','Maria Isabel','6825c733b0ac344625c362b047a0b3a6a919cbed7e6e9f9ef87db3609a145e6b',1,1541014858,1),(24,'pedropingojoao16@gmail.com','J_pedro','e551ea646a259be9baafe82fad120ddf96f2b33ffb6faa7b7072e1fad0598759',1,1541020958,1),(25,'gustavolrb2008@gmail.com','Gustavo','202845c95ac0d367334c889f53c0481df2dad02cca45ed7d73cf08a039af3329',0,NULL,1),(26,'isabellafonsecag@gmail.com','Isabella Fonseca','7dbbed135b23fdd0d16061e136d075fe2214fe208b06081901644d54d82f5d2e',10,1542215806,1),(27,'lucasrezende1020@gmail.com','jlucasrezende','6e9639100d663b1853749a47992246e1a86a9ad6f45ff82c8274ad576b156ec9',1,1541113320,1),(28,'gabihok.gs@gmail.com','Gabrielle_s','050f8d9e88dc6cc24d97ade1d9bf1787f3a5fe465278ebb48b6cdc6d8cc0eadc',1,1541119390,1),(29,'jaquelineieq123@gmail.com','Jaqueline Pereira','c6400bd6ae5f59d59a509852c90fcf5bc175a0487106768a2a28b9d76ea3899f',7,1542460382,1),(31,'daisymaria762@gmail.com','Daisy Maria','d26457b57469cd6d9e8cc8511960b877599323062af15dd55b078db39df7706d',3,1542234586,1),(32,'santanavitoria422@gmail.com','Maria Vitória ','e8623d7b07bd597cbf489f758b97687b7349dd26de47e762e391da7f7810caf3',3,1542148576,1),(33,'wdson.mendes03@gmail.com','wdson mendes','a6a0ec1e20a1adc3aed477b2b5b15d67d11a1d299893ed7687aac1f717f54535',1,1542046993,1),(34,'lalabrandaomota@gmail.com','Laura','120d2646e2ccda74ab53a730a5365facc674b95ceee00b98f10c417fdc9e36d1',1,1542062133,1),(35,'samueldamaceno141201@gmail.com','Samuel Almeida Damaceno','da0926b3a3af1abea28f0f88e2afaff165cca6977d5a7cc060de5508ac2d7a20',6,1542373039,1),(36,'gleicianehotmail91@gmail.com','Gleiciane Mendonça','070e081e5c52fe0721ab85d0045f90dc3b0f9ec623f6f3f976424025801426c8',2,1542218435,1),(37,'vitoriabarcelos291@gmail.com','Vitoria Barcelos','342f234db10333b4ee522145b2df9ffdc8bbd90e65e8aed7798615bc6d2629cf',1,1542218661,1),(38,'davismota37@gmail.com','davi','0a3255e3c9cccde2d5fe38b0a582bca268c67ca31ee2cd5e2f5c9503cc74a06d',2,1543262131,1),(39,'franciellyrodriguez28@gmail.com','Francielly','524219e00000bb09e658c96f4d3c8a8fb64f59324789888e29d9a34cb3230b50',1,1543256025,1),(40,'vitor.viana400@gmail.com','Vitor Viana','3510f7d6deb4a8346944a0c0ec0b970b1dd841a995ea8624c599d9b4ae975cd8',5,1544272908,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wordings`
--

DROP TABLE IF EXISTS `wordings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wordings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `insertdate` date NOT NULL,
  `iscorrected` tinyint(1) NOT NULL DEFAULT '0',
  `secret_id` int NOT NULL,
  `student_id` int NOT NULL,
  `theme_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_wordings_keys1_idx` (`secret_id`),
  KEY `fk_wordings_students1_idx` (`student_id`),
  KEY `fk_wordings_themes1_idx` (`theme_id`),
  CONSTRAINT `fk_wordings_keys1` FOREIGN KEY (`secret_id`) REFERENCES `secrets` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_wordings_students1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_wordings_themes1` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wordings`
--

LOCK TABLES `wordings` WRITE;
/*!40000 ALTER TABLE `wordings` DISABLE KEYS */;
INSERT INTO `wordings` VALUES (5,'15_11_2018_Matheus_Henrique.pdf','2018-11-15',0,16,11,5),(6,'26_11_2018_Davi_Soares_da_Mota_Machado.pdf','2018-11-26',0,15,23,6),(7,'30_11_2018_Vitor_Alves_Viana_.pdf','2018-11-30',0,15,25,6);
/*!40000 ALTER TABLE `wordings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-12 17:00:46
