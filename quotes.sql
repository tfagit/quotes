-- Rode essa joça, obtenha tabelas

CREATE TABLE IF NOT EXISTS `largequotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conteudo` varchar(4096) NOT NULL,
  `legenda` varchar(256) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aprovado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

CREATE TABLE IF NOT EXISTS `smallquotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conteudo` varchar(256) NOT NULL,
  `legenda` varchar(256) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aprovado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;
