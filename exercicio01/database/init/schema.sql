CREATE DATABASE IF NOT EXISTS exercicio01;

use exercicio01;

CREATE TABLE `users`
(
    `id`       INT(11) NOT NULL AUTO_INCREMENT,
    `name`     VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
    `email`    VARCHAR(100) NOT NULL COLLATE 'utf8mb4_general_ci',
    `username` VARCHAR(30)  NOT NULL COLLATE 'utf8mb4_general_ci',
    `password` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
    `zipcode`  VARCHAR(8)   NOT NULL COLLATE 'utf8mb4_general_ci',
    PRIMARY KEY (`id`) USING BTREE,
    UNIQUE INDEX `username` (`username`) USING BTREE,
    UNIQUE INDEX `email` (`email`) USING BTREE
) COLLATE='utf8mb4_general_ci';

