-- MySQL dump 10.13  Distrib 9.2.0, for macos14.7 (arm64)
--
-- Host: localhost    Database: afirmacje
-- ------------------------------------------------------
-- Server version	9.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `afirmacje`
--

DROP TABLE IF EXISTS `afirmacje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `afirmacje` (
  `id` int NOT NULL AUTO_INCREMENT,
  `problem` varchar(355) DEFAULT NULL,
  `problemFormat` varchar(300) NOT NULL,
  `pPrzyczyna` varchar(355) DEFAULT NULL,
  `nowyWzorzec` varchar(355) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afirmacje`
--

LOCK TABLES `afirmacje` WRITE;
/*!40000 ALTER TABLE `afirmacje` DISABLE KEYS */;
INSERT INTO `afirmacje` VALUES (57,'Addisona Choroba (nadnercza)','addisona choroba (nadnercza)','Dotkliwe „niedożywienie\" emocjonalne. Złość na siebie.','Z miłością troszczę się o moje ciało, mój umysł i moje emocje.'),(58,'AIDS','aids','Poczucie beznadziejności i rozpaczy. „Nikt o mnie nie dba\". Silne przeświadczenie, że nie jest się dość dobrym. Wyparcie się siebie. Poczucie winy na tle seksualnym.','Jestem częścią Wszechświata. Jestem ważny i kochany przez samo Życie. Jestem silny i uzdolniony. Kocham siebie i wysoko siebie cenię.'),(59,'Aktywność nadmierna','aktywnosc nadmierna','Lęk. Uczucie przytłoczenia.','Jestem bezpieczny. Znika wszelkie napięcie. Jestem wystarczająco dobry.'),(60,'Alergia (uczulenie)','alergia (uczulenie)','Na kogo jesteś uczulony? Wypieranie się własnej mocy.','Świat jest bezpieczny i przyjazny. Jestem bezpieczny. Jestem w zgodzie z życiem.'),(61,'Alkoholizm','alkoholizm','„Po co to wszystko\"? Poczucie daremności, winy, nie nadawania się.','Żyję w teraźniejszości. Każda chwila jest nowa. Chcę widzieć swoją wartość. Kocham i akceptuję siebie.'),(62,'Alzheimera choroba','alzheimera choroba','Opór przed doświadczaniem świata takim, jaki jest. Brak nadziei i bezradność. Gniew.','Zawsze istnieje dla mnie nowa, lepsza droga doświadczania życia. Wybaczam sobie przeszłość i uwalniam ją. Podążam naprzód ku radości.'),(63,'Amnezja (utrata pamięci)','amnezja (utrata pamieci)','Lęk. Ucieczka od życia. Niezdolność do obrony swojego ja.','Ufam swojej inteligencji i odwadze, mam poczucie własnej wartości. Bezpiecznie jest żyć.'),(64,'Angina, dyfteryt','angina, dyfteryt','Silne przekonanie, że nie możesz wyrażać siebie i prosić o to, czego potrzebujesz.','Zasługuję na to, by moje potrzeby zostały spełnione. Z miłością i bez trudu proszę o to, czego potrzebuję i dostaję to.'),(65,'Anemia','anemia','Postawa „tak, ale...\". Brak radości, lęk przed życiem. Poczucie, że nie jest się „dość dobrym\".','Bezpiecznie jest przeżywać radość w każdej dziedzinie mojego życia. Kocham życie.'),(66,'Anemia sierpowata','anemia sierpowata','„To dziecko nie jest dość dobre\" — przekonanie, które niszczy każdą radość życia.','To dziecko żyje i oddycha radością życia i żywi się miłością. Bóg czyni cuda każdego dnia.'),(67,'Apatia','apatia','Ucieczka przed odczuwaniem. Tłumienie swojego ja. Lęk.','Bezpiecznie jest odczuwać. Otwieram się na życie. Chcę doświadczać życia.'),(68,'Apetyt — nadmierny','apetyt — nadmierny','Lęk. Potrzeba ochrony. Osądzanie swoich uczuć.','Jestem bezpieczny. Bezpiecznie jest czuć. Moje uczucia są normalne i godne akceptacji.'),(69,'Apetyt — utrata','apetyt — utrata','Lęk. Ochranianie siebie. Nieufność wobec życia.','Kocham i aprobuję siebie. Jestem bezpieczny. Życie jest bezpieczne i radosne.'),(70,'Arterioskleroza (miażdżyca)','arterioskleroza (miazdzyca)','Opór, napięcie. Zatwardziałość, ciasnota umysłowa. Niechęć do dostrzegania dobra.','Jestem zupełnie otwarty dla życia i radości. Chcę widzieć oczami miłości.');
/*!40000 ALTER TABLE `afirmacje` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-01 16:00:59
