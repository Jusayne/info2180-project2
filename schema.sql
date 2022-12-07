CREATE DATABASE dolphin_crm;
GRANT ALL PRIVILEGES ON dolphin_crm.* TO 'admin'@'localhost' IDENTIFIED BY 'password123';
USE dolphin_crm;

CREATE TABLE `users` (
    `id` integer(15) NOT NULL auto_increment,
    `firstname` varchar(35) NOT NULL default '',
    `lastname` varchar(35) NOT NULL default '',
    `password` varchar(35) NOT NULL default '',
    `email` varchar(35) NOT NULL default '',
    `role` varchar(20) NOT NULL default '',
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (`id`)
);

INSERT INTO `users` VALUES(1,'Jusayne','Chambers','jusayne123','jusayne123@gmail.com','Admin',CURRENT_TIMESTAMP
                           2,'Admin','User','password123','admin@project2.com','Admin',CURRENT_TIMESTAMP);

CREATE TABLE `contacts` (
  `id` int(15) NOT NULL auto_increment,
  `title` varchar(35) NOT NULL DEFAULT '',
  `firstname` varchar(35) NOT NULL DEFAULT '',
  `lastname` varchar(35) NOT NULL DEFAULT '',
  `email` varchar(35) NOT NULL DEFAULT '',
  `telephone` varchar(20) NOT NULL DEFAULT '',
  `company` varchar(35) NOT NULL DEFAULT '',
  `type` varchar(35) NOT NULL DEFAULT '',
  `assigned_to` integer(15) NOT NULL DEFAULT '0',
  `created_by` integer(15) NOT NULL DEFAULT '0',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `notes` (
  `id` integer(15) NOT NULL auto_increment,
  `contact_id` integer(15) NOT NULL DEFAULT '0',
  `comment` varchar(35) NOT NULL DEFAULT '',
  `created_by` integer(15) NOT NULL DEFAULT '0',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

