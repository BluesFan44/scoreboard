CREATE VIEW `vwscoreboard` AS select `b`.`eventid` AS `eventid`,`b`.`team` AS `team`,`b`.`total` AS `total`,(1 + (select count(0) from `vwrawscores` `a` where (`a`.`total` > `b`.`total`))) AS `place`,`b`.`round1` AS `1`,`b`.`round2` AS `2`,`b`.`round3` AS `3`,`b`.`round4` AS `4`,`b`.`round5` AS `5`,`b`.`round6` AS `6`,`b`.`round7` AS `7`,`b`.`round8` AS `8`,`b`.`round9` AS `9`,`b`.`round10` AS `10` from `vwrawscores` `b` order by `b`.`team`;

