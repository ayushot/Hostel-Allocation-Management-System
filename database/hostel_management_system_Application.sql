DROP TABLE IF EXISTS Application;
CREATE TABLE Application (
  Application_id int(100) NOT NULL AUTO_INCREMENT,
  Student_id varchar(255) NOT NULL,
  Hostel_id int(10) NOT NULL,
  Application_status tinyint(1) DEFAULT NULL,
  Room_No int(10) DEFAULT NULL,
  Message varchar(255) DEFAULT NULL,
  PRIMARY KEY (Application_id),
  KEY Student_id (Student_id),
  KEY Hostel_id (Hostel_id),
  CONSTRAINT Application_ibfk_1 FOREIGN KEY (Student_id) REFERENCES Student (Student_id),
  CONSTRAINT Application_ibfk_2 FOREIGN KEY (Hostel_id) REFERENCES Hostel (Hostel_id)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

LOCK TABLES Application WRITE;
/*!40000 ALTER TABLE `Application` DISABLE KEYS */;
INSERT INTO Application VALUES (1,'B160497CS',1,1,NULL,'I am a handicapped, so I would like to have a room at ground floor ');
/*!40000 ALTER TABLE `Application` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-15 14:14:13
