DROP TABLE IF EXISTS Users;
SET FOREIGN_KEY_CHECKS = 0;
CREATE TABLE Users (
    userID int NOT NULL PRIMARY KEY auto_increment,
    userName varchar(40) NOT NULL,
    userPassword varchar(40) NOT NULL,
    userType VARCHAR(10)
    --FOREIGN KEY (userID) REFERENCES Students(StudentID),
    --test2 to master
) Engine=InnoDB;
