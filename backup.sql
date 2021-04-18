-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2020-03-18 23:32:19.999

-- foreign keys
ALTER TABLE Class
    DROP FOREIGN KEY Class_Course;

ALTER TABLE Enrollment
    DROP FOREIGN KEY Class_Enrollment;

ALTER TABLE Favorite
    DROP FOREIGN KEY Class_Favorite;

ALTER TABLE Enrollment
    DROP FOREIGN KEY Course_Enrollment;

ALTER TABLE Favorite
    DROP FOREIGN KEY Course_Favorite;

ALTER TABLE Course
    DROP FOREIGN KEY Course_Instructor;

ALTER TABLE Course
    DROP FOREIGN KEY Department_Course;

ALTER TABLE Instructor
    DROP FOREIGN KEY Department_Instructor;

ALTER TABLE Enrollment
    DROP FOREIGN KEY Enrollment_Student;

ALTER TABLE Favorite
    DROP FOREIGN KEY Favorite_Student;

ALTER TABLE Class
    DROP FOREIGN KEY Instructor_Class;

ALTER TABLE Instructor
    DROP FOREIGN KEY Instructor_User;

ALTER TABLE Student
    DROP FOREIGN KEY Student_Instructor;

ALTER TABLE Student
    DROP FOREIGN KEY Student_User;

-- tables
DROP TABLE Class;

DROP TABLE Course;

DROP TABLE Department;

DROP TABLE Enrollment;

DROP TABLE Favorite;

DROP TABLE Instructor;

DROP TABLE Student;

DROP TABLE Users;

-- End of file.

-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2020-03-18 23:32:19.999

-- tables
-- Table: Class
CREATE TABLE Class (
    ClassID int NOT NULL AUTO_INCREMENT,
    CourseID int NOT NULL,
    SectionID int NOT NULL,
    InstructorID int NOT NULL,
    Total_Seat int NOT NULL,
    Wait_List int NOT NULL,
    Location varchar(20) NOT NULL,
    Time varchar(20) NOT NULL,
    Day varchar(10) NOT NULL,
    CONSTRAINT Class_pk PRIMARY KEY (ClassID)
);

-- Table: Course
CREATE TABLE Course (
    CourseID int NOT NULL AUTO_INCREMENT,
    Department_code varchar(10) NOT NULL,
    Course_Name varchar(15) NOT NULL,
    Credit int NOT NULL,
    InstructorID int NOT NULL,
    CONSTRAINT Course_pk PRIMARY KEY (CourseID)
) ;

-- Table: Department
CREATE TABLE Department (
    Department_code varchar(10) NOT NULL,
    Department_Name varchar(15) NOT NULL,
    Main_Building varchar(15) NOT NULL,
    CONSTRAINT Department_pk PRIMARY KEY (Department_code)
);

-- Table: Enrollment
CREATE TABLE Enrollment (
    StudentID int NOT NULL,
    CourseID int NOT NULL,
    ClassID int NOT NULL,
    CONSTRAINT Enrollment_pk PRIMARY KEY (StudentID)
);

-- Table: Favorite
CREATE TABLE Favorite (
    StudentID int NOT NULL,
    CourseID int NOT NULL,
    ClassID int NOT NULL,
    CONSTRAINT Favorite_pk PRIMARY KEY (StudentID)
);

-- Table: Instructor
CREATE TABLE Instructor (
    InstructorID int NOT NULL AUTO_INCREMENT,
    First_Name varchar(30) NOT NULL,
    Last_Name varchar(30) NOT NULL,
    Department_code varchar(10) NOT NULL,
    Title varchar(10) NOT NULL,
    Email varchar(30) NOT NULL,
    Office_Hour varchar(30) NOT NULL,
    CONSTRAINT Instructor_pk PRIMARY KEY (InstructorID)
);

-- Table: Student
CREATE TABLE Student (
    StudentID int NOT NULL  AUTO_INCREMENT,
    First_Name varchar(30) NOT NULL,
    Last_Name varchar(20) NOT NULL,
    Birthday varchar(10),
    Status_year varchar(10) NOT NULL,
    Credits_taken int NOT NULL,
    Academic_hold bool NOT NULL,
    Degree varchar(20) NOT NULL,
    GPA double NOT NULL,
    Email varchar(50) NULL,
    advisorID int NOT NULL,
    CONSTRAINT Student_pk PRIMARY KEY (StudentID)
);

-- Table: User
CREATE TABLE Users (
    userID int NOT NULL AUTO_INCREMENT,
    userName varchar(20) NOT NULL,
    hashed_password varchar(60) NOT NULL,
    userType character(1) NOT NULL,
    CONSTRAINT User_pk PRIMARY KEY (userID)
);

-- foreign keys
-- Reference: Class_Course (table: Class)
ALTER TABLE Class ADD CONSTRAINT Class_Course FOREIGN KEY Class_Course (CourseID)
    REFERENCES Course (CourseID);

-- Reference: Class_Enrollment (table: Class)
ALTER TABLE Enrollment ADD CONSTRAINT Class_Enrollment FOREIGN KEY Class_Enrollment (ClassID)
    REFERENCES Class (ClassID);

-- Reference: Class_Favorite (table: Class)
ALTER TABLE Favorite ADD CONSTRAINT Class_Favorite FOREIGN KEY Class_Favorite (ClassID)
    REFERENCES Class (ClassID);

-- Reference: Course_Enrollment (table: Course)
ALTER TABLE Enrollment ADD CONSTRAINT Course_Enrollment FOREIGN KEY Course_Enrollment (CourseID)
    REFERENCES Course (CourseID);

-- Reference: Course_Favorite (table: Course)
ALTER TABLE Favorite ADD CONSTRAINT Course_Favorite FOREIGN KEY Course_Favorite (CourseID)
    REFERENCES Course (CourseID);

-- Reference: Course_Instructor (table: Instructor)
ALTER TABLE Course ADD CONSTRAINT Course_Instructor FOREIGN KEY Course_Instructor (InstructorID)
    REFERENCES Instructor (InstructorID);

-- Reference: Department_Course (table: Department)
ALTER TABLE Course ADD CONSTRAINT Department_Course FOREIGN KEY Department_Course (Department_code)
    REFERENCES Department (Department_code);

-- Reference: Department_Instructor (table: Instructor)
ALTER TABLE Instructor ADD CONSTRAINT Department_Instructor FOREIGN KEY Department_Instructor (Department_code)
    REFERENCES Department (Department_code);

-- Reference: Enrollment_Student (table: Enrollment)
ALTER TABLE Enrollment ADD CONSTRAINT Enrollment_Student FOREIGN KEY Enrollment_Student (StudentID)
    REFERENCES Student (StudentID);

-- Reference: Favorite_Student (table: Favorite)
ALTER TABLE Favorite ADD CONSTRAINT Favorite_Student FOREIGN KEY Favorite_Student (StudentID)
    REFERENCES Student (StudentID);

-- Reference: Instructor_Class (table: Class)
ALTER TABLE Class ADD CONSTRAINT Instructor_Class FOREIGN KEY Instructor_Class (InstructorID)
    REFERENCES Instructor (InstructorID);

-- Reference: Instructor_User (table: Instructor)
ALTER TABLE Instructor ADD CONSTRAINT Instructor_User FOREIGN KEY Instructor_User (InstructorID)
    REFERENCES Users (userID);

-- Reference: Student_Instructor (table: Student)
ALTER TABLE Student ADD CONSTRAINT Student_Instructor FOREIGN KEY Student_Instructor (advisorID)
    REFERENCES Instructor (InstructorID);

-- Reference: Student_User (table: Student)
ALTER TABLE Student ADD CONSTRAINT Student_User FOREIGN KEY Student_User (StudentID)
    REFERENCES Users (userID);

-- End of file.


SET FOREIGN_KEY_CHECKS = 0;

INSERT INTO Student (First_Name, Last_Name, Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("Lena","Oxton","1/1/1990","Senior","50",FALSE, "B.S.C.S","3.5","lena@go.olemiss.edu","3");
INSERT INTO Student (First_Name, Last_Name,Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("Jame","Smith","30/12/2000","Freshman","50",FALSE,"Math","3.4","JS232@go.olemiss.edu","3");
INSERT INTO Student (First_Name, Last_Name,Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("Leo","William","30/12/2000","Freshman","50",FALSE,"Math","3.4","JS232@go.olemiss.edu","4");
INSERT INTO Student (First_Name, Last_Name,Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("Jason","Something","30/12/2000","Freshman","50",FALSE,"Math","3.4","JS232@go.olemiss.edu","4");

INSERT INTO Enrollment(StudentID, CourseID, ClassID)
        values("1","1","1");
INSERT INTO Favorite(StudentID, CourseID, ClassID)
        values("1","1","1");

INSERT INTO Instructor(InstructorID, First_Name, Last_Name, Department_code, Title, Email, Office_Hour)
      VALUES("3","Rhode", "Philip", "CS","Dr.", "Rhode@go.olemiss.edu", "N/A");
INSERT INTO Instructor(InstructorID, First_Name, Last_Name, Department_code, Title, Email, Office_Hour)
      VALUES("4","Joshep", "Carlisle", "CS","Professor", "Joshep@go.olemiss.edu", "N/A");

INSERT INTO Users (userName, hashed_password, userType) VALUES ("student1", "$2y$10$YzRkMmZmZjlkYWQxYmY1ZOdb6MmhrdIN6/cywIjyyok9pJrLPw95.", "S");
INSERT INTO Users (userName, hashed_password, userType) VALUES ("student2", "$2y$10$NmVhNDM0MzM5Yjg5ZjA4M.UobG0q69AzzdzmGEPi1oQ82MEWRdy1i", "S");
INSERT INTO Users (userName, hashed_password, userType) VALUES ("instructor1","$2y$10$MzY0YzViZWViYzRkN2I3M./0KjcKUExZf/ZFdZ5U2oGqvw.CCjbi2", "I");
INSERT INTO Users (userName, hashed_password, userType) VALUES ("instructor2","$2y$10$YWYzNmFjNGI2MWE2YjY1O.EZlEzEWUDdzQbZ5ULdyEIyQHxn7cS8S", "I");


SET FOREIGN_KEY_CHECKS = 1;
