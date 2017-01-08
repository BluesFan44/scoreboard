CREATE TABLE `tblevents` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `eventTitle` varchar(20) NOT NULL,
  `rounds` int(11) NOT NULL,
  `teams` int(11) NOT NULL,
  `currentevent` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`eventID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

