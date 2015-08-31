 
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
	`email` varchar(50) NOT NULL
);
 
 
INSERT INTO `users` (`username`, `password`, `email`) VALUES
('Murphy','x5800', 'dmurphy@foo.com'),
('Patterson','x4611', 'mpatterso@foo.com'),
('Firrelli','x9273', 'jfirrelli@foo.com'),
('Patterson','x4871', 'wpatterson@foo.com'),
('Bondur','x5408', 'gbondur@foo.com'),
('Bow','x5428', 'abow@foo.com'),
('Jennings','x3291', 'ljennings@foo.com'),
('Thompson','x4065', 'lthompson@foo.com');