-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sitecreator
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `banimage` varchar(255) DEFAULT NULL,
  `buttomname` varchar(255) DEFAULT NULL,
  `class` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `enterprise_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_banners_business1_idx` (`enterprise_id`),
  CONSTRAINT `fk_banners_business1` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprises` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (5,'Permítenos ir junto a ti hacia el éxito de tus proyectos tecnológicos','b6511c6716ef679eb95c99e1c254b384.jpg','CONÓCELO','active','top',1,'2014-07-31 17:14:49','2014-07-31 17:14:49',NULL);
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `busscomments`
--

DROP TABLE IF EXISTS `busscomments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `busscomments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `commenttype_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_busscomments_users1_idx` (`user_id`),
  KEY `fk_busscomments_comment_types1_idx` (`commenttype_id`),
  CONSTRAINT `fk_busscomments_comment_types1` FOREIGN KEY (`commenttype_id`) REFERENCES `commenttypes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_busscomments_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `busscomments`
--

LOCK TABLES `busscomments` WRITE;
/*!40000 ALTER TABLE `busscomments` DISABLE KEYS */;
/*!40000 ALTER TABLE `busscomments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pagelink` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'ELÉCTRICA','electrics','e6b0','2014-07-29 00:00:00','2014-07-29 20:16:26'),(2,'TELECOMUNICACIONES','telecommunications','e61d','2014-07-29 00:00:00','2014-07-29 20:16:26'),(3,'INTEGRACIONES','integrations','e690','2014-07-29 00:00:00','2014-07-29 20:16:26'),(4,'NETWORKING','networking','e6c1',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `logo` text,
  `description` varchar(700) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (9,'Generic','aeca2249cb7219b04b65a1a6080ae15c.jpg','Lorem ipsum dolor sit amet, omnesque adolescens ut sit. Et nisl ignota instructior vel, ius eu movet paulo ponderum. Mei stet legere ex. Copiosae vulputate sed in, quis case debet duo an. Doming dissentias eam te, quo ne fastidii molestie petentium. Ut prima illum laudem nam, at eos lorem perpetua interpretaris. Eum tollit nonumes id, quo natum habeo te.','2014-07-29 21:16:28','2014-07-29 21:16:28'),(10,'Adams-D\'Amore','2ed507143fba511bef618de1d3dff173.jpg','','2014-07-29 21:16:29','2014-07-29 21:16:29'),(11,'Bechtelar and Sons','eab464c3eeb76c123075294732f01c5f.jpg','','2014-07-29 21:16:29','2014-07-29 21:16:29'),(12,'Dickinson-Schiller','110f7aa66f0315858bee41774e6b5c9d.jpg','','2014-07-29 21:16:30','2014-07-29 21:16:30'),(13,'Greenholt Ltd','323b60b4fd0be6d26680fa390acb9cfb.jpg','','2014-07-29 21:16:31','2014-07-29 21:16:31'),(14,'Ebert-Langosh','a79a4ea15a86bbb6fc35fd8c979867c3.jpg','','2014-07-29 21:16:31','2014-07-29 21:16:31'),(15,'Tromp-Klein','e17d4e3912c24ecac29ad981d5acfa5e.jpg','','2014-07-29 21:16:32','2014-07-29 21:16:32'),(16,'Mosciski, White and Kuvalis','8db0534dcc464bbbf523c9dd04f1c76a.jpg','','2014-07-29 21:16:33','2014-07-29 21:16:33');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commenttypes`
--

DROP TABLE IF EXISTS `commenttypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commenttypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commenttypes`
--

LOCK TABLES `commenttypes` WRITE;
/*!40000 ALTER TABLE `commenttypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `commenttypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `body` text,
  `image` varchar(255) DEFAULT NULL,
  `event_date_from` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `event_date_to` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `contenttype_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contents_clients1_idx` (`client_id`),
  KEY `fk_contents_contenttypes1_idx` (`contenttype_id`),
  KEY `fk_contents_category1_idx` (`category_id`),
  CONSTRAINT `fk_contents_category1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contents_clients1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contents_contenttypes1` FOREIGN KEY (`contenttype_id`) REFERENCES `contenttypes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
INSERT INTO `contents` VALUES (33,'Ut quis enim.','March Hare went \'Sh! sh!\' and the words \'DRINK ME\' beautifully printed on it except a little glass table. \'Now, I\'ll manage better this time,\' she said this, she noticed that they would die. \'The.','360c0eb76c02a590c1db63ff5f56ad1d.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:44','2014-07-29 21:46:44',9,2,2),(34,'Et dolorem non pariatur.','Heads below!\' (a loud crash)--\'Now, who did that?--It was Bill, the Lizard) could not join the dance? \"You can really have no idea what to do that,\' said the Mock Turtle. \'Certainly not!\' said Alice.','/home/vagrant/code/iptelecom/public/img/content/53390a8c966e230248f7d1bf7a13cf4d.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:44','2014-07-29 21:46:44',9,3,1),(35,'Sit incidunt iure.','Duchess was sitting on a branch of a muchness\"--did you ever eat a little wider. \'Come, it\'s pleased so far,\' thought Alice, \'it\'ll never do to hold it. As soon as she could, for her to wink with.','/home/vagrant/code/iptelecom/public/img/content/ac4feeb8cb3d202cb39e26303620050b.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:45','2014-07-29 21:46:45',9,2,1),(36,'At neque ea.','I hate cats and dogs.\' It was high time to avoid shrinking away altogether. \'That WAS a curious appearance in the other. In the very middle of one! There ought to be no chance of this, so she bore.','/home/vagrant/code/iptelecom/public/img/content/f4a14e5cbf666db3d40d0e7eea0fd09e.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:46','2014-07-29 21:46:46',9,3,3),(37,'Asperiores qui sit.','Alice: \'allow me to introduce some other subject of conversation. \'Are you--are you fond--of--of dogs?\' The Mouse did not get hold of its mouth and yawned once or twice, and shook itself. Then it.','/home/vagrant/code/iptelecom/public/img/content/cee0790b8725e9cf5a507b4cd4bf8a13.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:47','2014-07-29 21:46:47',9,3,3),(38,'Sint sapiente aut magnam.','Alice timidly. \'Would you tell me,\' said Alice, \'it\'s very interesting. I never heard before, \'Sure then I\'m here! Digging for apples, indeed!\' said the King replied. Here the Queen was close behind.','/home/vagrant/code/iptelecom/public/img/content/895df5dfa162a8f99bedac0ed3f559ea.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:47','2014-07-29 21:46:47',9,3,3),(39,'Praesentium quo itaque quasi atque.','I to get in at the cook, and a Dodo, a Lory and an Eaglet, and several other curious creatures. Alice led the way, and nothing seems to suit them!\' \'I haven\'t the least notice of her voice. Nobody.','/home/vagrant/code/iptelecom/public/img/content/7a6a7164e6d8780125fc1a56e87f2761.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:48','2014-07-29 21:46:48',9,1,2),(40,'Odit id et.','Duchess by this time, as it happens; and if it wasn\'t trouble enough hatching the eggs,\' said the cook. \'Treacle,\' said a whiting before.\' \'I can see you\'re trying to find that the Queen was close.','/home/vagrant/code/iptelecom/public/img/content/727d39a7a55bcee96a93159fce4b2d97.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:49','2014-07-29 21:46:49',9,3,3),(41,'Ut qui est quaerat ea.','He was looking at everything about her, to pass away the moment she quite forgot how to spell \'stupid,\' and that makes the matter worse. You MUST have meant some mischief, or else you\'d have signed.','/home/vagrant/code/iptelecom/public/img/content/ec411150ef7d31635643434889111998.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:49','2014-07-29 21:46:49',9,3,3),(42,'Nemo doloribus.','Why, it fills the whole window!\' \'Sure, it does, yer honour: but it\'s an arm for all that.\' \'With extras?\' asked the Mock Turtle is.\' \'It\'s the thing Mock Turtle is.\' \'It\'s the first really clever.','/home/vagrant/code/iptelecom/public/img/content/06dc64584760407af460f481306604d1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:50','2014-07-29 21:46:50',9,2,1),(43,'Aliquid consequuntur sint.','I should think very likely it can be,\' said the Queen. \'I never heard before, \'Sure then I\'m here! Digging for apples, yer honour!\' \'Digging for apples, yer honour!\' (He pronounced it \'arrum.\') \'An.','/home/vagrant/code/iptelecom/public/img/content/85b6102ed04cd4bbe650b4107e36655a.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:51','2014-07-29 21:46:51',9,1,3),(44,'Sit ea est.','I give you fair warning,\' shouted the Queen, who was peeping anxiously into her face. \'Wake up, Alice dear!\' said her sister; \'Why, what are they made of?\' \'Pepper, mostly,\' said the Hatter went on,.','/home/vagrant/code/iptelecom/public/img/content/efea99e94e00a252979eb82330e9d283.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:51','2014-07-29 21:46:51',9,3,2),(45,'Quia tempore sed eos.','Queen. An invitation from the change: and Alice heard the King said to Alice. \'Only a thimble,\' said Alice more boldly: \'you know you\'re growing too.\' \'Yes, but some crumbs must have a trial: For.','/home/vagrant/code/iptelecom/public/img/content/55494e7f09871a16f5551a7eacdd987d.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:52','2014-07-29 21:46:52',9,2,1),(46,'Modi vel laudantium.','QUITE as much as she went nearer to watch them, and considered a little three-legged table, all made of solid glass; there was silence for some minutes. The Caterpillar and Alice was soon submitted.','/home/vagrant/code/iptelecom/public/img/content/2ca83b639d4752d99790e90cf74b6598.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:53','2014-07-29 21:46:53',9,1,2),(47,'Eaque et optio.','Majesty,\' said the Caterpillar. Alice said to the confused clamour of the sense, and the two sides of the day; and this was of very little use, as it is.\' \'Then you shouldn\'t talk,\' said the Queen..','/home/vagrant/code/iptelecom/public/img/content/647c72b67888bfbb3129f6c82f765449.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:53','2014-07-29 21:46:53',9,2,1),(48,'Quaerat expedita sunt et.','Caterpillar. Alice said to live. \'I\'ve seen hatters before,\' she said to the porpoise, \"Keep back, please: we don\'t want to stay with it as a partner!\' cried the Mock Turtle sang this, very slowly.','/home/vagrant/code/iptelecom/public/img/content/04525f0224f57a9ce513e2a8180e5c75.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:54','2014-07-29 21:46:54',9,1,2),(49,'Soluta numquam ducimus velit.','I think--\' (she was rather glad there WAS no one to listen to her, And mentioned me to him: She gave me a good deal frightened at the Queen, and Alice joined the procession, wondering very much.','/home/vagrant/code/iptelecom/public/img/content/40d0b5edd837e7ef28077c8cf7b3a6cc.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:55','2014-07-29 21:46:55',9,2,1),(50,'Tenetur dolores.','I only wish they COULD! I\'m sure she\'s the best way to hear it say, as it happens; and if I know I have none, Why, I wouldn\'t be so kind,\' Alice replied, rather shyly, \'I--I hardly know, sir, just.','/home/vagrant/code/iptelecom/public/img/content/2dfda09cfc87a06945b72e97a551840b.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:55','2014-07-29 21:46:55',9,2,1),(51,'Hic eos.','I can\'t take LESS,\' said the Duchess, as she could not think of nothing else to do, so Alice soon came upon a low voice. \'Not at first, but, after watching it a minute or two sobs choked his voice..','/home/vagrant/code/iptelecom/public/img/content/851c039133d17b9d517104d374ae3523.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:56','2014-07-29 21:46:56',9,3,1),(52,'Sunt ut.','I shall remember it in with a bound into the roof of the wood--(she considered him to you, Though they were trying which word sounded best. Some of the Lobster; I heard him declare, \"You have baked.','/home/vagrant/code/iptelecom/public/img/content/6e36da041e5f50ced3098c9e3a4630ff.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:57','2014-07-29 21:46:57',9,1,3),(53,'Sunt beatae unde autem.','I\'m not used to do:-- \'How doth the little--\"\' and she told her sister, as well as if nothing had happened. \'How am I to get out again. That\'s all.\' \'Thank you,\' said Alice, seriously, \'I\'ll have.','/home/vagrant/code/iptelecom/public/img/content/b55ed1ba9738776d0c01ffa5b29df118.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:58','2014-07-29 21:46:58',9,1,3),(54,'Magni accusamus recusandae vero.','Let me see--how IS it to be lost: away went Alice like the wind, and was going to say,\' said the Dodo. Then they both sat silent for a minute or two sobs choked his voice. \'Same as if nothing had.','59c221421a1cee79f1e087ca4dab1754.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:58','2014-07-29 21:46:58',9,2,2),(55,'Illum illo.','Alice had learnt several things of this sort in her pocket) till she was peering about anxiously among the trees as well as if it please your Majesty!\' the Duchess began in a loud, indignant voice,.','/home/vagrant/code/iptelecom/public/img/content/797ae21595a8c472413eb59d56280914.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:46:59','2014-07-29 21:46:59',9,1,2),(56,'Consequuntur optio corrupti id.','I think I should be like then?\' And she went on in the last few minutes, and she was quite pleased to have the experiment tried. \'Very true,\' said the youth, \'and your jaws are too weak For anything.','/home/vagrant/code/iptelecom/public/img/content/f6bd3dca8680241957263ac4f19f9175.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:47:00','2014-07-29 21:47:00',9,3,2),(57,'Asperiores eos est.','March Hare said in a sulky tone, as it can be,\' said the Caterpillar. Here was another puzzling question; and as Alice could see it trying in a day or two: wouldn\'t it be of very little way off, and.','/home/vagrant/code/iptelecom/public/img/content/ac253647fbe88b4208ecc87a1d88f60f.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:47:01','2014-07-29 21:47:01',9,1,3),(58,'Dicta suscipit odit accusamus corrupti.','SHE HAD THIS FIT--\" you never to lose YOUR temper!\' \'Hold your tongue!\' added the Dormouse. \'Don\'t talk nonsense,\' said Alice to herself. Imagine her surprise, when the Rabbit came up to the Queen,.','90f2acf42d961e48c23eda37929980c9.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:47:02','2014-07-29 21:47:02',9,1,1),(59,'Eum dolore libero.','Pat, what\'s that in some alarm. This time there could be NO mistake about it: it was in such long ringlets, and mine doesn\'t go in at all?\' said the King; \'and don\'t be particular--Here, Bill! catch.','/home/vagrant/code/iptelecom/public/img/content/98af7c7958dcb4e2c46831fea46a2793.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:47:02','2014-07-29 21:47:02',9,3,3),(60,'Aut mollitia in corrupti.','I don\'t keep the same year for such dainties would not give all else for two reasons. First, because I\'m on the Duchess\'s knee, while plates and dishes crashed around it--once more the pig-baby was.','/home/vagrant/code/iptelecom/public/img/content/3668e274756d28cf941ccbbac56e5e5a.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:47:03','2014-07-29 21:47:03',9,1,2),(61,'Sed explicabo qui voluptatem.','Alice to find herself still in existence; \'and now for the next moment a shower of little pebbles came rattling in at the time they had at the bottom of a tree in front of them, with her head!\'.','080b437d8984b227ee9948f1d5f5a6c4.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:47:04','2014-07-29 21:47:04',9,2,2),(62,'Voluptatum sequi rerum.','Queen. \'Never!\' said the Caterpillar. \'Is that the hedgehog a blow with its head, it WOULD twist itself round and look up in a large ring, with the bread-and-butter getting so far off). \'Oh, my poor.','/home/vagrant/code/iptelecom/public/img/content/8f2afe9e8653a74bc3e5c714e9c2a1d5.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 21:47:05','2014-07-29 21:47:05',9,3,1),(64,'veamos','Lorem ipsum dolor sit amet, unum altera audiam et pro. Per oblique fuisset eligendi cu, ad etiam essent minimum sea. Id mei referrentur neglegentur, ne vivendo delicatissimi pri. Has principes dissentiunt at. Exerci sanctus ei sit, audiam vivendo perfecto no mel, ad nam delenit scribentur.\r\n\r\nDuo luptatum prodesset id, diceret debitis similique duo ea. Vix populo tibique referrentur an. Tota maiorum volumus pri id, vivendo assueverit vel ne. Error labitur no duo, iudico tempor aliquip cum at. Te omittam adolescens qui. Eum dicit scaevola aliquando eu, tota saepe ut ius.\r\n\r\nNonumes legendos assueverit ea vel, dicit graeco ut vel, quas laudem ea quo. Quot vocent integre id mel. Munere luptatum vim te. Ut vim dico eros denique, elitr suavitate persecuti eam id, te deserunt senserit salutandi eos. Aeque perfecto te pri, eros inciderint no his, eum agam tempor reprimique id. Eius nihil atomorum pri cu, sea ei audire menandri qualisque, mutat dicam laboramus pri no.\r\n\r\nEsse putent expetenda ex per, an amet ignota causae per. Nec ex accumsan mnesarchum, cum te luptatum adipiscing, quando vidisse at nec. Quod corrumpit has ei, commodo abhorreant nam te. Inimicus postulant philosophia sed an, aliquid equidem omnesque ad per, est ei viris omittantur. Pro eu timeam tractatos accommodare.','360c0eb76c02a590c1db63ff5f56ad1d.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-08-15 01:10:18','2014-08-15 01:10:18',9,1,1),(65,'Titulazo','<p></p><div>Lorem ipsum dolor sit amet, mel perfecto argumentum disputando et, ad ullum antiopam per, primis constituto ius ei. Brute iudico ei mea, mei recusabo indoctum explicari ex. Illud altera prodesset ei est, etiam debitis ei sit. Percipit perpetua an has, ei vim scripta repudiare deterruisset. Ei soleat eleifend pertinacia mea, sea recteque ocurreret in. Vivendo recusabo pro et, nam nullam consectetuer et, ea novum malorum dissentiet sit. Velit nostrud volutpat vix ne, eos dicunt blandit eleifend ad.</div><p><span class=\"f-img-wrap\"><img alt=\"Image title\" src=\"http://i.froala.com/images/54d2a784ee8b2f916d6be548cc0d716416de379b.png?1408476736\" width=\"177\" style=\"min-width: 16px; min-height: 16px; margin: 10px 0px;\"></span></p><p></p><p></p><div>Diam ipsum probatus sed an. Id sed suscipit definiebas, per ei suscipit periculis complectitur. Quot omnis vel an. Est sint soluta ut, qui ei iudico perfecto, at eam novum corpora. At mundi sonet cum, equidem placerat vis id.</div><p><span style=\"line-height: 20.8px;\">Sanctus invidunt persecuti ex eum, id pri sale comprehensam. Dicant impetus discere eam ex, vel velit partem indoctum ut. Cum soluta sanctus et. Magna deseruisse cum eu, at prodesset disputando usu. Dolore officiis persequeris id usu.</span><br></p><p><span class=\"f-img-wrap\"><img alt=\"Image title\" src=\"http://i.froala.com/images/1e558ce24113283f6130c127680eb06ce8c69f71.jpg?1408476771\" width=\"154\" style=\"min-width: 16px; min-height: 16px; margin: 10px 0px;\"></span></p><p></p><div>Ut enim nulla nam, no mea fugit dissentias necessitatibus. Ut clita dissentiet qui, autem malis accusamus ea ius. Qui etiam elitr civibus ei, ea sed tollit postulant conclusionemque, cum ei eius interpretaris. Usu an verear dissentiunt, in duo lorem constituto. Mea te euismod expetenda evertitur, affert imperdiet pri eu. Ut usu summo nihil lobortis, mel laudem scaevola percipitur ea, sea purto legere praesent in.</div><p><span style=\"line-height: 20.799999237060547px;\">Labores pertinax facilisis ei per, velit habemus tacimates in cum. Te primis detracto senserit mea. Dicunt feugiat has ea. At habeo munere mei, nostro deserunt reprehendunt in mei, his mentitum temporibus ut. Pro ea dicat dicant omnium, quot qualisque posidonium usu ei, probo aperiri an ne</span><br></p><p></p>','360c0eb76c02a590c1db63ff5f56ad1d.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-08-19 19:14:35','2014-08-19 19:14:35',9,1,1),(66,'SERVICIO LEGÍTIMO','<p><div style=\"text-align: justify;\">Lorem ipsum dolor sit amet, mel perfecto argumentum disputando et, ad ullum antiopam per, primis constituto ius ei. Brute iudico ei mea, mei recusabo indoctum explicari ex. Illud altera prodesset ei est, etiam debitis ei sit. Percipit perpetua an has, ei vim scripta repudiare deterruisset. Ei soleat eleifend pertinacia mea, sea recteque ocurreret in. Vivendo recusabo pro et, nam nullam consectetuer et, ea novum malorum dissentiet sit. Velit nostrud volutpat vix ne, eos dicunt blandit eleifend ad.</div><p><span class=\"f-img-wrap\"><img alt=\"Image title\" src=\"http://iptelecom.dev:8000/img/content/edition/p0IeIbcCie_face1.jpg\" width=\"300\" style=\"min-width: 16px; min-height: 16px; margin-bottom: 10px; margin-left: auto; margin-right: auto; margin-top: 10px\"></span></p><p></p><div>Diam ipsum probatus sed an. Id sed suscipit definiebas, per ei suscipit periculis complectitur. Quot omnis vel an. Est sint soluta ut, qui ei iudico perfecto, at eam novum corpora. At mundi sonet cum, equidem placerat vis id.</div><p><span style=\"line-height: 20.8px;\">Sanctus invidunt persecuti ex eum, id pri sale comprehensam. Dicant impetus discere eam ex, vel velit partem indoctum ut. Cum soluta sanctus et. Magna deseruisse cum eu, at prodesset disputando usu. Dolore officiis persequeris id usu.</span><br></p><p></p><div>Ut enim nulla nam, no mea fugit dissentias necessitatibus. Ut clita dissentiet qui, autem malis accusamus ea ius. Qui etiam elitr civibus ei, ea sed tollit postulant conclusionemque, cum ei eius interpretaris. Usu an verear dissentiunt, in duo lorem constituto. Mea te euismod expetenda evertitur, affert imperdiet pri eu. Ut usu summo nihil lobortis, mel laudem scaevola percipitur ea, sea purto legere praesent in.</div><p><span class=\"f-img-wrap\"><img alt=\"Image title\" src=\"http://iptelecom.dev:8000/img/content/edition/LFtqcWZPiP_face4.jpg\" width=\"300\" style=\"min-width: 16px; min-height: 16px; margin-bottom: 10px; margin-left: auto; margin-right: auto; margin-top: 10px\"></span></p><p></p><div>Labores pertinax facilisis ei per, velit habemus tacimates in cum. Te primis detracto senserit mea. Dicunt feugiat has ea. At habeo munere mei, nostro deserunt reprehendunt in mei, his mentitum temporibus ut. Pro ea dicat dicant omnium, quot qualisque posidonium usu ei, probo aperiri an nec.</div><br></p>','360c0eb76c02a590c1db63ff5f56ad1d.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-08-19 20:38:33','2014-08-19 20:38:33',9,3,1),(67,'nuevo upload','<p><br></p><div>Lorem ipsum dolor sit amet, mel perfecto argumentum disputando et, ad ullum antiopam per, primis constituto ius ei. Brute iudico ei mea, mei recusabo indoctum explicari ex. Illud altera prodesset ei est, etiam debitis ei sit. Percipit perpetua an has, ei vim scripta repudiare deterruisset. Ei soleat eleifend pertinacia mea, sea recteque ocurreret in. Vivendo recusabo pro et, nam nullam consectetuer et, ea novum malorum dissentiet sit. Velit nostrud volutpat vix ne, eos dicunt blandit eleifend ad.</div><p><br></p><div>Diam ipsum probatus sed an. Id sed suscipit definiebas, per ei suscipit periculis complectitur. Quot omnis vel an. Est sint soluta ut, qui ei iudico perfecto, at eam novum corpora. At mundi sonet cum, equidem placerat vis id.</div><p><span class=\"f-img-wrap\" style=\"text-align: center;\"><img alt=\"Image title\" src=\"http://iptelecom.dev:8000/img/content/edition/QcfExBT5lz_face4.jpg\" width=\"300\" style=\"min-width: 16px; min-height: 16px; margin: 10px 0px; float: none;\"></span></p><p><br></p><p><br></p><div>Sanctus invidunt persecuti ex eum, id pri sale comprehensam. Dicant impetus discere eam ex, vel velit partem indoctum ut. Cum soluta sanctus et. Magna deseruisse cum eu, at prodesset disputando usu. Dolore officiis persequeris id usu.</div><p><br></p><div>Ut enim nulla nam, no mea fugit dissentias necessitatibus. Ut clita dissentiet qui, autem malis accusamus ea ius. Qui etiam elitr civibus ei, ea sed tollit postulant conclusionemque, cum ei eius interpretaris. Usu an verear dissentiunt, in duo lorem constituto. Mea te euismod expetenda evertitur, affert imperdiet pri eu. Ut usu summo nihil lobortis, mel laudem scaevola percipitur ea, sea purto legere praesent in.</div><p><span class=\"f-img-wrap\"><img alt=\"Image title\" src=\"http://iptelecom.dev:8000/img/content/edition/Qo08j0RSDi_desktop.png\" width=\"300\" style=\"min-width: 16px; min-height: 16px; margin-bottom: 10px; margin-left: auto; margin-right: auto; margin-top: 10px\"></span></p><p><br></p><p><br></p><div>Labores pertinax facilisis ei per, velit habemus tacimates in cum. Te primis detracto senserit mea. Dicunt feugiat has ea. At habeo munere mei, nostro deserunt reprehendunt in mei, his mentitum temporibus ut. Pro ea dicat dicant omnium, quot qualisque posidonium usu ei, probo aperiri an nec.</div><p><br></p>',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00','2014-08-19 20:58:27','2014-08-19 20:58:27',9,2,1);
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenttypes`
--

DROP TABLE IF EXISTS `contenttypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contenttypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `pagelink` varchar(255) NOT NULL,
  `setashome` tinyint(1) DEFAULT NULL,
  `order` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `menustate` varchar(255) NOT NULL,
  `menuitem` tinyint(1) NOT NULL,
  `marketitem` tinyint(1) NOT NULL,
  `footeritem` tinyint(1) NOT NULL,
  `categorize` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenttypes`
--

LOCK TABLES `contenttypes` WRITE;
/*!40000 ALTER TABLE `contenttypes` DISABLE KEYS */;
INSERT INTO `contenttypes` VALUES (1,'PRODUCTOS Y SERVICIOS','productos_servicios',0,'2','cogs','',1,1,1,1,'2014-07-29 00:00:00','2014-07-29 20:08:37'),(2,'PORTAFOLIO','portfafolio',0,'3','briefcase','',1,1,1,1,'2014-07-29 00:00:00','2014-07-29 20:08:37'),(3,'HISTORIAS DE ÉXITO','successstories',0,'','trophy','',0,1,1,0,'2014-07-29 00:00:00','2014-07-29 20:08:37'),(4,'HOME','home',0,'1','home','active',1,0,0,0,NULL,NULL),(5,'ACERCA DE','acercade',1,'4','institution','',0,0,0,0,NULL,NULL);
/*!40000 ALTER TABLE `contenttypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enterprises`
--

DROP TABLE IF EXISTS `enterprises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enterprises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `salesemail` varchar(45) DEFAULT NULL,
  `twitter` varchar(45) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `celphone` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `testimonialsintro` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enterprises`
--

LOCK TABLES `enterprises` WRITE;
/*!40000 ALTER TABLE `enterprises` DISABLE KEYS */;
INSERT INTO `enterprises` VALUES (1,'IP TELECOM','logo_ipt.png','2401855','randrade@iptelec.com','randrade@iptelec.com','','','','www.iptelec.com','0989115030','Los Ciclames E1167 y Los Guabos','Nuestros Clientes han confiado en nuestro trabajo.. Ha sido magnífico trabajar con ellos...','2014-07-29 00:00:00','2014-07-29 19:49:01');
/*!40000 ALTER TABLE `enterprises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imageresources`
--

DROP TABLE IF EXISTS `imageresources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imageresources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imageable_id` int(10) unsigned NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imageresources`
--

LOCK TABLES `imageresources` WRITE;
/*!40000 ALTER TABLE `imageresources` DISABLE KEYS */;
INSERT INTO `imageresources` VALUES (1,'/saleables/details/icons/detailicon-35-RGj1sNt0dWB9X1Ez.png',35,'App\\Saleabledetail','2015-03-09 22:56:39','2015-03-10 21:05:08'),(2,'/saleables/details/icons/detailicon-42-ETCFGmi6tybPXtPy.png',42,'App\\Saleabledetail','2015-03-10 19:30:44','2015-03-10 19:30:44'),(3,'/saleables/details/icons/detailicon-45-LS5JtHT1EcZdKjPi.png',45,'App\\Saleabledetail','2015-03-10 21:12:54','2015-03-10 21:12:54'),(4,'/saleables/details/icons/detailicon-47-xl3upJPEFI0emo75.png',47,'App\\Saleabledetail','2015-04-16 21:58:33','2015-04-16 21:58:33'),(5,'/saleables/details/icons/detailicon-48-02OYx7qYLWMdwvDw.png',48,'App\\Saleabledetail','2015-04-16 21:59:13','2015-04-16 21:59:13'),(6,'/saleables/details/icons/detailicon-53-Dafb1Lfb97A7c0xC.png',53,'App\\Saleabledetail','2015-04-20 22:12:37','2015-04-20 22:12:37'),(7,'/saleables/details/icons/detailicon-54-5NYRy4hDFkgqsDvn.png',54,'App\\Saleabledetail','2015-04-20 22:25:39','2015-04-20 22:25:39'),(8,'/saleables/details/icons/detailicon-55-wAOfQKlhEd615OgU.png',55,'App\\Saleabledetail','2015-04-20 22:26:14','2015-04-20 22:26:14'),(9,'/saleables/details/icons/detailicon-56-REF1F1T1VSIteknj.png',56,'App\\Saleabledetail','2015-04-20 22:26:52','2015-04-20 22:26:52'),(10,'/saleables/details/icons/detailicon-57-7HnHHI6WsfZc1QTV.png',57,'App\\Saleabledetail','2015-05-08 21:39:10','2015-05-08 21:39:10'),(11,'/saleables/details/icons/detailicon-58-wJM8uuf0JQNDd3G3.png',58,'App\\Saleabledetail','2015-05-08 21:41:53','2015-05-08 21:41:53'),(12,'/saleables/details/icons/detailicon-59-TOJwvqN9mOfpXWYf.png',59,'App\\Saleabledetail','2015-05-08 21:46:55','2015-05-08 21:46:55'),(13,'/saleables/details/icons/detailicon-60-dY5GK9HrVbfFsNaX.png',60,'App\\Saleabledetail','2015-05-08 21:47:05','2015-05-08 21:47:05'),(14,'/saleables/details/icons/detailicon-61-7Rny9nCVhaKX2Nu7.png',61,'App\\Saleabledetail','2015-05-08 21:47:12','2015-05-08 21:47:12'),(15,'/saleables/details/icons/detailicon-62-IX6yeL5m0pclbfBd.png',62,'App\\Saleabledetail','2015-05-08 22:25:24','2015-05-08 22:25:24'),(16,'/saleables/details/icons/detailicon-63-OS4qJt4mJPjIJRFr.png',63,'App\\Saleabledetail','2015-05-08 22:25:33','2015-05-08 22:25:33'),(17,'/saleables/details/icons/detailicon-64-5QwewQqS5R8DO1Rm.png',64,'App\\Saleabledetail','2015-05-08 22:25:43','2015-05-08 22:25:43');
/*!40000 ALTER TABLE `imageresources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `cellular` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `client` varchar(255) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `inquiry` text,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lead_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leads`
--

LOCK TABLES `leads` WRITE;
/*!40000 ALTER TABLE `leads` DISABLE KEYS */;
INSERT INTO `leads` VALUES (1,'juan','2444444',NULL,'jfrand011@hotmail.com','yo',NULL,'texto',1,'2014-08-04 19:02:23','2014-08-04 19:02:23',NULL),(2,'juan','2444444',NULL,'jfandradea@gmail.com','',NULL,'',1,'2014-08-04 20:26:15','2014-08-04 20:26:15',NULL),(3,'juan','2444444',NULL,'jfrand011@hotmail.com','',NULL,'dsxdsxdsxsd',1,'2014-08-04 20:30:11','2014-08-04 20:30:11',NULL),(4,'juan','6666676',NULL,'jfandradea@gmail.com','',NULL,'',1,'2014-08-04 20:32:33','2014-08-04 20:32:33',NULL),(5,'juan','2444444',NULL,'jfandradea@gmail.com','',NULL,'',1,'2014-08-05 00:17:32','2014-08-05 00:17:32',NULL),(6,'juan','2444444',NULL,'jfandradea@gmail.com','',NULL,'',1,'2014-08-05 00:19:52','2014-08-05 00:19:52',NULL),(7,'juan','2444444',NULL,'jfandradea@gmail.com','',NULL,'',1,'2014-08-05 00:25:01','2014-08-05 00:25:01',NULL),(8,'juan','2444444',NULL,'jfandradea@gmail.com','',NULL,'',1,'2014-08-05 00:27:29','2014-08-05 00:27:29',NULL),(9,'juan','0968741465',NULL,'jfrand011@hotmail.com','ACME CIA. LTDA.',NULL,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, ',1,'2014-08-05 00:44:55','2014-08-05 00:44:55',NULL),(10,'juan','2444444',NULL,'jfrand011@hotmail.com','ACME CIA. LTDA.',NULL,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, ',1,'2014-08-05 00:47:47','2014-08-05 00:47:47',NULL),(11,'juan','2444444',NULL,'jfrand011@hotmail.com','ACME CIA. LTDA.',NULL,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, ',1,'2014-08-05 00:51:27','2014-08-05 00:51:27',NULL),(12,'juan','telf',NULL,'jfandradea@gmail.com','acme',NULL,'consulta',1,'2014-08-05 21:56:05','2014-08-05 21:56:05',NULL),(13,'cdcdsc','ccdscdscds',NULL,'jfandradea@gmail.com','csdcdsc',NULL,'cdcsc',1,'2014-08-05 22:34:49','2014-08-05 22:34:49',NULL),(14,'bfgb','gbgfbgfb',NULL,'jfandradea@gmail.com','fbgfbfgbgfb',NULL,'gbgfbfg',1,'2014-08-05 22:39:16','2014-08-05 22:39:16',NULL),(15,'bfgbvgb','vddv',NULL,'jfandradea@gmail.com','gfvfgvgfvf',NULL,'fdvfdvfd',1,'2014-08-05 22:40:42','2014-08-05 22:40:42',NULL),(16,'bfgbvgb','vfvdfv',NULL,'jfandradea@gmail.com','gfvfgvgfvf',NULL,'fdvfdvfdvfd',1,'2014-08-05 22:42:07','2014-08-05 22:42:07',NULL),(17,'bfgbvgb','cfdc',NULL,'jfandradea@gmail.com','gfvfgvgfvf',NULL,'dfcdcfd',1,'2014-08-05 22:46:13','2014-08-05 22:46:13',NULL),(18,'ht','hythtyht',NULL,'htyhtyh','ttytbtb',NULL,'ythh',1,'2014-08-05 23:20:58','2014-08-05 23:20:58',NULL),(19,'bgv','vdffdvdfvdfvfd',NULL,'jfandradea@gmail.com','fgbgfbb',NULL,'vdfvdfv',1,'2014-08-06 00:00:33','2014-08-06 00:00:33',NULL),(20,'juan','2444444',NULL,'jfandradea@gmail.com','jfa',NULL,'consultation',1,'2014-08-06 00:03:31','2014-08-06 00:03:31',NULL),(21,'Juan','2444444',NULL,'jfandradea@gmail.com','',NULL,' s sdxsdxdsxdsxds',1,'2014-08-06 00:46:51','2014-08-06 00:46:51',NULL),(22,'juan','2444444',NULL,'jfandradea@gmail.com','jknjknk',NULL,'nknlknlknklnnl\r\njknjnjknjknjkn',1,'2014-08-06 01:15:57','2014-08-06 01:15:57',NULL),(23,'juan','2444444',NULL,'jfrand011@hotmail.com','acme',NULL,'vfvdfvfdvfdv',1,'2014-08-07 03:06:13','2014-08-07 03:06:13',NULL),(24,'juan','2444444',NULL,'jfrand011@hotmail.com','ACME CIA. LTDA.',NULL,'consulta',1,'2014-08-07 03:07:05','2014-08-07 03:07:05',NULL),(25,'juan','0968741465',NULL,'jfandradea@gmail.com','ACME CIA. LTDA.',NULL,'ferfrefrferfref',1,'2014-08-07 03:10:18','2014-08-07 03:10:18',NULL),(26,'juan','2444444',NULL,'jfandradea@gmail.com','ACME CIA. LTDA.',NULL,'cfcfcccfcd',1,'2014-08-11 21:03:26','2014-08-11 21:03:26',NULL),(27,'juan','2444444',NULL,'jfandradea@gmail.com','ACME CIA. LTDA.',NULL,'cfcfcccfcd',1,'2014-08-11 21:03:57','2014-08-11 21:03:57',NULL),(28,'juan','2444444',NULL,'jfandradea@gmail.com','ACME CIA. LTDA.',NULL,'cfcfcccfcd',1,'2014-08-11 21:04:23','2014-08-11 21:04:23',NULL),(29,'juanf','2444444',NULL,'jfrand011@hotmail.com','acme',NULL,'derderdece',1,'2014-08-11 21:23:11','2014-08-11 21:23:11',NULL),(30,'juan','23434343',NULL,'jfandradea@gmail.com','acmera',NULL,'34343434',1,'2014-08-11 21:25:38','2014-08-11 21:25:38',NULL),(31,'juan','2444444',NULL,'jfandradea@gmail.com','ACME CIA. LTDA.',NULL,'cececedxdcf',1,'2014-08-11 22:03:25','2014-08-11 22:03:25',NULL),(32,'juan','2444444',NULL,'jfandradea@gmail.com','ACME CIA. LTDA.',NULL,'cececedxdcf',1,'2014-08-11 22:03:51','2014-08-11 22:03:51',NULL),(33,'juan','2444444',NULL,'jfandradea@gmail.com','ACME CIA. LTDA.',NULL,'vfecfecfedce',1,'2014-08-11 22:19:36','2014-08-11 22:19:36',NULL),(34,'juan','3333333',NULL,'jfandradea@gmail.com','ACME CIA. LTDA.',NULL,'33333333',1,'2014-08-11 22:22:21','2014-08-11 22:22:21',NULL),(35,'juan','2444444',NULL,'jfandradea@gmail.com','ACME CIA. LTDA.',NULL,'dexdcecdxdscdscsds',1,'2014-08-19 22:31:42','2014-08-19 22:31:42',NULL),(36,'Juan Pedro','02666666','09999999','jfandradea@gmail.com',NULL,NULL,'Lorem ipsum dolor sit amet, feugiat copiosae oporteat ne duo, etiam doctus duo cu, in nam elit alterum principes. At sed melius oportere accommodare, mel ne graece audire lucilius. Prima eligendi eum ad, eu his solum quaerendum. Has labitur suscipit constituto et, id eam tale persius ocurreret.\r\n\r\nFacete vulputate vel ne. Bonorum blandit intellegat mei cu, eum eu eirmod tractatos efficiantur, an has affert consetetur. Labore appareat eam ad, eam ne brute salutatus mnesarchum, eleifend intellegam pro te. Malis expetenda ex per, cu autem lucilius forensibus sit. Ex eum scaevola dissentiunt, enim omittantur definitionem an nec. Ea movet omnesque percipitur nam, consequat consetetur ne his.',0,'2015-04-22 22:12:48','2015-04-22 22:12:48',79),(37,'Juan Pedro','02666666','09999999','jfandradea@gmail.com',NULL,NULL,'Lorem ipsum dolor sit amet, feugiat copiosae oporteat ne duo, etiam doctus duo cu, in nam elit alterum principes. At sed melius oportere accommodare, mel ne graece audire lucilius. Prima eligendi eum ad, eu his solum quaerendum. Has labitur suscipit constituto et, id eam tale persius ocurreret.\r\n\r\nFacete vulputate vel ne. Bonorum blandit intellegat mei cu, eum eu eirmod tractatos efficiantur, an has affert consetetur. Labore appareat eam ad, eam ne brute salutatus mnesarchum, eleifend intellegam pro te. Malis expetenda ex per, cu autem lucilius forensibus sit. Ex eum scaevola dissentiunt, enim omittantur definitionem an nec. Ea movet omnesque percipitur nam, consequat consetetur ne his.',0,'2015-04-22 22:37:00','2015-04-22 22:37:00',79),(38,'Juan Pedro','02666666','09999999','jfandradea@gmail.com',NULL,NULL,'Lorem ipsum dolor sit amet, feugiat copiosae oporteat ne duo, etiam doctus duo cu, in nam elit alterum principes. At sed melius oportere accommodare, mel ne graece audire lucilius. Prima eligendi eum ad, eu his solum quaerendum. Has labitur suscipit constituto et, id eam tale persius ocurreret.\r\n\r\nFacete vulputate vel ne. Bonorum blandit intellegat mei cu, eum eu eirmod tractatos efficiantur, an has affert consetetur. Labore appareat eam ad, eam ne brute salutatus mnesarchum, eleifend intellegam pro te. Malis expetenda ex per, cu autem lucilius forensibus sit. Ex eum scaevola dissentiunt, enim omittantur definitionem an nec. Ea movet omnesque percipitur nam, consequat consetetur ne his.',0,'2015-04-23 00:31:09','2015-04-23 00:31:09',79),(39,'Juan Pedro','02666666','09999999','jfandradea@gmail.com',NULL,NULL,'Lorem ipsum dolor sit amet, feugiat copiosae oporteat ne duo, etiam doctus duo cu, in nam elit alterum principes. At sed melius oportere accommodare, mel ne graece audire lucilius. Prima eligendi eum ad, eu his solum quaerendum. Has labitur suscipit constituto et, id eam tale persius ocurreret.\r\n\r\nFacete vulputate vel ne. Bonorum blandit intellegat mei cu, eum eu eirmod tractatos efficiantur, an has affert consetetur. Labore appareat eam ad, eam ne brute salutatus mnesarchum, eleifend intellegam pro te. Malis expetenda ex per, cu autem lucilius forensibus sit. Ex eum scaevola dissentiunt, enim omittantur definitionem an nec. Ea movet omnesque percipitur nam, consequat consetetur ne his.',0,'2015-04-23 00:34:47','2015-04-23 00:34:47',79),(40,'Juan Pedro','02666666','09999999','jfandradea@gmail.com',NULL,NULL,'flash-success-message',0,'2015-04-23 00:43:54','2015-04-23 00:43:54',79),(41,'Juan Pedro','02666666','09999999','jfandradea@gmail.com',NULL,NULL,'flash-success-message',0,'2015-04-23 00:45:09','2015-04-23 00:45:09',79),(42,'Juan Pedro','02666666','09999999','jfandradea@gmail.com',NULL,NULL,'success-message-title',0,'2015-04-23 00:46:26','2015-04-23 00:46:26',79),(43,'Juan Pedro','02666666','09999999','jfandradea@gmail.com',NULL,NULL,'success-message-title',0,'2015-04-23 00:48:13','2015-04-23 00:48:13',79),(44,'Juan Pedro','02666666','09999999','jfandradea@gmail.com',NULL,NULL,'sweetAlert({\r\n	title: \"Oops!\", \r\n    text: \"Something went wrong on the page!\", \r\n    type: \"error\"\r\n});',0,'2015-04-23 00:59:58','2015-04-23 00:59:58',79),(45,'Juan Pedro','02666666','0','jfandradea@gmail.com',NULL,NULL,'sweetAlert({\r\n                title: \"Oops! Por favor corrije los siguientes errores\",\r\n                text: $(\"#errorsSet\").html(),\r\n                type: \"error\",\r\n                html:true\r\n            });',0,'2015-04-23 01:06:39','2015-04-23 01:06:39',79),(46,'juanfff','02666666','09999999','jfandradea@gmail.com',NULL,NULL,'jacaranda',0,'2015-04-23 02:43:46','2015-04-23 02:43:46',79),(47,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:02:28','2015-04-24 03:02:28',79),(48,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:05:20','2015-04-24 03:05:20',79),(49,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:08:11','2015-04-24 03:08:11',79),(50,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:11:29','2015-04-24 03:11:29',79),(51,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:16:54','2015-04-24 03:16:54',79),(52,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:17:11','2015-04-24 03:17:11',79),(53,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:17:45','2015-04-24 03:17:45',79),(54,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:18:14','2015-04-24 03:18:14',79),(55,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:30:23','2015-04-24 03:30:23',79),(56,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:32:01','2015-04-24 03:32:01',79),(57,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:35:14','2015-04-24 03:35:14',79),(58,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:40:00','2015-04-24 03:40:00',79),(59,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:42:11','2015-04-24 03:42:11',79),(60,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:44:36','2015-04-24 03:44:36',79),(61,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:44:43','2015-04-24 03:44:43',79),(62,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:47:28','2015-04-24 03:47:28',79),(63,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:48:47','2015-04-24 03:48:47',79),(64,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:49:30','2015-04-24 03:49:30',79),(65,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:51:52','2015-04-24 03:51:52',79),(66,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:52:19','2015-04-24 03:52:19',79),(67,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:53:45','2015-04-24 03:53:45',79),(68,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:54:04','2015-04-24 03:54:04',79),(69,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:54:40','2015-04-24 03:54:40',79),(70,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:55:25','2015-04-24 03:55:25',79),(71,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:55:54','2015-04-24 03:55:54',79),(72,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:56:07','2015-04-24 03:56:07',79),(73,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:56:35','2015-04-24 03:56:35',79),(74,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:57:28','2015-04-24 03:57:28',79),(75,'Juan Pedro','02666666','09999999','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 03:59:08','2015-04-24 03:59:08',79),(76,'Juan Pedro','02666666','09999999','jfandradea@gmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 04:02:00','2015-04-24 04:02:00',79),(77,'Juan Pedro  Pablo','8888888','434545435','jfrand011@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 04:04:38','2015-04-24 04:04:38',79),(78,'Judas tadeo','02666666','09999999','jsoi@gmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 21:19:04','2015-04-24 21:19:04',79),(79,'estefania alvarez','02666666','09999999','efalv@gmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 21:21:26','2015-04-24 21:21:26',79),(80,'julio jaramillo','02666666','09999999','jjaramillo@hotmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 21:24:52','2015-04-24 21:24:52',79),(81,'julieta venegas','02666666','09999999','julita@julia.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 22:37:30','2015-04-24 22:37:30',79),(82,'Juan Pedro','02666666','09999999','jfandradea@gmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 22:44:58','2015-04-24 22:44:58',79),(83,'llorona','02666666','09999999','jfandradea@gmail.com',NULL,NULL,'paceOptions = {\r\n        ajax: {\r\n            trackMethods: [\'GET\', \'POST\']\r\n        }\r\n    };',0,'2015-04-24 22:55:45','2015-04-24 22:55:45',79),(84,'julieta venegas ju','02666666','09999999','jsoi@gmail.com',NULL,NULL,'paceOptions = {\r\n        ajax: {\r\n            trackMethods: [\'GET\', \'POST\']\r\n        }\r\n    };',0,'2015-04-24 23:05:13','2015-04-24 23:05:13',79),(85,'polka dot','02666666','09999999','jfandradea@gmail.com',NULL,NULL,'Adhuc malis disputando sed et, equidem assueverit persequeris eu mea. Facete luptatum no sit, cibo putent evertitur cu his, dolore erroribus te qui. Eu veri commune per. Et sumo cetero nam.',0,'2015-04-24 23:26:20','2015-04-24 23:26:20',79),(86,'kayla jujuy','02666666','09999999','kjujuy@gmail.com',NULL,NULL,'lorem',0,'2015-04-27 22:34:18','2015-04-27 22:34:18',79),(87,'kayla jujuy 2','02666666','09999999','kjujuy@gmail.com',NULL,NULL,'LOREN',0,'2015-04-27 22:37:06','2015-04-27 22:37:06',79),(88,'cuyconpapas','02666666','09999999','cuyypapas@gmail.com',NULL,NULL,'Lorem ipsum dolor sit amet, perpetua persecuti at quo, putant molestie cu sit. Sed fabulas electram democritum id, esse graeco per no. Et mea populo definitionem, melius laoreet percipit mea te. Vim te mundi tantas voluptaria. Decore apeirian constituam nam te.\r\n\r\nEum aliquid principes ut, ius mentitum perpetua delicatissimi eu, id vocent iudicabit nam. In veniam dicunt menandri mel. Ea pri illud philosophia, harum maiorum posidonium eam eu. Qui veritus dolores cu. Inermis conceptam te vis, eam vivendo commune consulatu cu.',0,'2015-04-29 23:16:08','2015-04-29 23:16:08',88),(89,'cuyconpapas','02666666','09999999','cuyypapas@gmail.com',NULL,NULL,'Lorem ipsum dolor sit amet, perpetua persecuti at quo, putant molestie cu sit. Sed fabulas electram democritum id, esse graeco per no. Et mea populo definitionem, melius laoreet percipit mea te. Vim te mundi tantas voluptaria. Decore apeirian constituam nam te.\r\n\r\nEum aliquid principes ut, ius mentitum perpetua delicatissimi eu, id vocent iudicabit nam. In veniam dicunt menandri mel. Ea pri illud philosophia, harum maiorum posidonium eam eu. Qui veritus dolores cu. Inermis conceptam te vis, eam vivendo commune consulatu cu.',0,'2015-04-29 23:47:32','2015-04-29 23:47:32',88),(90,'yof','09989877','09887678','yof@gmail.com',NULL,NULL,'algo',0,'2015-05-01 20:09:06','2015-05-01 20:09:06',87),(91,'cdcdd','8787878','7878787','yof@gmail.com',NULL,NULL,'algog',0,'2015-05-01 20:09:39','2015-05-01 20:09:39',87),(92,'yof2','09989877','09887678','yof@gmail.com',NULL,NULL,'algo',0,'2015-05-01 20:12:33','2015-05-01 20:12:33',87),(93,'llumi','09989877','09887678','llumi@gmail.com',NULL,NULL,'llumi',0,'2015-05-01 22:26:59','2015-05-01 22:26:59',88),(94,'jaime','09989877','09887678','jaimw@hoy.com',NULL,NULL,'joy',0,'2015-05-01 22:28:08','2015-05-01 22:28:08',87),(95,'Pedro navaja','089798797','098','jfandradea@gmail.com',NULL,NULL,'en la esquina del viejo barrio...',0,'2015-05-05 21:29:29','2015-05-05 21:29:29',88),(96,'jaime','8787878','09887678','jfandradea@gmail.com',NULL,NULL,'nunuy',0,'2015-05-05 21:59:12','2015-05-05 21:59:12',88),(97,'jaime','8787878','09887678','jfandradea@gmail.com',NULL,NULL,'nunuy',0,'2015-05-05 22:07:53','2015-05-05 22:07:53',88),(98,'jaime','8787878','09887678','jfandradea@gmail.com',NULL,NULL,'nunuy',0,'2015-05-05 22:08:21','2015-05-05 22:08:21',88),(99,'juan','09989877','09887678','llumi@gmail.com',NULL,NULL,'contact',0,'2015-05-05 22:18:24','2015-05-05 22:18:24',88),(100,'juan manuel','09989877','09887678','pedrcarlos@soldados.com',NULL,NULL,'Lorem ipsum dolor sit amet, patrioque assueverit eloquentiam qui in, duo in diceret verterem repudiandae. Ceteros mediocrem honestatis ea vim, saperet euripidis mei in. Esse mnesarchum inciderint usu ex, ad has ullum blandit. Cu mea aliquid tractatos. Quodsi nostrum an quo, eum eius possim scaevola ut.\r\n\r\nSolum animal appareat te per, duo ei adipisci tractatos dissentiet. Vix sale aperiri rationibus an, pri error mucius ex. Apeirian voluptatum \r\ntheophrastus eam ei, ne sed laudem similique. Mea ea quod choro ancillae, congue consul salutatus no usu, efficiantur concludaturque ex nec. \r\n\r\nEu simul soluta corpora quo, in has epicurei recteque. Te eam melius ullamcorper.\r\n',0,'2015-05-05 22:24:45','2015-05-05 22:24:45',88),(101,'juan manuel','09989877','09887678','jfandradea@gmail.com',NULL,NULL,'nada',0,'2015-05-05 22:34:59','2015-05-05 22:34:59',88),(102,'juan manuel','09989877','09887678','jfandradea@gmail.com',NULL,NULL,'Lorem ipsum dolor sit amet, patrioque assueverit eloquentiam qui in, duo in diceret verterem repudiandae. Ceteros mediocrem honestatis ea vim, saperet euripidis mei in. Esse mnesarchum inciderint usu ex, ad has ullum blandit. Cu mea aliquid tractatos. Quodsi nostrum an quo, eum eius possim scaevola ut.\r\n\r\nSolum animal appareat te per, duo ei adipisci tractatos dissentiet. Vix sale aperiri rationibus an, pri error mucius ex. Apeirian voluptatum theophrastus eam ei, ne sed laudem similique. Mea ea quod choro ancillae, congue consul salutatus no usu, efficiantur concludaturque ex nec. Eu simul soluta corpora quo, in has epicurei recteque. Te eam melius ullamcorper.\r\n',0,'2015-05-05 22:36:17','2015-05-05 22:36:17',88),(103,'juan manuel','09989877','09887678','jfandradea@gmail.com',NULL,NULL,'Lorem ipsum dolor sit amet, patrioque assueverit eloquentiam qui in, duo in diceret verterem repudiandae. Ceteros mediocrem honestatis ea vim, saperet euripidis mei in. Esse mnesarchum inciderint usu ex, ad has ullum blandit. Cu mea aliquid tractatos. Quodsi nostrum an quo, eum eius possim scaevola ut.\r\n\r\nSolum animal appareat te per, duo ei adipisci tractatos dissentiet. Vix sale aperiri rationibus an, pri error mucius ex. Apeirian voluptatum theophrastus eam ei, ne sed laudem similique. Mea ea quod choro ancillae, congue consul salutatus no usu, efficiantur concludaturque ex nec. Eu simul soluta corpora quo, in has epicurei recteque. Te eam melius ullamcorper.\r\n',0,'2015-05-05 22:38:00','2015-05-05 22:38:00',88),(104,'Pedro el escamozo','09989877','09887678','jfandradea@gmail.com',NULL,NULL,'Lorem ipsum dolor sit amet, ius nihil civibus rationibus eu, eirmod aeterno consequat nam id, no ridens causae indoctum ius. Quis paulo an has, eum ex lorem cotidieque. Nonumy iisque scribentur duo ut, vidit quaestio evertitur duo ad, mea at porro eligendi. Te legimus luptatum forensibus eos, ludus graece et mei.\r\n\r\nAt vis dicat mucius, qui ne dicant delectus. Alia facete delicata eum an. Nec ex quaestio interesset delicatissimi, sea eu paulo veritus. Nulla recteque sea et, ex his soleat elaboraret. Audire intellegat at quo.',0,'2015-05-08 20:44:17','2015-05-08 20:44:17',88);
/*!40000 ALTER TABLE `leads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logos`
--

DROP TABLE IF EXISTS `logos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(256) DEFAULT NULL,
  `imageable_id` int(11) DEFAULT NULL,
  `imageable_type` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logos`
--

LOCK TABLES `logos` WRITE;
/*!40000 ALTER TABLE `logos` DISABLE KEYS */;
INSERT INTO `logos` VALUES (1,'/members/logos/logo-75-K6xqImcqNZ9VrLfB.png',15,'App\\Profile','2015-02-19 21:18:52','2015-02-19 19:18:32'),(2,'/members/logos/logo-76-SvldAwmuWEs1D88W.png',16,'App\\Profile','2015-02-19 21:26:22','2015-02-19 21:26:22'),(3,'/members/logos/logo-79-6KeCLsgWJkF507TU.png',18,'App\\Profile','2015-04-15 00:28:37','2015-04-15 00:28:37'),(4,'/members/logos/logo-88-UgFdAonkJ3Qelw5m.png',23,'App\\Profile','2015-05-13 00:18:18','2015-05-12 23:01:29');
/*!40000 ALTER TABLE `logos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marketingchunks`
--

DROP TABLE IF EXISTS `marketingchunks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marketingchunks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contenttype_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_marketingchunks_content_types1_idx` (`contenttype_id`),
  CONSTRAINT `fk_marketingchunks_content_types1` FOREIGN KEY (`contenttype_id`) REFERENCES `contenttypes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marketingchunks`
--

LOCK TABLES `marketingchunks` WRITE;
/*!40000 ALTER TABLE `marketingchunks` DISABLE KEYS */;
INSERT INTO `marketingchunks` VALUES (1,'Consultoría e Integración','Presentamos nuestros servicios de Consultoría e Integración de soluciones\n                tecnológiicas en los diferentes aspectos de la Ingeniería Eléctrica,\n                Telecomunicaciones  e Infraestructura Computacional. Conoce cómo creamos\n                las mejores soluciones para las Empresas y Negocios.','2014-07-29 20:31:28','2014-07-29 20:31:28',1),(2,'Proyectos','Una invitación a una galería construida durante estos 8 años en los que,\n                con mucha alegría, y por que no, con mucho orgullo se han obtenido resultados\n                de calidad en las soluciones entregadas a nuestros clientes.','2014-07-29 20:31:28','2014-07-29 20:31:28',2),(3,'Historias de Éxito','Conoce historias reales de la realización de nuestros proyectos: ingeniería,\n                personas y planificación, los retos encontrados y los obstáculos superados hasta llegar a la\n                implantación de una infraestructura, de una solución tecnológica. ','2014-07-29 20:31:28','2014-07-29 20:31:28',3);
/*!40000 ALTER TABLE `marketingchunks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_08_02_182726_add_fields_to_contenttypes_table',1),('2014_08_02_185416_add_field_to_contenttypes_table',2),('2014_08_02_185723_add_anotherfield_to_contenttypes_table',3),('2014_08_02_210100_add_marketfield_to_contenttypes_table',4),('2014_08_02_225106_add_fields_to_profile_table',5),('2014_08_02_234933_add_field_to_enterprise_table',6),('2014_08_05_163934_add_footer_info_field_to_contentypes_table',7),('2014_08_11_203436_add_field_to_categorty_table',8),('2014_08_12_233607_add_icon_field_to_categories_table',9),('2014_08_20_164557_add_project_date_to_contents_table',10),('2014_08_20_180018_add_categorization_field_to_contenttypes_table',11),('2014_09_02_203335_add_description_to_clients_table',12),('2014_09_25_210149_createDeletedAtFieldInBannersTable',13),('2015_03_09_222651_create_imageresources_table',14);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(256) DEFAULT NULL,
  `imageable_id` int(11) DEFAULT NULL,
  `imageable_type` varchar(48) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (1,'juan.jpeg',42,'App\\User',NULL,NULL),(29,'/members/bio/phBio-42-xqT22F3STPDMz8p0.png',11,'App\\Profile','2015-02-18 16:52:50','2015-02-18 15:30:24'),(30,'/members/bio/phBio-74-HJy4rWcC9IzN3fM7.png',14,'App\\Profile','2015-02-18 23:14:17','2015-02-18 23:14:17'),(31,'/members/bio/phBio-75-ulzpLchomYn9VmKD.png',15,'App\\Profile','2015-02-19 20:49:45','2015-02-19 17:32:16'),(32,'/members/bio/phBio-79-4TRo1e7QrDtQI6UJ.png',18,'App\\Profile','2015-04-15 00:06:37','2015-04-15 00:06:37'),(33,'/members/bio/phBio-86-Urr8Rh5Wmb46hHF2.png',21,'App\\Profile','2015-04-27 23:12:10','2015-04-27 23:12:10'),(34,'/members/bio/phBio-88-RIGXsWxpC5m624JA.png',23,'App\\Profile','2015-05-07 00:50:32','2015-05-07 00:40:06');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prices`
--

DROP TABLE IF EXISTS `prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ammount` decimal(11,2) DEFAULT NULL,
  `discount` decimal(11,2) DEFAULT '0.00',
  `description` varchar(512) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `saleable_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`saleable_id`),
  KEY `fk_prices_services1_idx` (`saleable_id`),
  CONSTRAINT `fk_prices_services1` FOREIGN KEY (`saleable_id`) REFERENCES `saleables` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prices`
--

LOCK TABLES `prices` WRITE;
/*!40000 ALTER TABLE `prices` DISABLE KEYS */;
INSERT INTO `prices` VALUES (1,40.00,NULL,'mensual',NULL,'2015-03-04 19:40:59','2015-03-04 19:40:59',111),(2,50.00,NULL,'anual','2015-03-04 16:02:05','2015-03-04 19:40:59','2015-03-04 19:40:59',111),(3,50.00,NULL,'anual','2015-03-04 16:02:52','2015-03-04 19:40:59','2015-03-04 19:40:59',111),(4,50.00,NULL,'anual','2015-03-04 16:04:15','2015-03-04 19:40:59','2015-03-04 19:40:59',111),(5,80.00,NULL,'anual, mensual 2','2015-03-04 16:05:46','2015-03-04 19:40:59','2015-03-04 19:40:59',111),(6,0.00,NULL,'zazaz','2015-03-04 19:32:05','2015-03-04 19:40:59','2015-03-04 19:40:59',111),(7,23.20,70.00,'Este precio es mensual. pero es gratis el primer mes.','2015-03-04 21:40:14','2015-03-04 22:48:09','2015-03-04 22:48:09',112),(8,40.20,NULL,'xsxswxzq','2015-03-04 22:51:08','2015-03-04 22:51:08',NULL,112),(9,54.00,NULL,'vrvrvr','2015-03-04 22:53:45','2015-03-04 22:53:57','2015-03-04 22:53:57',101),(10,45.00,54.00,'54g4v4vtr','2015-03-04 22:54:49','2015-03-04 22:54:49',NULL,101),(11,87.00,45.00,'Lorem ipsum dolor sit amet, per sint volumus in. An numquam cotidieque est. Ius ex audire moderatius, eum ex altera debitis. At movet perfecto vim, id menandri partiendo similique eam, minim ceteros deseruisse ex mea. Est quas consequat ea. Choro conceptam ius ad, duo utroque insolens no.\n\nEam ut graeco melius, quo elit corrumpit ut. Prima eleifend ne has. Eum at sale phaedrum menandri, erant ludus te vis. At oratio nominavi apeirian nam, eu pri quis ceteros molestiae. Soluta voluptaria mea ne, primis apeir','2015-03-04 22:57:22','2015-03-06 18:09:06',NULL,52),(12,23.00,23.00,'des','2015-03-06 18:10:36','2015-03-06 18:10:36',NULL,114),(13,45.00,0.00,NULL,'2015-03-06 18:11:27','2015-03-06 18:11:27',NULL,114),(14,6.00,NULL,'Novum accusam laboramus ei eum, et per enim detraxit. Id sed virtute sadipscing, ei has cetero dolores concludaturque, has ex suscipit salutatus. Per reque option accusata te. In wisi numquam maluisset sea, mundi melius salutandi has at, est te clita facilisis. Ius oratio suscipit cu, an viris impedit fuisset eam. Eos ad probo error, est quando latine ad.','2015-04-20 22:38:38','2015-04-20 22:38:38',NULL,118),(15,45.00,20.00,'Pericula prodesset no cum. Nam posse nostro efficiendi et, has no habeo copiosae, his an albucius dignissim. Mei ei duis doming delectus. Ei cum scaevola perpetua, ad cum mucius fabulas. Ex disputando comprehensam eam, mea omnes dicunt inciderint in.','2015-04-20 22:39:04','2015-04-20 22:39:04',NULL,118),(16,10.00,0.00,'Audiam virtute molestie ut sit, vim cu quando utroque prodesset. At vulputate referrentur est, at graeci insolens per. No cum tacimates pertinax. In dolor utroque cotidieque vis, qui eu nisl habemus, mnesarchum reprehendunt in pri. Ei cum suscipit ocurreret.','2015-04-20 22:39:26','2015-04-20 22:39:26',NULL,118),(17,20.00,0.00,'Lorem ipsum dolor sit amet, ius nihil civibus rationibus eu, eirmod aeterno consequat nam id, no ridens causae indoctum ius. Quis paulo an has, eum ex lorem cotidieque. Nonumy iisque scribentur duo ut, vidit quaestio evertitur duo ad, mea at porro eligendi. Te legimus luptatum forensibus eos, ludus graece et mei.','2015-05-08 22:43:26','2015-05-08 22:43:26',NULL,135),(18,30.00,0.00,'Lorem ipsum dolor sit amet, ius nihil civibus rationibus eu, eirmod aeterno consequat nam id, no ridens causae indoctum ius. Quis paulo an has, eum ex lorem cotidieque. Nonumy iisque scribentur duo ut, vidit quaestio evertitur duo ad, mea at porro eligendi. Te legimus luptatum forensibus eos, ludus graece et mei.','2015-05-08 22:43:50','2015-05-08 22:43:50',NULL,135),(19,20.00,0.00,'Lorem ipsum dolor sit amet, ius nihil civibus rationibus eu, eirmod aeterno consequat nam id, no ridens causae indoctum ius. Quis paulo an has, eum ex lorem cotidieque. Nonumy iisque scribentur duo ut, vidit quaestio evertitur duo ad, mea at porro eligendi. Te legimus luptatum forensibus eos, ludus graece et mei.','2015-05-08 22:43:58','2015-05-08 22:43:58',NULL,135);
/*!40000 ALTER TABLE `prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL COMMENT 'user''s first name',
  `lastname` varchar(255) DEFAULT NULL COMMENT 'user''s last name',
  `photoprofile` varchar(255) DEFAULT NULL COMMENT 'user''s photo',
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `biography` text,
  `phone` varchar(48) DEFAULT NULL,
  `cellular` varchar(48) DEFAULT NULL,
  `address` varchar(2048) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `tumblr` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `gplus` varchar(255) DEFAULT NULL,
  `dribbble` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `picassa` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `vimeo` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `flickr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_profiles_users1_idx` (`user_id`),
  CONSTRAINT `fk_profiles_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (5,7,'Myrtie','Carroll','juan.jpeg','Presidente Acme','2014-08-02 22:12:51','2014-08-02 22:12:51','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,6,'Elfrieda','Hagenes','juan.jpeg','Gerente de Tecnologia AAirlines','2014-08-02 22:12:52','2014-08-02 22:12:52','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,4,'Frida','Gutkowski','juan.jpeg','Gerente General Seguros Colonial','2014-08-02 22:12:52','2014-08-02 22:12:52','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,3,'Uriah','Willms','juan.jpeg','Jefe Tecnología Fybeca','2014-08-02 22:12:53','2014-08-02 22:12:53','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,8,'Evalyn','Gleason','juan.jpeg','Responsable de Comunicaciones FFAA Ecuador','2014-08-02 22:12:53','2014-08-02 22:12:53','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,5,'Tiara','Leuschke','juan.jpeg','Jefe Tecnología TAME','2014-08-02 22:12:54','2014-08-02 22:12:54','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,42,'Juancho','Andrade',NULL,'PApa','2015-02-03 00:53:35','2015-04-15 00:01:27','al fin y al cabofrdk','222222','222222','el quinche2','Ecuador','Pichincha','Quito','https://twitter.com/jfrand014','https://twitter.com/jfrand014','https://twitter.com/jfrand014','https://twitter.com/jfrand014','https://twitter.com/jfrand014',NULL,NULL,NULL,'gh',NULL,NULL,NULL),(12,43,'j','a','juan.jpeg','papa','0000-00-00 00:00:00',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,73,'___','___',NULL,'','2015-02-18 22:44:35','2015-02-18 22:53:21','detalle bio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,74,'','',NULL,'','2015-02-18 23:12:04','2015-02-18 23:44:36','sxsxsxs',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,75,'','',NULL,'','2015-02-19 17:32:00','2015-02-19 17:32:48','nueva descripcion',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,76,'','',NULL,'','2015-02-19 21:25:41','2015-02-19 21:25:41','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,78,'','',NULL,'','2015-03-11 03:31:31','2015-03-11 03:31:31','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,79,'','',NULL,'','2015-04-15 00:05:35','2015-04-15 00:07:41','Lorem ipsum dolor sit amet, fierent lucilius nec ne, per no diceret postulant molestiae. Et est minimum accusata. Has graeco albucius ei. Quod atqui usu et, in ludus ignota accusata sea, pri munere appellantur in. Ei utinam animal duo, legimus alienum vel et, cu nec case dicit scaevola.\n\nFalli primis virtute sed in, ad quo idque laoreet. Vel agam duis eu, pri ea quas omnes forensibus. Ex tincidunt abhorreant omittantur sea. Paulo meliore ne duo, suas sadipscing vituperatoribus ex has, te quod autem movet est.\n\nUllum quaerendum nam te. Platonem volutpat accusamus sea eu. Ne phaedrum accusata omittantur eam, vix partem accommodare ex, at usu malis utamur laoreet. Sit te summo virtute erroribus, illum rationibus at duo, no mea debitis platonem perpetua. Qui detraxit ullamcorper et, sea te mentitum appareat.','777777','08888888',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,80,'','',NULL,'','2015-04-27 22:55:16','2015-04-27 22:55:16','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,85,'','',NULL,'','2015-04-27 23:03:56','2015-04-27 23:03:56','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,86,'','',NULL,'','2015-04-27 23:08:55','2015-04-27 23:11:39','mi bio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,87,'','',NULL,'','2015-04-27 23:17:43','2015-04-27 23:17:43','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,88,'Juan Francisco','Andrade',NULL,'','2015-04-29 21:22:07','2015-05-07 01:21:35','algo alfin','2090909','099099','cicla','Ecuador','Pichincha','Quito','','twitter',NULL,NULL,NULL,NULL,NULL,NULL,'github',NULL,NULL,'flickr'),(24,89,'','',NULL,'','2015-05-09 00:46:03','2015-05-09 00:55:17','algo alfin',NULL,NULL,NULL,NULL,NULL,NULL,'fac',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saleabledetails`
--

DROP TABLE IF EXISTS `saleabledetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saleabledetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detail` varchar(512) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `saleable_id` int(11) NOT NULL,
  `type` int(11) DEFAULT '0',
  PRIMARY KEY (`id`,`saleable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saleabledetails`
--

LOCK TABLES `saleabledetails` WRITE;
/*!40000 ALTER TABLE `saleabledetails` DISABLE KEYS */;
INSERT INTO `saleabledetails` VALUES (1,'defigsgj','2015-02-25 23:08:42','2015-03-02 15:13:18',NULL,3,0),(2,'d',NULL,'2015-03-02 16:16:05','2015-03-02 16:16:05',4,0),(3,'dedededed','2015-03-02 15:04:42','2015-03-02 15:04:42',NULL,0,0),(4,'nuevito4','2015-03-02 15:09:03','2015-03-02 15:12:15',NULL,3,0),(6,'eje','2015-03-02 15:22:48','2015-03-02 15:22:48',NULL,3,0),(7,'ccdcdcd','2015-03-02 15:24:08','2015-03-02 15:33:59','2015-03-02 15:33:59',3,0),(8,'nuevo2','2015-03-02 15:24:28','2015-03-02 15:33:45','2015-03-02 15:33:45',3,0),(9,'nuevito','2015-03-02 15:36:27','2015-03-02 15:36:27',NULL,3,0),(10,'bgfbvfgbfgbgfb','2015-03-02 17:41:51','2015-03-02 17:44:15','2015-03-02 17:44:15',52,0),(11,'fresferfrefre2','2015-03-02 17:45:11','2015-03-02 18:56:33','2015-03-02 18:56:33',53,0),(14,'cdcdcd','2015-03-02 17:56:19','2015-03-02 18:56:26','2015-03-02 18:56:26',55,0),(15,'d','2015-03-02 18:02:21','2015-03-02 18:56:18','2015-03-02 18:56:18',57,0),(16,'cdcdcdcd','2015-03-02 18:03:57','2015-03-02 18:56:14','2015-03-02 18:56:14',58,0),(17,'yyhnhgnghngh','2015-03-02 18:04:12','2015-03-02 18:56:14','2015-03-02 18:56:14',58,0),(18,'frefrefre','2015-03-02 18:05:29','2015-03-02 18:05:37','2015-03-02 18:05:37',59,0),(19,'xsxsxsx','2015-03-02 18:09:13','2015-03-02 18:09:24','2015-03-02 18:09:24',60,0),(20,'cdcd','2015-03-02 18:12:08','2015-03-02 18:12:15','2015-03-02 18:12:15',61,0),(21,'xsxsxsxs','2015-03-02 18:14:20','2015-03-02 18:14:27','2015-03-02 18:14:27',62,0),(22,'bgbgbgbg','2015-03-02 18:14:38','2015-03-02 18:55:47','2015-03-02 18:55:47',62,0),(23,'nynyunuyn','2015-03-02 18:59:34','2015-03-02 18:59:34',NULL,64,0),(24,'descrcrc','2015-03-02 22:20:15','2015-03-02 22:21:53','2015-03-02 22:21:53',99,0),(25,'gtgtgtgtgt4','2015-03-02 22:20:41','2015-03-03 20:01:58',NULL,101,0),(26,'gtgtgt','2015-03-02 22:20:59','2015-03-02 22:21:06',NULL,101,0),(27,'xsxs','2015-03-03 00:21:32','2015-03-03 00:21:32',NULL,101,0),(28,'cdcdcd','2015-03-03 00:22:03','2015-03-04 19:41:08','2015-03-04 19:41:08',103,0),(29,'otritof','2015-03-03 20:02:26','2015-03-03 20:03:24','2015-03-03 20:03:24',101,0),(30,'yaf','2015-03-03 20:03:36','2015-03-03 20:03:36',NULL,101,0),(31,'ytyt','2015-03-03 20:03:47','2015-03-03 20:45:00','2015-03-03 20:45:00',101,0),(32,'descfc2','2015-03-03 20:13:53','2015-03-03 20:45:30','2015-03-03 20:45:30',110,0),(33,'xsxsx','2015-03-03 20:14:13','2015-03-03 20:14:20','2015-03-03 20:14:20',110,0),(34,'xsxsxsxsxs2','2015-03-03 20:42:19','2015-03-03 20:42:37','2015-03-03 20:42:37',101,0),(35,'Lorem ipsum dolor sit amet, per sint volumus in. An numquam cotidieque est. Ius ex audire moderatius, eum ex altera debitis. At movet perfecto vim, id menandri partiendo similique eam, minim ceteros deseruisse ex mea. Est quas consequat ea. Choro conceptam ius ad, duo utroque insolens no.\n\nEam ut graeco melius, quo elit corrumpit ut. Prima eleifend ne has. Eum at sale phaedrum menandri, erant ludus te vis. At oratio nominavi apeirian nam, eu pri quis ceteros molestiae. Soluta voluptaria mea ne, primis apeir','2015-03-03 22:09:42','2015-03-05 00:18:30',NULL,52,0),(36,'detl','2015-03-03 22:15:30','2015-03-04 19:40:59','2015-03-04 19:40:59',111,0),(37,'nuevito2','2015-03-03 22:26:50','2015-03-04 19:40:59',NULL,111,2),(38,'nuevitof','2015-03-04 20:39:20','2015-03-04 20:49:26',NULL,112,0),(39,'zazaza','2015-03-04 20:44:13','2015-03-04 20:50:13','2015-03-04 20:50:13',112,2),(40,'nueva ca','2015-03-06 18:04:17','2015-03-06 18:04:17',NULL,114,0),(41,'xsxs','2015-03-06 18:12:11','2015-03-06 18:12:11',NULL,115,0),(42,'cffdcdcdcd','2015-03-09 21:25:20','2015-03-09 21:25:20',NULL,52,0),(43,'cdccd','2015-03-09 21:26:12','2015-03-09 21:26:12',NULL,52,0),(44,'otrito','2015-03-10 19:30:04','2015-03-10 19:30:04',NULL,52,0),(45,'nuevita y con ícono','2015-03-10 21:12:51','2015-03-10 21:12:51',NULL,52,1),(46,'deswsz','2015-03-10 21:25:21','2015-03-10 21:25:21',NULL,52,0),(47,'Lorem ipsum dolor sit amet, nec perfecto partiendo conceptam et, aeque verear ius ex. An sed delenit ponderum. Cu mei erant petentium, eum ocurreret gloriatur cu. Soleat bonorum menandri ei sit, ut quot dicat usu.','2015-04-16 21:58:29','2015-04-16 21:58:29',NULL,118,0),(48,'Eum te nostrud forensibus suscipiantur. Noster erroribus ius et. Sea ad meis reque reformidans, esse atomorum voluptaria et sea, tempor lobortis ea vel. Pri ne nibh interesset dissentiet, ius unum latine te. Ullum animal ius ut, lorem iisque inciderint mei in, eum in sanctus vivendo perpetua.','2015-04-16 21:59:11','2015-04-16 21:59:11',NULL,118,0),(52,'Nec mundi mentitum lucilius ad. Odio erat eos eu, at nobis possim pri. Te vix modo aperiri maiestatis, labitur consequuntur sed id. Per ad ponderum recusabo ullamcorper, et mel iusto corpora placerat. Scaevola vivendum nec id, vidit noluisse sea no.','2015-04-20 22:07:37','2015-04-20 22:07:37',NULL,118,1),(53,'Cu hinc doctus mediocritatem vel. Eu essent meliore civibus vix, labore fuisset conclusionemque vix id. Quo eu eros consequuntur, ut paulo discere cum. Iracundia assentior his ei, vivendo reprehendunt cum ea','2015-04-20 22:12:34','2015-04-20 22:12:34',NULL,118,1),(54,'Decore appareat est at, mel ne nisl modo impetus, ei per utamur integre pertinacia. Sea ut quod libris qualisque. No usu diceret labores, in sed brute laboramus temporibus.','2015-04-20 22:25:36','2015-04-20 22:25:36',NULL,118,2),(55,'Ut qui velit partem fabulas, cu eam omnium aeterno mnesarchum. Ne vix eirmod verear, cum ut perfecto insolens erroribus. Id decore dolore vis, molestiae deseruisse intellegam ea vel, eu aliquip referrentur adversarium mel. At qui agam labore utamur, in vis vidisse gubergren argumentum.','2015-04-20 22:26:11','2015-04-20 22:26:11',NULL,118,2),(56,'Ea apeirian contentiones eum, vis ubique blandit ad. Est delectus invidunt ei, te harum congue singulis pri, te elit assum tincidunt vel. Viris scripta eripuit ne nam, ut oratio maluisset vim. Cu est bonorum laoreet. Ei everti feugait salutandi est, duo nostro latine eu. Per brute offendit eu, qui id purto copiosae pertinacia, cum regione praesent cu.','2015-04-20 22:26:49','2015-04-20 22:26:49',NULL,118,2),(57,'Lorem ipsum dolor sit amet, ius nihil civibus rationibus eu, eirmod aeterno consequat nam id, no ridens causae indoctum ius. Quis paulo an has, eum ex lorem cotidieque.','2015-05-08 21:39:06','2015-05-08 21:39:06',NULL,135,0),(58,'Lorem ipsum dolor sit amet, ius nihil civibus rationibus eu, eirmod aeterno consequat nam id, no ridens causae indoctum ius. Quis paulo an has, eum ex lorem cotidieque.','2015-05-08 21:41:49','2015-05-08 21:41:49',NULL,135,0),(59,'Lorem ipsum dolor sit amet, ius nihil civibus rationibus eu, eirmod aeterno consequat nam id, no ridens causae indoctum ius.','2015-05-08 21:46:52','2015-05-08 21:46:52',NULL,135,1),(60,'Lorem ipsum dolor sit amet, ius nihil civibus rationibus eu, eirmod aeterno consequat nam id, no ridens causae indoctum ius.','2015-05-08 21:47:02','2015-05-08 21:47:02',NULL,135,1),(61,'Lorem ipsum dolor sit amet, ius nihil civibus rationibus eu, eirmod aeterno consequat nam id, no ridens causae indoctum ius.','2015-05-08 21:47:09','2015-05-08 21:47:09',NULL,135,1),(62,'Lorem ipsum dolor sit amet, ius nihil civibus rationibus eu, eirmod aeterno consequat nam id, no ridens causae indoctum ius.','2015-05-08 22:25:21','2015-05-08 22:25:21',NULL,135,2),(63,'Lorem ipsum dolor sit amet, ius nihil civibus rationibus eu, eirmod aeterno consequat nam id, no ridens causae indoctum ius.','2015-05-08 22:25:30','2015-05-08 22:25:30',NULL,135,2),(64,'Lorem ipsum dolor sit amet, ius nihil civibus rationibus eu, eirmod aeterno consequat nam id, no ridens causae indoctum ius. Quis paulo an has, eum ex lorem cotidieque. Nonumy iisque scribentur duo ut, vidit quaestio evertitur duo ad, mea at porro eligendi. Te legimus luptatum forensibus eos, ludus graece et mei.','2015-05-08 22:25:40','2015-05-08 22:25:40',NULL,135,2);
/*!40000 ALTER TABLE `saleabledetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saleables`
--

DROP TABLE IF EXISTS `saleables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saleables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `detailed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`),
  KEY `fk_services_users_idx` (`user_id`),
  CONSTRAINT `fk_services_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saleables`
--

LOCK TABLES `saleables` WRITE;
/*!40000 ALTER TABLE `saleables` DISABLE KEYS */;
INSERT INTO `saleables` VALUES (3,'hacking2','ejuc','2015-02-25 21:36:38','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(4,'nuevo','desc nueva','2015-02-28 17:24:37','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(5,'tres','ya son','2015-02-28 17:27:05','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(6,'cutrof','dedxc','2015-02-28 17:29:01','2015-03-02 00:00:00','2015-03-02 00:00:00',42,1,NULL,NULL),(7,'tiulo','des','2015-02-28 17:39:32','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(8,'nueo','nuevo','2015-02-28 17:41:44','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(9,'nuevito','av','2015-02-28 17:44:42','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(10,'bhb','vhv','2015-02-28 17:45:19','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(11,'xsxs','xsxsxs','2015-02-28 17:52:22','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(12,'dedede','dedede','2015-02-28 17:54:37','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(13,'xs','xsxsxs','2015-02-28 17:56:36','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(14,'dede','deded','2015-02-28 17:57:46','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(15,'xsxs','xsx','2015-02-28 17:59:14','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(16,'xs','xsxs','2015-02-28 18:06:39','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(17,'desede','dedede','2015-02-28 18:11:18','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(18,'dedde','dedede','2015-02-28 18:12:54','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(19,'xd','xdx','2015-02-28 18:14:34','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(20,'cdc','dcdcd','2015-02-28 18:24:04','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(21,'cdcd','cdcdc','2015-02-28 18:25:11','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(22,'xd','xdxd','2015-02-28 18:27:45','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(23,'cd','cdcd','2015-02-28 18:30:46','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(24,'xsx','sxsxs','2015-02-28 18:34:50','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(25,'xsxs','xsxs','2015-02-28 18:40:46','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(26,'nuevito','huv','2015-02-28 18:56:33','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(27,'xsx','xsxs','2015-02-28 18:59:40','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(28,'xsxs','xsxs','2015-02-28 19:00:44','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(29,'xsxs','xsxsxs','2015-02-28 19:18:30','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(30,'xsxs','xsxs','2015-02-28 19:19:50','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(31,'xsx','sxs','2015-02-28 19:24:46','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(32,'za','zazaz','2015-02-28 19:30:03','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(33,'xs','xsxs','2015-02-28 19:41:52','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(34,'s','s','2015-02-28 19:48:25','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(35,'x','dxdx','2015-02-28 19:48:50','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(36,'xsxsx','xsxsxs','2015-02-28 19:51:22','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(37,'cd','cdcdcd','2015-02-28 19:52:08','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(38,'xs','xsxs','2015-02-28 19:54:05','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(39,'xs','xs','2015-02-28 19:54:29','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(40,'nuevito','nuevito','2015-03-02 15:36:10','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(41,'nuevo','dos','2015-03-02 15:40:37','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(42,'xsx','sxsxs','2015-03-02 15:45:24','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(43,'nuevo servicio','descripcion','2015-03-02 16:53:38','2015-03-02 00:00:00','2015-03-02 00:00:00',42,1,NULL,NULL),(44,'ve','dvdvfd','2015-03-02 16:54:52','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(45,'titulisimo','descripco','2015-03-02 16:58:22','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(46,'xsxs','xsxsxs','2015-03-02 17:00:19','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(47,'zszaza','zaszszszazaed','2015-03-02 17:05:35','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(48,'csd','csdcdsc','2015-03-02 17:08:04','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(49,'xsx','sxsxs','2015-03-02 17:23:58','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(50,'zxszs','zszsz','2015-03-02 17:27:00','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(51,'xs','xsxsx','2015-03-02 17:35:26','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(52,'cd2ed','<p>Lorem ipsum dolor sit amet, per sint volumus in. An numquam cotidieque est. Ius ex audire moderatius, eum ex altera debitis. At movet perfecto vim, id menandri partiendo similique eam, minim ceteros deseruisse ex mea. Est quas consequat ea. Choro conceptam ius ad, duo utroque insolens no.Eam ut graeco melius, quo elit corrumpit ut. Prima eleifend ne has. Eum at sale phaedrum menandri, erant ludus te vis. At oratio nominavi apeirian nam, eu pri quis ceteros molestiae. Soluta voluptaria mea ne, primis apeirian ex sit, vel in impetus tractatos. Enim falli perfecto cu pro, mea case invenire electram ne.Aeque nostro deseruisse per ea, cum ne ubique invenire argumentum, et dico scripta lobortis mea. Ridens noluisse ad sed. Graece melius ne vim, et pri quod summo legimus. Graeci assentior vel te, ea usu nihil aliquip complectitur. Vel an affert omittam. 45ed</p>','2015-03-02 17:41:41','2015-03-11 23:37:14',NULL,42,0,NULL,NULL),(53,'bbgrtgtr','gtrgtrgrt','2015-03-02 17:44:53','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(54,'cfcf','cfcf','2015-03-02 17:52:44','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(55,'c','dscdscds','2015-03-02 17:56:11','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(56,'cd','cdcdcd','2015-03-02 18:00:01','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(57,'xsx','sxs','2015-03-02 18:02:09','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(58,'vfvf','vfvfvf','2015-03-02 18:03:50','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(59,'fer','frefrfre','2015-03-02 18:05:22','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(60,'xsxs','xsxs','2015-03-02 18:09:06','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(61,'cd','cdcd','2015-03-02 18:12:00','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(62,'xsxs','xsxs','2015-03-02 18:14:10','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(63,'nynyunuyn','nuynuynyun','2015-03-02 18:59:06','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(64,'nyu','ynny','2015-03-02 18:59:27','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(65,'xs','xsxsxs','2015-03-02 19:01:07','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(66,'xsxs','xsxs','2015-03-02 19:10:16','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(67,'xsxsxs','xsxsxs','2015-03-02 19:11:42','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(68,'xsx','xsxsxs','2015-03-02 19:13:28','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(69,'xs','xsxs','2015-03-02 19:14:13','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(70,'cdc','dcdcd','2015-03-02 19:15:48','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(71,'cdc','dcdcd','2015-03-02 19:19:26','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(72,'xs','xsxs','2015-03-02 19:19:56','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(73,'vfvf','vfvf','2015-03-02 19:20:46','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(74,'frefer','frefre','2015-03-02 19:24:30','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(75,'vgfv','fvfgvfg','2015-03-02 19:25:23','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(76,'csd','csd','2015-03-02 19:26:43','2015-03-02 00:00:00','2015-03-02 00:00:00',42,0,NULL,NULL),(77,'xs','xs','2015-03-02 19:32:03','2015-03-02 19:32:03','2015-03-02 00:00:00',42,0,NULL,NULL),(78,'xs','xs','2015-03-02 19:34:02','2015-03-02 19:34:02','2015-03-02 00:00:00',42,0,NULL,NULL),(79,'gygy','gygy','2015-03-02 19:37:59','2015-03-02 19:37:59','2015-03-02 00:00:00',42,0,NULL,NULL),(80,'xs','xs','2015-03-02 19:40:06','2015-03-02 19:40:06','2015-03-02 00:00:00',42,0,NULL,NULL),(81,'xs','xs','2015-03-02 19:40:35','2015-03-02 19:40:35','2015-03-02 00:00:00',42,0,NULL,NULL),(82,'x','s','2015-03-02 19:41:13','2015-03-02 19:41:13','2015-03-02 00:00:00',42,0,NULL,NULL),(83,'xs','xs','2015-03-02 19:41:51','2015-03-02 19:41:51','2015-03-02 00:00:00',42,0,NULL,NULL),(84,'xs','xs','2015-03-02 19:46:14','2015-03-02 19:46:14','2015-03-02 00:00:00',42,0,NULL,NULL),(85,'fr','fr','2015-03-02 19:49:58','2015-03-02 19:49:58','2015-03-02 00:00:00',42,0,NULL,NULL),(86,'de','de','2015-03-02 19:50:28','2015-03-02 19:50:28','2015-03-02 00:00:00',42,0,NULL,NULL),(87,'gyg','tgfvtgvg','2015-03-02 20:08:47','2015-03-02 20:08:47','2015-03-02 00:00:00',42,0,NULL,NULL),(88,'xs','xs','2015-03-02 20:11:41','2015-03-02 20:11:41','2015-03-02 00:00:00',42,0,NULL,NULL),(89,'xs','xs','2015-03-02 20:26:26','2015-03-02 20:26:26','2015-03-02 00:00:00',42,0,NULL,NULL),(90,'xs','xs','2015-03-02 20:42:10','2015-03-02 20:42:10','2015-03-02 00:00:00',42,0,NULL,NULL),(91,'xdxd','xd','2015-03-02 20:45:31','2015-03-02 20:45:31','2015-03-02 00:00:00',42,0,NULL,NULL),(92,'j','d','2015-03-02 20:47:15','2015-03-02 20:47:15','2015-03-02 00:00:00',42,0,NULL,NULL),(93,'xs','xs','2015-03-02 20:54:13','2015-03-02 20:54:13','2015-03-02 00:00:00',42,0,NULL,NULL),(94,'xs','xs','2015-03-02 21:17:53','2015-03-02 22:22:08','2015-03-02 22:22:08',42,0,NULL,NULL),(95,'xs','xs','2015-03-02 21:18:14','2015-03-02 22:22:04','2015-03-02 22:22:04',42,0,NULL,NULL),(96,'xs','xs','2015-03-02 21:31:47','2015-03-02 22:22:01','2015-03-02 22:22:01',42,0,NULL,NULL),(97,'xs','xs','2015-03-02 22:14:57','2015-03-02 22:21:58','2015-03-02 22:21:58',42,0,NULL,NULL),(98,'juuhuo','bobbjk','2015-03-02 22:19:24','2015-03-02 22:21:56','2015-03-02 22:21:56',42,0,NULL,NULL),(99,'cdcd','cdcd','2015-03-02 22:20:01','2015-03-02 22:21:53','2015-03-02 22:21:53',42,0,NULL,NULL),(100,'gtgtg','gtgtgt','2015-03-02 22:20:34','2015-03-02 22:21:51','2015-03-02 22:21:51',42,0,NULL,NULL),(101,'vfd23','<p><b><a href=\"http://g.com\">seeing change</a></b></p>','2015-03-02 23:15:43','2015-03-09 20:30:06',NULL,42,0,NULL,NULL),(102,'xdxdxd','xdxdx','2015-03-03 00:21:17','2015-03-04 19:44:47','2015-03-04 19:44:47',42,0,NULL,NULL),(103,'nuevito','nipninp','2015-03-03 00:21:54','2015-03-04 19:41:08','2015-03-04 19:41:08',42,0,NULL,NULL),(104,'xsxsxs','xsxs','2015-03-03 01:23:51','2015-03-03 01:49:44','2015-03-03 01:49:44',42,0,NULL,NULL),(105,'cd','cdd','2015-03-03 01:26:24','2015-03-03 01:49:37','2015-03-03 01:49:37',42,0,NULL,NULL),(106,NULL,NULL,'2015-03-03 01:27:22','2015-03-03 01:47:11','2015-03-03 01:47:11',42,0,NULL,NULL),(107,NULL,NULL,'2015-03-03 01:43:41','2015-03-03 01:47:08','2015-03-03 01:47:08',42,0,NULL,NULL),(108,NULL,NULL,'2015-03-03 01:48:11','2015-03-03 01:49:28','2015-03-03 01:49:28',42,0,NULL,NULL),(109,'cdc','dcd','2015-03-03 01:49:13','2015-03-03 01:49:31','2015-03-03 01:49:31',42,0,NULL,NULL),(110,'req','req','2015-03-03 20:13:41','2015-03-03 20:45:30','2015-03-03 20:45:30',42,0,NULL,NULL),(111,'servicio','servillantas','2015-03-03 22:13:35','2015-03-04 19:40:59','2015-03-04 19:40:59',42,1,NULL,NULL),(112,'neuq','xsxs','2015-03-04 20:21:11','2015-03-04 20:25:08',NULL,42,0,NULL,NULL),(113,'nue','njnljnl','2015-03-06 17:57:35','2015-03-06 17:57:35',NULL,42,0,NULL,NULL),(114,'xsx','sxs','2015-03-06 18:02:32','2015-03-06 18:02:32',NULL,42,0,NULL,NULL),(115,'nuevitiro','njnkn','2015-03-06 18:11:58','2015-03-06 18:11:58',NULL,42,0,NULL,NULL),(116,'frd','sw','2015-03-06 18:19:26','2015-03-06 18:19:26',NULL,42,0,NULL,NULL),(117,'xs','xs','2015-03-06 18:20:43','2015-03-06 18:20:43',NULL,42,0,NULL,NULL),(118,'Email Marketing 2','<p>Lorem ipsum dolor sit amet, ea mea sale tritani blandit. Vel ad iuvaret ancillae, quod forensibus inciderint ei his, accumsan noluisse temporibus ex eam. Nonumy aliquid at his, ut modo harum volutpat quo. In eius molestie voluptatibus per, mei quas deterruisset eu, no ullamcorper deterruisset mel.</p><p>Mei ex quando animal feugiat. An forensibus accommodare his. An doming feugait imperdiet mea. Erant indoctum deseruisse et pro.Error vivendum quo ea, ex summo singulis pri, eu eos cibo labore possim. An vis civibus ancillae definitionem, te nonumy adipisci vix, ea usu mundi impetus appellantur. </p><p><br/></p>','2015-04-15 23:13:34','2015-04-16 21:33:44',NULL,79,1,0,1),(119,'Desarrollo de software','<p>Lorem ipsum dolor sit amet, munere habemus gubergren eu pro, sit in volumus dissentiunt. Appareat adversarium vis in, conceptam mediocritatem quo id, cum ex fabulas detracto epicurei. Brute altera eu eam. Everti invenire in mea. </p><p>Consequat vulputate vim cu, ut cum sumo aeque graeci. Sint unum vis at, cum etiam explicari conceptam ad, ad postulant tincidunt eum.Eu mel dico corpora copiosae, suscipit tractatos intellegam ea per, an vis detraxit facilisi persecuti. </p><p>Ne labores adipisci sea, no pri illud soleat delicata, error percipit legendos eos no. Ea vix causae efficiendi, id iriure pericula pri, no debet suscipiantur vix. Utroque intellegat interesset ad mel, mel ipsum debitis ei.Et vel verear cotidieque. </p><p>Causae vulputate usu ex, deleniti tacimates lobortis cu quo. Nihil dolorum an nam, quo movet petentium adolescens id, oporteat facilisis eam id. An discere saperet sed, ius lorem efficiendi id, qui cu accusam accommodare.<br/></p>','2015-04-20 22:58:15','2015-04-20 22:58:15',NULL,79,1,NULL,NULL),(120,'Technology Tutorial','<p>Quaestio philosophia complectitur ei sea. Nemore oporteat ex vel. Posse eirmod accumsan vis in, in his movet exerci, vis ne mandamus principes. Summo legimus maiestatis et qui, ei sed putant eripuit vituperata, cum vivendo offendit ex. </p><p>Magna legere interesset ius ne, an nonumes propriae nam, nam saepe complectitur mediocritatem ex. Ea appetere convenire definitiones eos, vix ei natum iusto possim.Audiam virtute molestie ut sit, vim cu quando utroque prodesset. At vulputate referrentur est, at graeci insolens per. </p><p>No cum tacimates pertinax. In dolor utroque cotidieque vis, qui eu nisl habemus, mnesarchum reprehendunt in pri. Ei cum suscipit ocurreret.Elit ignota meliore te sea, ea est porro vidisse rationibus. Ut wisi aliquando sadipscing sed. Et doctus alienum nominati eam, usu fastidii vituperata ei, his ei adhuc falli minimum. Enim persecuti in has, postea qualisque imperdiet vis no, mei ignota indoctum scripserit in. </p><p>Aliquando deseruisse sit ne. In aeque deterruisset duo. Nec ex discere vocibus neglegentur, no legere corpora periculis vis.Pericula prodesset no cum. Nam posse nostro efficiendi et, has no habeo copiosae, his an albucius dignissim. Mei ei duis doming delectus. Ei cum scaevola perpetua, ad cum mucius fabulas. Ex disputando comprehensam eam, mea omnes dicunt inciderint in.<br/></p>','2015-04-20 22:59:24','2015-04-20 22:59:24',NULL,79,0,NULL,NULL),(121,'cms','<p>cms</p>','2015-04-28 23:12:14','2015-04-29 00:32:37',NULL,87,0,0,NULL),(122,'otro','<p>oihoho</p>','2015-04-28 23:13:37','2015-04-29 00:08:57','2015-04-29 00:08:57',87,0,1,NULL),(123,'otr','<p>otr</p>','2015-04-28 23:15:56','2015-04-29 00:08:55','2015-04-29 00:08:55',87,0,0,NULL),(124,'xxsxs','<p>xsxs</p>','2015-04-28 23:17:41','2015-04-29 00:08:52','2015-04-29 00:08:52',87,0,0,NULL),(125,'s','<p>s</p>','2015-04-28 23:19:38','2015-04-29 00:08:50','2015-04-29 00:08:50',87,0,0,NULL),(126,'dee','<p>dede</p>','2015-04-28 23:25:11','2015-04-29 00:08:47','2015-04-29 00:08:47',87,0,0,NULL),(127,'gtgt','<p>tgt</p>','2015-04-28 23:26:21','2015-04-29 00:08:45','2015-04-29 00:08:45',87,0,0,NULL),(128,'xs','<p>xs</p>','2015-04-28 23:27:26','2015-04-29 00:08:42','2015-04-29 00:08:42',87,0,0,NULL),(129,'d','<p>d</p>','2015-04-28 23:28:18','2015-04-29 00:08:40','2015-04-29 00:08:40',87,0,0,NULL),(130,'xs','<p>xs</p>','2015-04-28 23:30:19','2015-04-29 00:08:37','2015-04-29 00:08:37',87,0,0,NULL),(131,'xs','<p>xsxs</p>','2015-04-28 23:56:04','2015-04-29 00:08:36','2015-04-29 00:08:36',87,0,0,NULL),(132,'xs','<p>xsxs</p>','2015-04-28 23:56:26','2015-04-29 00:08:33','2015-04-29 00:08:33',87,0,0,NULL),(133,'xs','<p>xsxs</p>','2015-04-29 00:01:06','2015-04-29 00:08:29','2015-04-29 00:08:29',87,0,0,NULL),(134,'nuevito','<p>nuevito</p>','2015-04-29 00:09:44','2015-04-29 00:32:37',NULL,87,0,1,NULL),(135,'email marketing','<p>Lorem ipsum dolor sit amet, perpetua persecuti at quo, putant molestie cu sit. Sed fabulas electram democritum id, esse graeco per no. Et mea populo definitionem, melius laoreet percipit mea te. Vim te mundi tantas voluptaria. Decore apeirian constituam nam te.Eum aliquid principes ut, ius mentitum perpetua delicatissimi eu, id vocent iudicabit nam. In veniam dicunt menandri mel. Ea pri illud philosophia, harum maiorum posidonium eam eu. Qui veritus dolores cu. Inermis conceptam te vis, eam vivendo commune consulatu cu.<br/></p>','2015-04-29 23:01:48','2015-04-29 23:02:30',NULL,88,0,0,NULL),(136,'servicio 2','<p>Lorem ipsum dolor sit amet, ius nihil civibus rationibus eu, eirmod aeterno consequat nam id, no ridens causae indoctum ius. Quis paulo an has, eum ex lorem cotidieque. Nonumy iisque scribentur duo ut, vidit quaestio evertitur duo ad, mea at porro eligendi. Te legimus luptatum forensibus eos, ludus graece et mei.At vis dicat mucius, qui ne dicant delectus. Alia facete delicata eum an. Nec ex quaestio interesset delicatissimi, sea eu paulo veritus. Nulla recteque sea et, ex his soleat elaboraret. Audire intellegat at quo.<br/></p>','2015-05-08 15:15:32','2015-05-08 15:15:32',NULL,88,1,0,NULL),(137,'servicio 3','<p>Lorem ipsum dolor sit amet, ius nihil civibus rationibus eu, eirmod aeterno consequat nam id, no ridens causae indoctum ius. Quis paulo an has, eum ex lorem cotidieque. Nonumy iisque scribentur duo ut, vidit quaestio evertitur duo ad, mea at porro eligendi. Te legimus luptatum forensibus eos, ludus graece et mei.At vis dicat mucius, qui ne dicant delectus. Alia facete delicata eum an. Nec ex quaestio interesset delicatissimi, sea eu paulo veritus. Nulla recteque sea et, ex his soleat elaboraret. Audire intellegat at quo.<br/></p>','2015-05-08 15:15:49','2015-05-08 15:15:49',NULL,88,0,0,NULL),(138,'servicio 5','<p>Lorem ipsum dolor sit amet, ius nihil civibus rationibus eu, eirmod aeterno consequat nam id, no ridens causae indoctum ius. Quis paulo an has, eum ex lorem cotidieque. Nonumy iisque scribentur duo ut, vidit quaestio evertitur duo ad, mea at porro eligendi. Te legimus luptatum forensibus eos, ludus graece et mei.At vis dicat mucius, qui ne dicant delectus. Alia facete delicata eum an. Nec ex quaestio interesset delicatissimi, sea eu paulo veritus. Nulla recteque sea et, ex his soleat elaboraret. Audire intellegat at quo.<br/></p>','2015-05-08 15:16:12','2015-05-08 15:16:12',NULL,88,0,0,NULL);
/*!40000 ALTER TABLE `saleables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `targets`
--

DROP TABLE IF EXISTS `targets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `targets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `saleable_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `targets`
--

LOCK TABLES `targets` WRITE;
/*!40000 ALTER TABLE `targets` DISABLE KEYS */;
INSERT INTO `targets` VALUES (1,'desc',NULL,NULL,NULL,101);
/*!40000 ALTER TABLE `targets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `testimonial` text,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_testimonials_users1_idx` (`user_id`),
  CONSTRAINT `fk_testimonials_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'Quia doloribus quibusdam reprehenderit eos voluptatem harum ex et tenetur est dolorem officiis voluptas minima molestiae sed nemo sit.',3,'2014-08-02 22:17:36','2014-08-02 22:17:36'),(2,'Ratione odio perspiciatis omnis consectetur hic sit omnis eveniet aspernatur earum qui.',4,'2014-08-02 22:17:36','2014-08-02 22:17:36'),(3,'Facilis qui ipsum aliquid maiores dolor pariatur quibusdam blanditiis omnis eveniet recusandae cumque.',5,'2014-08-02 22:17:36','2014-08-02 22:17:36'),(4,'Ut quo perferendis inventore sapiente qui laborum saepe autem et quos aliquid aut quis.',6,'2014-08-02 22:17:36','2014-08-02 22:17:36'),(5,'Voluptas dolores et reiciendis totam quo molestias rerum molestiae aliquam nulla est.',7,'2014-08-02 22:17:36','2014-08-02 22:17:36'),(6,'Quasi magni earum dolore officiis eos debitis sed maxime quia tempore.',8,'2014-08-02 22:17:36','2014-08-02 22:17:36'),(13,'Tenetur nulla suscipit eos iure at reprehenderit et ab distinctio cum ea aut et enim voluptatem magnam aut possimus ratione omnis.',5,'2014-09-13 01:02:46','2014-09-13 01:02:46'),(14,'Et rem doloribus aut doloribus officiis culpa laboriosam neque qui qui eum quia.',7,'2014-09-13 01:02:46','2014-09-13 01:02:46'),(15,'Corporis ullam sunt atque placeat quae aut autem soluta voluptas iste consequatur ut quo aliquam.',3,'2014-09-13 01:02:46','2014-09-13 01:02:46'),(16,'Id corrupti ipsum ipsam aspernatur amet sed saepe natus natus est consequatur fugiat in ipsa exercitationem aut repellat et voluptate.',8,'2014-09-13 01:02:46','2014-09-13 01:02:46'),(17,'Et quasi qui molestias occaecati suscipit reprehenderit quas quia iusto voluptatem aut illo autem.',4,'2014-09-13 01:02:46','2014-09-13 01:02:46'),(18,'Totam et illo nulla quis nam doloribus perspiciatis dolorem possimus assumenda sint.',5,'2014-09-13 01:02:46','2014-09-13 01:02:46');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usercontents`
--

DROP TABLE IF EXISTS `usercontents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usercontents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` int(11) DEFAULT NULL COMMENT 'check if site content is active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `contenttype_id` int(11) NOT NULL,
  `ashome` tinyint(1) DEFAULT '0',
  `menualias` varchar(255) DEFAULT NULL,
  `url` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`,`contenttype_id`),
  KEY `fk_usercontents_users_idx` (`user_id`),
  KEY `fk_usercontents_contenttypes1_idx` (`contenttype_id`),
  CONSTRAINT `fk_usercontents_contenttypes1` FOREIGN KEY (`contenttype_id`) REFERENCES `contenttypes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usercontents_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usercontents`
--

LOCK TABLES `usercontents` WRITE;
/*!40000 ALTER TABLE `usercontents` DISABLE KEYS */;
INSERT INTO `usercontents` VALUES (4,1,'2015-02-09 22:41:08','2015-04-29 21:13:28',42,1,0,'UNO','saleable'),(5,0,'2015-02-09 22:41:08','2015-04-29 21:13:28',42,2,0,'DOS','dos'),(6,0,'2015-02-09 22:41:08','2015-04-29 21:13:28',42,3,0,'TRES','tres'),(7,0,'2015-02-09 22:41:08','2015-04-29 21:13:28',42,4,0,'CUATRO','cuatro'),(8,1,'2015-02-09 22:41:08','2015-04-29 21:13:28',42,5,0,'BIOGRAFÍA','acercade'),(9,1,'2015-02-09 22:42:21','2015-04-29 21:13:28',49,1,0,NULL,NULL),(10,1,'2015-02-09 22:42:21','2015-04-29 21:13:28',49,2,0,NULL,NULL),(11,1,'2015-02-09 22:42:21','2015-04-29 21:13:28',49,3,0,NULL,NULL),(12,1,'2015-02-09 22:42:21','2015-04-29 21:13:28',49,4,0,NULL,NULL),(13,1,'2015-02-09 22:42:21','2015-04-29 21:13:28',49,5,0,NULL,NULL),(14,1,'2015-02-09 22:45:01','2015-04-29 21:13:28',72,1,0,NULL,NULL),(15,1,'2015-02-09 22:45:01','2015-04-29 21:13:28',72,2,0,NULL,NULL),(16,1,'2015-02-09 22:45:01','2015-04-29 21:13:28',72,3,0,NULL,NULL),(17,1,'2015-02-09 22:45:01','2015-04-29 21:13:28',72,4,0,NULL,NULL),(18,1,'2015-02-09 22:45:01','2015-04-29 21:13:28',72,5,0,NULL,NULL),(19,1,'2015-02-18 22:44:35','2015-04-29 21:13:28',73,1,0,NULL,NULL),(20,1,'2015-02-18 22:44:35','2015-04-29 21:13:28',73,2,0,NULL,NULL),(21,1,'2015-02-18 22:44:35','2015-04-29 21:13:28',73,3,0,NULL,NULL),(22,1,'2015-02-18 22:44:35','2015-04-29 21:13:28',73,4,0,NULL,NULL),(23,1,'2015-02-18 22:44:35','2015-04-29 21:13:28',73,5,0,NULL,NULL),(24,1,'2015-02-18 23:12:04','2015-04-29 21:13:28',74,1,0,NULL,NULL),(25,1,'2015-02-18 23:12:04','2015-04-29 21:13:28',74,2,0,NULL,NULL),(26,1,'2015-02-18 23:12:04','2015-04-29 21:13:28',74,3,0,NULL,NULL),(27,1,'2015-02-18 23:12:04','2015-04-29 21:13:28',74,4,0,NULL,NULL),(28,1,'2015-02-18 23:12:04','2015-04-29 21:13:28',74,5,0,NULL,NULL),(29,0,'2015-02-19 17:32:00','2015-04-29 21:13:28',75,1,0,NULL,NULL),(30,1,'2015-02-19 17:32:00','2015-04-29 21:13:28',75,2,0,NULL,NULL),(31,1,'2015-02-19 17:32:00','2015-04-29 21:13:28',75,3,0,NULL,NULL),(32,1,'2015-02-19 17:32:00','2015-04-29 21:13:28',75,4,0,NULL,NULL),(33,1,'2015-02-19 17:32:00','2015-04-29 21:13:28',75,5,0,NULL,NULL),(34,1,'2015-02-19 21:25:41','2015-04-29 21:13:28',76,1,0,NULL,NULL),(35,1,'2015-02-19 21:25:41','2015-04-29 21:13:28',76,2,0,NULL,NULL),(36,1,'2015-02-19 21:25:41','2015-04-29 21:13:28',76,3,0,NULL,NULL),(37,1,'2015-02-19 21:25:41','2015-04-29 21:13:28',76,4,0,NULL,NULL),(38,1,'2015-02-19 21:25:41','2015-04-29 21:13:28',76,5,0,NULL,NULL),(39,1,'2015-03-11 03:29:23','2015-04-29 21:13:28',77,1,0,NULL,NULL),(40,1,'2015-03-11 03:29:23','2015-04-29 21:13:28',77,2,0,NULL,NULL),(41,1,'2015-03-11 03:29:23','2015-04-29 21:13:28',77,3,0,NULL,NULL),(42,1,'2015-03-11 03:29:23','2015-04-29 21:13:28',77,4,0,NULL,NULL),(43,1,'2015-03-11 03:29:23','2015-04-29 21:13:28',77,5,0,NULL,NULL),(44,1,'2015-03-11 03:31:31','2015-04-29 21:13:28',78,1,0,NULL,NULL),(45,1,'2015-03-11 03:31:31','2015-04-29 21:13:28',78,2,0,NULL,NULL),(46,1,'2015-03-11 03:31:31','2015-04-29 21:13:28',78,3,0,NULL,NULL),(47,1,'2015-03-11 03:31:31','2015-04-29 21:13:28',78,4,0,NULL,NULL),(48,1,'2015-03-11 03:31:31','2015-04-29 21:13:28',78,5,0,NULL,NULL),(49,1,'2015-04-15 00:05:35','2015-04-29 21:13:28',79,1,1,NULL,NULL),(50,1,'2015-04-15 00:05:35','2015-04-29 21:13:28',79,2,0,NULL,NULL),(51,1,'2015-04-15 00:05:35','2015-04-29 21:13:28',79,3,0,NULL,NULL),(52,1,'2015-04-15 00:05:35','2015-04-29 21:13:28',79,4,0,NULL,NULL),(53,1,'2015-04-15 00:05:35','2015-04-29 21:13:28',79,5,0,'BIOGRA','acercade'),(54,1,'2015-04-27 22:55:16','2015-04-29 21:13:28',80,1,0,NULL,NULL),(55,1,'2015-04-27 22:55:16','2015-04-29 21:13:28',80,2,0,NULL,NULL),(56,1,'2015-04-27 22:55:16','2015-04-29 21:13:28',80,3,0,NULL,NULL),(57,1,'2015-04-27 22:55:16','2015-04-29 21:13:28',80,4,0,NULL,NULL),(58,1,'2015-04-27 22:55:16','2015-04-29 21:13:28',80,5,0,NULL,NULL),(59,1,'2015-04-27 23:03:56','2015-04-29 21:13:28',85,1,0,'PRODUCTOS Y SERVICIOS','productos_servicios'),(60,1,'2015-04-27 23:03:56','2015-04-29 21:13:28',85,2,0,'PORTAFOLIO','portfafolio'),(61,1,'2015-04-27 23:03:56','2015-04-29 21:13:28',85,3,0,'HISTORIAS DE ÉXITO','successstories'),(62,1,'2015-04-27 23:03:56','2015-04-29 21:13:28',85,4,0,'HOME','home'),(63,1,'2015-04-27 23:03:56','2015-04-29 21:13:28',85,5,0,'ACERCA DE','acercade'),(64,1,'2015-04-27 23:08:55','2015-04-29 21:13:28',86,1,0,'PRODUCTOS Y SERVICIOS','productos_servicios'),(65,1,'2015-04-27 23:08:55','2015-04-29 21:13:28',86,2,0,'PORTAFOLIO','portfafolio'),(66,1,'2015-04-27 23:08:55','2015-04-29 21:13:28',86,3,0,'HISTORIAS DE ÉXITO','successstories'),(67,1,'2015-04-27 23:08:55','2015-04-29 21:13:28',86,4,0,'HOME','home'),(68,1,'2015-04-27 23:08:55','2015-04-29 21:13:28',86,5,0,'ACERCA DE','acercade'),(69,1,'2015-04-27 23:17:43','2015-04-29 21:19:45',87,1,0,'SERVIFFcio3','productos_servicios'),(70,0,'2015-04-27 23:17:43','2015-04-29 21:19:45',87,2,0,'PORTAFOLIO3f','portfafolio'),(71,1,'2015-04-27 23:17:43','2015-04-29 21:19:45',87,3,0,'HISTORIAS DE ÉXITO','successstories'),(72,1,'2015-04-27 23:17:43','2015-04-29 21:19:45',87,4,0,'HOME','home'),(73,1,'2015-04-27 23:17:43','2015-04-29 21:19:45',87,5,1,'ACERCA DE','acercade'),(74,1,'2015-04-29 21:22:07','2015-04-29 21:23:06',88,1,1,'PRODUCTOS Y SERVICIOS','productos_servicios'),(75,0,'2015-04-29 21:22:07','2015-05-07 01:33:03',88,2,0,'PORTAFOLIO','portfafolio'),(76,0,'2015-04-29 21:22:07','2015-05-07 01:33:14',88,3,0,'HISTORIAS DE ÉXITO','successstories'),(77,1,'2015-04-29 21:22:07','2015-04-29 21:23:06',88,4,0,'HOME','home'),(78,1,'2015-04-29 21:22:07','2015-04-29 21:23:06',88,5,0,'ACERCA DE','acercade'),(79,1,'2015-05-09 00:46:03','2015-05-09 00:46:03',89,1,0,'PRODUCTOS Y SERVICIOS','productos_servicios'),(80,1,'2015-05-09 00:46:03','2015-05-09 00:46:03',89,2,0,'PORTAFOLIO','portfafolio'),(81,1,'2015-05-09 00:46:03','2015-05-09 00:46:03',89,3,0,'HISTORIAS DE ÉXITO','successstories'),(82,1,'2015-05-09 00:46:03','2015-05-09 00:46:03',89,4,0,'HOME','home'),(83,1,'2015-05-09 00:46:03','2015-05-09 00:46:03',89,5,1,'ACERCA DE','acercade');
/*!40000 ALTER TABLE `usercontents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usertype_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL COMMENT 'user''s nickname or username',
  `password` varchar(2048) NOT NULL DEFAULT '' COMMENT 'user''s password',
  `email` varchar(255) NOT NULL COMMENT 'user''s email',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0:ok',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_users_usertypes1_idx` (`usertype_id`),
  CONSTRAINT `fk_users_usertypes1` FOREIGN KEY (`usertype_id`) REFERENCES `usertypes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,4,'halvorson.gabrielle','12345','yvonne05@yahoo.com',1,NULL,'2014-08-02 22:10:45','2014-08-02 22:10:45'),(4,4,'o\'hara.vance','12345','cleora17@conn.com',1,NULL,'2014-08-02 22:10:45','2014-08-02 22:10:45'),(5,4,'emmanuel85','12345','ffriesen@bergnaum.com',1,NULL,'2014-08-02 22:10:45','2014-08-02 22:10:45'),(6,4,'jreinger','12345','waelchi.jazlyn@block.com',1,NULL,'2014-08-02 22:10:45','2014-08-02 22:10:45'),(7,4,'goodwin.erika','12345','wswift@gmail.com',1,NULL,'2014-08-02 22:10:45','2014-08-02 22:10:45'),(8,4,'morar.elise','12345','lkessler@smith.com',1,NULL,'2014-08-02 22:10:45','2014-08-02 22:10:45'),(42,2,'franc','$2y$10$Oo8YnjMpUhzFQIC4rgTwH.s5rwub92yKdPUxBgbfNpfLDe27g1vc2','jfandradea@gmail.com',0,'eQAPgAQkuBUcC29nBtpx6ztTmDWvuaTb6o4kKfblviAfMNqExqJ5eTU3S0Rq','2015-01-29 20:20:39','2015-04-15 00:04:59'),(43,2,'juan','$2y$10$0EF4Imi9AQVtjyc1G/iKOeJD6NhM7h5N3RTq8mPVyrFD65RBmGbx.','jfrand011@hotmail.com',0,'ozv7dqERzKpzM9PGAMTkpBvcYVMpvFoZOeVhev0LMA9w9Bc9xrbybQGQfLzk','2015-01-29 21:08:22','2015-03-10 19:21:11'),(44,2,'JFRANC014','$2y$10$g8mmQazrhrpo3ET39cD.5.mqGjQ1lrgrYSesRm473Zr5ygxh59kSq','nikolat014@gmail.com',0,'KPYD8gn2wByhnpwrbcOkB3uM7IZsRx6zy5WBqCysjfJu3rg1CZkqplHdTjil','2015-01-29 21:09:54','2015-01-29 21:11:20'),(45,2,'juanf','$2y$10$iMGBgwCUac9fi7muw1Rq9Ohe9pT/OaMXP.hBy4VwKKjVHoszkyWni','ju@hmail.com',0,'VM1tN4AIhax2FvfPzfTrN2UHAw6hDoJ7IxTK72Kqyfq5IkXJFFyM1jMbXC1Z','2015-01-29 21:46:25','2015-01-29 21:47:43'),(46,2,'fogo','$2y$10$Z/zr5JFZAFqn6Mw8hFS.veTTBilCfUWcQWDlnosnEAB79oox4mI.2','cheg@huatita.com',0,NULL,'2015-01-29 21:48:18','2015-01-29 21:48:18'),(47,2,'flora','$2y$10$xWg6Tyq/biofdDLFWYEbHOISds32wXd2lirrybf.fuu6JVb9fQpf.','fal@hotmail.com',0,'nhNLzAFrokkYBGeLtqtifkY6RnlB5o7ceeX6w6tdloX8Yd86tv9XKCmv27pA','2015-01-30 15:22:58','2015-01-30 15:23:24'),(48,2,'manuwl','$2y$10$buKrZ0j1UMdYekqMPWTY0OYEROnzjL.0KjixmQfvD08RcJ5VYeH2G','man@gmail.com',0,'sV3ked3u0S7MXnkQKFoSp07oDbyvlxjl5hFA2sxRieBuyaz2jRsE2ZIJPNB0','2015-01-30 15:26:01','2015-01-30 15:26:16'),(49,2,'','$2y$10$wEqlXwJ1lzqrjsya0wpGEeMYlLht5cqdRpzrizpbELN4Rb5Vkx0He','gandrade@gmail.com',0,'9cV3d3jc8JeKa9fCbMH6l3VHSsdncLRBfE4LJaY4CNgiE4uxliYrM25MHseJ','2015-01-31 17:55:14','2015-02-15 19:56:09'),(50,2,'new','$2y$10$Equi9/CTX29.W0EwLy74K.uwPiwzZHp6f7/Dch2y89YUotbJkiXFi','new@hotmail.com',0,'X85xvPPJPppnMeQI4DFgPXQhdfrdP6wDXUNJUfEh8OB4aeW2uxtza6y66uD9','2015-02-04 18:40:29','2015-02-04 19:13:51'),(51,2,'nuevo','$2y$10$ae6iiYqYJebk0O4PjdCeKuCNdPVArAina2OzE1f.epPiuuZyXp9xG','new@gmail.com',0,'yLCYBMzusYTiVLpU4sVw4Ndj6TKebgbTZ8mO6EdEfyWpntlC4VBpAge8GuTd','2015-02-04 20:34:20','2015-02-04 20:45:45'),(52,2,'useroptions','$2y$10$9.SWTnHLT3JBaTnoVLNKMemoBpinWGruPZPCHGx60.heyBgBx2jJ.','useroptions@gmail.com',0,'YiwsVwpdIsR0WCZfRReOgsKzn3T26vZ9Erh3DmixfcC3aft0hclUAiim93WL','2015-02-09 22:10:35','2015-02-09 22:14:19'),(53,2,'testu','$2y$10$IC/gB1fKSAJMdc6aKyx66e7V/7WmpnyJCG7j8MNXyWGuDT2LWaq0G','test@gmail.com',0,'vIUFz52IIYK8o9HMzNplXT8ELRnCo5kHXDa4QpGMlFQjiwlCQGES4q1qDLcJ','2015-02-09 22:14:47','2015-02-09 22:16:05'),(54,2,'xdxd','$2y$10$/Ewc4nEMWHM8HLadiQGX3eZ3fp0/2nVBBZTQSfoOX1yOf.Brwy4u6','xdxd@gmail.com',0,'2EckQ5Ca5CWX3WhE317NplInnU38xls6hRYgd1LeDQzQaOamHvZe0j33uCHk','2015-02-09 22:16:21','2015-02-09 22:17:20'),(55,2,'cfc','$2y$10$cx0/CioFE8fYEP97xTPSUOlgg4cX.OLWwONCAIBrUDWafv1Nr9pCm','de@de.com',0,'hYp5Zi4KSevcKo30rlbkZcHO73tCoYfP23uGSIh1nWgN6QHri24N2xhr7e6r','2015-02-09 22:17:42','2015-02-09 22:18:26'),(56,2,'vgvg','$2y$10$3PZKP7FMqcz7RwmhTlKFX.EaJyfYXq79DurOx4dzF3TIdU6yj7Psu','sw@hot.com',0,'hSh71D7WaVaW3xW8GKIhIJ2cT99RJjUJxOFYLd18yJdGsPWlPGGjtcsS84p5','2015-02-09 22:18:57','2015-02-09 22:24:21'),(57,2,'vgvgvg','$2y$10$AEuBQyrBESHKXJ/9VFWm6.YNwt5W7LH5S5jhpFixRP1U/Z7pmOq3u','fvfvf@gma.com',0,NULL,'2015-02-09 22:24:38','2015-02-09 22:24:38'),(58,2,'vgfvgvg','$2y$10$4N4/1iKn/4MMnqBJjUv7Yuxp1.IZMOfGMDhIzEdPBxfnfnbB1pC5C','falgg@hotmail.com',0,NULL,'2015-02-09 22:26:26','2015-02-09 22:26:26'),(60,2,'juanpedro','$2y$10$ZuTDOfRM5tpy2lrfvP7gW.Beh15BAoeN/KiRuh0Q6Q3PyBwCIbdYS','jpedroj@hotmail.com',0,NULL,'2015-02-09 22:28:03','2015-02-09 22:28:03'),(61,2,'juanpedroy','$2y$10$fkpCAEpCPCv65zrDHUicd.d.e3fOQTE64qBPl9wWm6bMoSARl83X.','jpedrojy@hotmail.com',0,NULL,'2015-02-09 22:28:30','2015-02-09 22:28:30'),(62,2,'juanpedroyt','$2y$10$H74q7jvcCHQbRrmtA4z0XuVed.j.r0WHN10RGv2xL2gwT/OmpiOxy','jpedrojyv@hotmail.com',0,NULL,'2015-02-09 22:30:19','2015-02-09 22:30:19'),(63,2,'junaco','$2y$10$/MWxPjFfxDfKcuUQuyazru4IPvRiZKtcXaaCBcC9TInKnjyEWzbL6','huhu@gm.com',0,NULL,'2015-02-09 22:31:29','2015-02-09 22:31:29'),(64,2,'jaca','$2y$10$1o.GdFbgCtgpHTGaD0lYvuM7o2tRPb7Cr49cP2.UGpNVQxAMbOhcW','op@hu.com',0,NULL,'2015-02-09 22:32:06','2015-02-09 22:32:06'),(65,2,'jacae','$2y$10$SM4RGCrvGxKaVeD/zSIMq.u.Q20u2A9fnqyj0hh7q2pelZYOIkc1W','opf@hu.com',0,NULL,'2015-02-09 22:33:14','2015-02-09 22:33:14'),(66,2,'jojoj','$2y$10$WMR1J64DhSITOaOj2z8LbuwfiIYHNyscVyBZ87VufpBjyBHk1ZDSC','jdxd@de.com',0,NULL,'2015-02-09 22:35:06','2015-02-09 22:35:06'),(67,2,'jojojfff','$2y$10$ua7yMlUJ9W8taAb7cKHte.LGAiECJjSGHHIhWBqm/Djilug11/UNe','jdxdf@de.com',0,NULL,'2015-02-09 22:38:18','2015-02-09 22:38:18'),(68,2,'jojojfffg','$2y$10$d2p9.1f8qO9UOj4Rh7Hgg.YasUEhJ.usbIfiPdm8lKvCqVOHv/6g.','jdxddf@de.com',0,NULL,'2015-02-09 22:38:51','2015-02-09 22:38:51'),(69,2,'eventaso','$2y$10$B6pBAOwsF3DyYUCez2rac.8.YeDQPdU8XFcojtGShfQNfWsDg6Jkm','eventaso@de.com',0,NULL,'2015-02-09 22:40:36','2015-02-09 22:40:36'),(70,2,'eventaso2','$2y$10$nO0Oi/iZxrWguysftT/PhewnGF1z8ucZfQNCJtrwU9Lgh73QAs6wW','eventaso2@de.com',0,'eQDEhgBMQVex73EehmY6uub6uPtMr0JhoXqt0lQO2GZhc1Wm55WWasFgmJsu','2015-02-09 22:41:08','2015-02-09 22:41:58'),(71,2,'eventaso3','$2y$10$L7amMWQMSDQcz1eKQbvxaejUBqfBhK5hvKo9WosbloWwamXidFsFC','pedropa@ha.com',0,'Jjqzho89U1n7wd7ceWIYOo0WzJTz4C6rBx5D2drlsjWC9dYym2mAwZK9KGNX','2015-02-09 22:42:21','2015-02-09 22:44:37'),(72,2,'eventaso4','$2y$10$HglgYFyTwvB5rsP4Cpr7SOVQcxk83ix1.n5g22nqOYE5oQNg.rX9K','sw@hota.com',0,NULL,'2015-02-09 22:45:01','2015-02-09 22:45:01'),(73,2,'pedroParamesio','$2y$10$D94Rmc0KauTHA.7.6KP3zuO13Z7EeITNBUfFu5z.ezcfWNb6aYRua','pedroparamesio@yuca.com',0,'AelK1jiwVkMdFuiW0XfBgYctyjCdLEdNkG8REZst4Bo0JMtfUZTaGvTFs6Oa','2015-02-18 22:44:35','2015-02-18 23:11:44'),(74,2,'fromcero','$2y$10$CYaUTHlY9az5YzB/9wrGWuvJQf5gDVR2NnccTKnS6RHwa0X28mSSK','fromcero@cero.com',0,'pAIBRfsrZRO0PELwDdGqwOpWSIWaGpHpUICojxxlB2dlCNMkvZAVBhRL2Hvb','2015-02-18 23:12:04','2015-02-18 23:51:27'),(75,2,'franc015','$2y$10$wk7ZX2kl5gPB98vszkZqRebwuxwcPPBSK/MrLWfq5XT6KsS8DhOD2','jfandradea1234@gmail.com',0,'JS1y5OqV6VyiQz8RuboaBH0YuOmzzYuTqepieOHKtdr2X2taBu6vVrNDN755','2015-02-19 17:32:00','2015-02-19 21:25:10'),(76,2,'paramesio2','$2y$10$xihOhVwz4PcZtCl6avJ9euQt8g4x23JekckvxBH1uS1FkYCkdunt.','paremsio@bicho.com',0,NULL,'2015-02-19 21:25:41','2015-02-19 23:06:42'),(77,2,'jeansoi','$2y$10$29L3z/oxqO7m733YrY3Ujulww.1HSKTCcexDUYmv3zB0Im297zeK.','jsoi@gmail.com',0,NULL,'2015-03-11 03:29:23','2015-03-11 03:29:23'),(78,2,'jeansoi015','$2y$10$y.j4bp1J8vM80Ec4YHs/0u3TwNPW1tndeNCZ0dnShZlW/vXWgBXj2','jsoi08@gmail.com',0,'C30E9sIFHarx6OuSiz0ZYwwgKDzsMRc1gVckrPQgEdHE06zQDV6YUo6zO7No','2015-03-11 03:31:31','2015-03-11 03:36:23'),(79,2,'jmanuel','$2y$10$chk6yphMS6qnXdIBHMxtM./SywIptEwnszq9rItyBRiYPdWVojrfW','jmanuelpedro@carlos.com',0,'Z7BIR4zckUBbwPShs0NfrHL9RIMj1Z2jxuYgYEOTC5IghTbRlmc8sgEkCp9G','2015-04-15 00:05:35','2015-04-29 21:21:19'),(80,2,'juan2dado','$2y$10$1CQoyd0XneqlJwyqLgBEAO.xmzhnwKqeUlX6ACCt4gGaZLE2w8OMO','dosdadocabello@hotmail.com',0,'ahcZbqQdhYi1Ajfqm2HBjjG52nPI1FSzkiQraxZtCCsF1NLfOjBwMDI7L9Pd','2015-04-27 22:55:16','2015-04-27 22:58:36'),(81,2,'tresdado','$2y$10$uUT5lGQibVPWSFXiwfi5X.J9Fd2X75WTqoXGo1iIKkMpCR88z6xF2','dosdadocabello2@hotmail.com',0,NULL,'2015-04-27 22:59:15','2015-04-27 22:59:15'),(82,2,'tresdado2','$2y$10$WcTiLc7KOBDOdEmFgYkUIeDJ00jiFIJrgcMMbJGk48qL03Lsg18oS','dosdadocabello3@hotmail.com',0,NULL,'2015-04-27 23:00:04','2015-04-27 23:00:04'),(83,2,'tresdado4','$2y$10$bB6/28G1raqZmUl3fOZbueHWTT0lCjHcQTbYBtqfon/aqmtk5LUJy','dosdadocabello4@hotmail.com',0,NULL,'2015-04-27 23:02:30','2015-04-27 23:02:30'),(84,2,'tresdado7','$2y$10$hDEiJmeKUJ3Q.pG6syPHVuV1wivunxnjl93A0OGxRA0bxHaSXNAja','dosdadocabello9@hotmail.com',0,NULL,'2015-04-27 23:03:09','2015-04-27 23:03:09'),(85,2,'tereso','$2y$10$9Ur7qemJYnVICBc50wcF.OGRBpBZBm778nTRkQ64Ixqy8lqv83KZi','tereso@gmail.com',0,'ygW80fhNdaYl26usQJYVG9SDkAUnH2VdXyDYR24axkLnN7VbUGgeD214sCTE','2015-04-27 23:03:56','2015-04-27 23:08:23'),(86,2,'vinicio','$2y$10$2Aj7k/pQ4citCgEbwRIbzuwfMFMercwddDLJM3qgNDSgdlNnaXn1.','va@hotmail.com',0,'Omb0u2hZFQt1nL8ESQZkMqGM87kENwZlQzYj7rIFq1YI60kGl4V0ZLwNbNeg','2015-04-27 23:08:55','2015-04-27 23:17:16'),(87,2,'roc015','$2y$10$acQ3fBUIom5a5wv/rRRz0OwOOPR2taoRqNyfRJ75rn33TMTEzHVjW','roca@gmail.com',0,'UzuPbKNcTWBMd2U3IozIiiHfVfQndG13QY7loPhn2qVDxYXVpgVwswxSxqKW','2015-04-27 23:17:43','2015-05-01 22:23:56'),(88,2,'tierraNJ','$2y$10$kUr8vMIwFJRUIpwYt3pzl.oRD5qJNinuqMpkO51/VNus4y4rI3q7S','tierranunca@jamas.com',0,'YDk4HMSwHmd1xHO7OXNoHjewPhyZpZSRVXYJBhMVAj1AQO8DI3iWj368gu6C','2015-04-29 21:22:07','2015-05-09 00:45:26'),(89,2,'nouveau','$2y$10$XJ.42Z71ZmbBlI2q9lm59u5vxvMlT.wKqvRL/3JtgydulriXeutk.','nouveau@hotmail.com',0,NULL,'2015-05-09 00:46:03','2015-05-09 00:46:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertypes`
--

DROP TABLE IF EXISTS `usertypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usertypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Type of user: Admin, Co-owner, Board, etc.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertypes`
--

LOCK TABLES `usertypes` WRITE;
/*!40000 ALTER TABLE `usertypes` DISABLE KEYS */;
INSERT INTO `usertypes` VALUES (1,'Guest',NULL,NULL),(2,'Subscriber',NULL,NULL),(3,'Administrator',NULL,NULL),(4,'Client',NULL,NULL);
/*!40000 ALTER TABLE `usertypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventages`
--

DROP TABLE IF EXISTS `ventages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `saleable_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventages`
--

LOCK TABLES `ventages` WRITE;
/*!40000 ALTER TABLE `ventages` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-16  0:01:06
