DROP TABLE IF EXISTS `font`;
CREATE TABLE IF NOT EXISTS `font` (
    `idFont` int NOT NULL AUTO_INCREMENT,
    `nomFont` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`idFont`)
    ) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
