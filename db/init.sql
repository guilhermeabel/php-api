CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document` varchar(255) NOT NULL,
  `name` varchar(255),
  `email` varchar(255) NOT NULL,
  `phone` varchar(255),
  `password` varchar(255),
  PRIMARY KEY (`id`)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

INSERT INTO `users` (`id`,`document`, `name`, `email`, `password`) VALUES
(1,'000.000.000-91', 'Admin', 'admin@gmail.com', '123456');
