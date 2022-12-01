CREATE DATABASE `exercicio03` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

use `exercicio03`;

CREATE TABLE `usuario` (
    `id` INT UNSIGNED NULL AUTO_INCREMENT,
    `cpf` VARCHAR(11) NOT NULL,
    `nome` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
) COLLATE = 'utf8mb4_general_ci';

CREATE TABLE `info` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `cpf` VARCHAR(11) NOT NULL COLLATE 'utf8mb4_general_ci',
    `genero` CHAR(1) NOT NULL COLLATE 'utf8mb4_general_ci',
    `ano_nascimento` YEAR NOT NULL,
    PRIMARY KEY (`id`) USING BTREE
) COLLATE = 'utf8mb4_general_ci';

INSERT INTO `usuario` (`id`, `cpf`, `nome`) VALUES (1, '16798125050', 'Luke Skywalker');
INSERT INTO `usuario` (`id`, `cpf`, `nome`) VALUES (2, '59875804045', 'Bruce Wayne');
INSERT INTO `usuario` (`id`, `cpf`, `nome`) VALUES (3, '04707649025', 'Diane Prince');
INSERT INTO `usuario` (`id`, `cpf`, `nome`) VALUES (4, '21142450040', 'Bruce Banner');
INSERT INTO `usuario` (`id`, `cpf`, `nome`) VALUES (5, '83257946074', 'Harley Quinn');
INSERT INTO `usuario` (`id`, `cpf`, `nome`) VALUES (6, '07583509025', 'Peter Parker');

INSERT INTO `info` (`id`, `cpf`, `genero`, `ano_nascimento`) VALUES (1, '16798125050', 'M', '1976');
INSERT INTO `info` (`id`, `cpf`, `genero`, `ano_nascimento`) VALUES (2, '59875804045', 'M', '1960');
INSERT INTO `info` (`id`, `cpf`, `genero`, `ano_nascimento`) VALUES (3, '04707649025', 'F', '1988');
INSERT INTO `info` (`id`, `cpf`, `genero`, `ano_nascimento`) VALUES (4, '21142450040', 'M', '1954');
INSERT INTO `info` (`id`, `cpf`, `genero`, `ano_nascimento`) VALUES (5, '83257946074', 'F', '1970');
INSERT INTO `info` (`id`, `cpf`, `genero`, `ano_nascimento`) VALUES (6, '07583509025', 'M', '1972');

SELECT
	CONCAT(a.nome, ' - ', b.genero) AS usuario, 
	CASE 
		WHEN (YEAR(CURRENT_DATE) - b.ano_nascimento) > 50
		THEN 'SIM'
	ELSE 'NÃO' END AS maior_50_anos
FROM usuario a
	INNER JOIN info b ON b.cpf = a.cpf
WHERE b.genero = 'M'
ORDER BY a.cpf ASC 
LIMIT 3;