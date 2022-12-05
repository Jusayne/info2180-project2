-- DROP DATABASE IF EXISTS express;
CREATE DATABASE dolphin_crm;
GRANT ALL PRIVILEGES ON dolphin_crm.* TO 'admin'@'localhost' IDENTIFIED BY 'password123';
USE dolphin_crm;



-- DROP TABLE IF EXISTS `users`;
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

INSERT INTO `users` VALUES(1,'Jusayne','Chambers','jusayne123','jusayne123@gmail.com','Admin',CURRENT_TIMESTAMP);

-- DROP TABLE IF EXISTS `customer`;
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

-- DROP TABLE IF EXISTS `device`;
CREATE TABLE `notes` (
  `id` integer(15) NOT NULL auto_increment,
  `contact_id` integer(15) NOT NULL DEFAULT '0',
  `comment` varchar(35) NOT NULL DEFAULT '',
  `created_by` integer(15) NOT NULL DEFAULT '0',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --
-- -- Indexes for table `customer`
-- --
-- ALTER TABLE `customer`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `device`
-- --
-- ALTER TABLE `device`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `payment`
-- --
-- ALTER TABLE `payment`
--   ADD PRIMARY KEY (`paymentid`);

-- --
-- -- Indexes for table `tb_upload`
-- --
-- ALTER TABLE `tb_upload`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `users`
-- --
-- ALTER TABLE `users`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- AUTO_INCREMENT for dumped tables
-- --

-- --
-- -- AUTO_INCREMENT for table `customer`
-- --
-- ALTER TABLE `customer`
--   MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

-- --
-- -- AUTO_INCREMENT for table `device`
-- --
-- ALTER TABLE `device`
--   MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

-- --
-- -- AUTO_INCREMENT for table `payment`
-- --
-- ALTER TABLE `payment`
--   MODIFY `paymentid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

-- --
-- -- AUTO_INCREMENT for table `tb_upload`
-- --
-- ALTER TABLE `tb_upload`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- --
-- -- AUTO_INCREMENT for table `users`
-- --
-- ALTER TABLE `Users`
--   MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
-- COMMIT;

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;