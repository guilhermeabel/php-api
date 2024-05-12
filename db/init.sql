CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document` varchar(255) NOT NULL,
  `name` varchar(255),
  `email` varchar(255) NOT NULL,
  `phone` varchar(255),
  `password` varchar(255),
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Index by email
CREATE UNIQUE INDEX `email` ON `users` (`email`);

CREATE TABLE `user_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`event_id`) REFERENCES `events`(`id`)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Index by user_id and event_id
CREATE UNIQUE INDEX `user_event` ON `user_events` (`user_id`, `event_id`);

INSERT INTO `users` (`id`,`document`, `name`, `email`, `password`) VALUES
(1,'000.000.000-91', 'Admin', 'admin@gmail.com', '123456');


