SET FOREIGN_KEY_CHECKS = 0;

INSERT INTO Student (StudentID, First_Name, Last_Name, Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("1","Lena","Oxton","1/1/1990","Senior","50",FALSE, "B.S.C.S","3.5","lena@go.olemiss.edu","3");
INSERT INTO Student (StudentID, First_Name, Last_Name,Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("2","Jame","Smith","30/12/2000","Freshman","50",FALSE,"Math","3.4","JS232@go.olemiss.edu","3");
INSERT INTO Student (StudentID, First_Name, Last_Name,Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("3","Leo","William","30/12/2000","Freshman","50",FALSE,"Math","3.4","JS232@go.olemiss.edu","4");
INSERT INTO Student (StudentID, First_Name, Last_Name,Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("4","Jason","Something","30/12/2000","Freshman","50",FALSE,"Math","3.4","JS232@go.olemiss.edu","4");

INSERT INTO Enrollment(StudentID, ClassID)
        values("1","1");
INSERT INTO Favorite(StudentID, ClassID)
        values("1","1");

INSERT INTO Instructor(InstructorID, First_Name, Last_Name, Department_code, Title, Email, Office_Hour)
      VALUES("3","Rhode", "Philip", "CS","Dr.", "Rhode@go.olemiss.edu", "N/A");
INSERT INTO Instructor(InstructorID, First_Name, Last_Name, Department_code, Title, Email, Office_Hour)
      VALUES("4","Joshep", "Carlisle", "CS","Professor", "Joshep@go.olemiss.edu", "N/A");

INSERT INTO Users (userName, hashed_password, userType) VALUES ("student1", "$2y$10$YzRkMmZmZjlkYWQxYmY1ZOdb6MmhrdIN6/cywIjyyok9pJrLPw95.", "S");
INSERT INTO Users (userName, hashed_password, userType) VALUES ("student2", "$2y$10$NmVhNDM0MzM5Yjg5ZjA4M.UobG0q69AzzdzmGEPi1oQ82MEWRdy1i", "S");
INSERT INTO Users (userName, hashed_password, userType) VALUES ("instructor1","$2y$10$MzY0YzViZWViYzRkN2I3M./0KjcKUExZf/ZFdZ5U2oGqvw.CCjbi2", "I");
INSERT INTO Users (userName, hashed_password, userType) VALUES ("instructor2","$2y$10$YWYzNmFjNGI2MWE2YjY1O.EZlEzEWUDdzQbZ5ULdyEIyQHxn7cS8S", "I");


SET FOREIGN_KEY_CHECKS = 1;
