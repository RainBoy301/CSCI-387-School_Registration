DROP TABLE IF EXISTS Users;
SET FOREIGN_KEY_CHECKS = 0;
CREATE TABLE Users (
    userID int NOT NULL PRIMARY KEY auto_increment,
    userName varchar(40) NOT NULL,
    hashed_password varchar(60) NOT NULL,
    userType CHARACTER(1)
) Engine=InnoDB;
SET FOREIGN_KEY_CHECKS = 1;
