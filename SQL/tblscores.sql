CREATE TABLE `tblscores` (
  `eventid` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `round1` int(11) DEFAULT NULL,
  `round2` int(11) DEFAULT NULL,
  `round3` int(11) DEFAULT NULL,
  `round4` int(11) DEFAULT NULL,
  `round5` int(11) DEFAULT NULL,
  `round6` int(11) DEFAULT NULL,
  `round7` int(11) DEFAULT NULL,
  `round8` int(11) DEFAULT NULL,
  `round9` int(11) DEFAULT NULL,
  `round10` int(11) DEFAULT NULL,
  `isplaying` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`eventid`,`team`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

