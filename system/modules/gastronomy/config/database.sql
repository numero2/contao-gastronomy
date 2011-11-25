-- 
-- Table `tl_gastronomy_locals`
-- 

CREATE TABLE `tl_gastronomy_locals` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `description` text NULL,
  `opening_times` varchar(255) NOT NULL default '',
  `logo` varchar(255) NOT NULL default ''
  `main_image` varchar(255) NOT NULL default ''
  `addr_street` varchar(255) NOT NULL default '',
  `addr_postal` varchar(255) NOT NULL default '',
  `addr_city` varchar(255) NOT NULL default '',
  `cont_phone` varchar(255) NOT NULL default '',
  `jumpTo` int(10) unsigned NOT NULL default '0'
  PRIMARY KEY  (`id`),
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_gastronomy_dailymenus`
-- 

CREATE TABLE `tl_gastronomy_dailymenus` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `date` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `price` float(8,2) NOT NULL default '0.00',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `dailymenu_list_tpl` varchar(32) NOT NULL default '',
  `dailymenu_list_locals` varchar(32) NOT NULL default '',
  `dailymenu_num_days` int(2) unsigned NOT NULL default '0',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table `tl_user`
-- 

CREATE TABLE `tl_user` (
  `gastronomy_locals_list` blob NULL,
  `gastronomy_locals_permissions` blob NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
