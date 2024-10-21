/*create guset table*/
create table Guest(
  GID int,
  GName varchar(20),
  Email varchar(30),
  Tel varchar(10),
  constraint Guest_PK PRIMARY KEY(GID)
 );
 
 /*create donation table*/
 create table Donation(
   DID int,
   D_Date DATE,
   Email varchar(30),
   Reason varchar(50),
   GuestID int,
   constraint Donation_PK PRIMARY KEY(DID),
   constraint Donation_GuestID_FK FOREIGN KEY(GuestID) REFERENCES Guest(GID)
);

/*create table admin*/
create table SAdmin(
  Admin_ID int,
  Email varchar(50),
  APassword varchar(20),
  F_Name varchar (10),
  L_Name varchar(20),
  Postal_code int,
  House_no varchar(5),
  Street varchar(20),
  DOB DATE,
  Gender varchar(6),
  constraint SAdmin_PK PRIMARY KEY(Admin_ID)
 
);

/*create table admin_tel*/
create table Ad_Telephone(
  Tel varchar(20),
  AID int,
  constraint Ad_Telephone_PK PRIMARY KEY(Tel),
  constraint Ad_Telephone_AID_FK FOREIGN KEY(AID) REFERENCES SAdmin(Admin_ID)
);

/*create table support staff*/
create table Support_Staff(
  STID int,
  SPassword varchar(20),
  F_Name varchar (10),
  L_Name varchar(15),
  Postal_code int,
  House_no varchar(5),
  Street varchar(20),
  DOB DATE,
  Gender varchar(6),
  Email varchar(50),
  AID int,
  constraint Support_Staff_PK PRIMARY KEY(STID),
  constraint Support_Staff_AID_FK FOREIGN KEY(AID) REFERENCES SAdmin(Admin_ID)
);

/*create table support staff telephone*/
create table SupS_Telephone(
  Tel varchar(10),
  STID int,
  constraint SupS_Telephone_PK PRIMARY KEY(Tel),
  constraint SupS_Telephone_FK FOREIGN KEY(STID) REFERENCES Support_Staff(STID)
);

/*create table doctor*/
create table Doctor(
  DoctorID int,
  DPassword varchar(20),
  F_Name varchar(10),
  L_Name varchar(10),
  Postal_code int,
  House_no varchar(5),
  Street varchar(20),
  DOB DATE,
  Gender varchar(6),
  Email varchar(50),
  AID int,
  constraint Doctor_PK PRIMARY KEY(DoctorID),
  constraint Doctor_FK FOREIGN KEY(AID) REFERENCES SAdmin(Admin_ID)
);

/*create table Doctor telephone*/
create table DR_Telephone(
  Tel varchar(20),
  Doc_ID int,
  constraint DR_Telephone_PK PRIMARY KEY(Tel),
  constraint DR_Telephone_FK FOREIGN KEY(Doc_ID) REFERENCES Doctor(DoctorID)
);

/*create table Patient*/
create table Patient(
  PatientID int,
  PPassword varchar(20),
  F_Name varchar(10),
  L_Name varchar(10),
  Postal_code int,
  House_no varchar(5),
  Street varchar(20),
  DOB DATE,
  Gender varchar(6),
  Email varchar(50),
  constraint Patient_PK PRIMARY KEY(PatientID),
);

/*create table Patient telephone*/
create table patient_Telephone(
  Tel varchar(10),
  PID int,
  constraint patient_Telephone_PK PRIMARY KEY(Tel),
  constraint patient_Telephone_FK FOREIGN KEY(PID) REFERENCES Patient(PatientID)
);
 
 /*create table medical records*/
create table Medical_Records(
  MID int,
  PatientID int,
  PDesc varchar(100),
  MDate DATE,
  constraint Medical_Records_PK PRIMARY KEY(MID),
  constraint Medical_Records_FK FOREIGN KEY(PatientID) REFERENCES Patient(PatientID)
);

/*create table Appointment*/
create table Appointment(
  Appoint_ID int,
  ADesc varchar(100),
  ADate DATE,
  PID int,
  Doc_ID int,
  F_Name varchar(10),
  L_Name varchar(10),
  constraint Appintment_PK PRIMARY KEY(Appoint_ID),
  constraint Appintment_PID_FK FOREIGN KEY(PID) REFERENCES Patient(PatientID),
  constraint Appintment_DOC_FK FOREIGN KEY(Doc_ID) REFERENCES Doctor(DoctorID)
);

/*create table Prescription*/
create table Prescription(
  PrescripID int,
  Doc_ID int,
  PDate DATE,
  PID int,
  PContent varchar(250),
  constraint Prescription_PK PRIMARY KEY(PrescripID),
  constraint Prescription_DOC_FK FOREIGN KEY(Doc_ID) REFERENCES Doctor(DoctorID),
  constraint Prescription_PID_FK FOREIGN KEY(PID) REFERENCES Patient(PatientID)
);


CREATE TABLE Feedback (
  FID int,
  F_Date DATE,
  Comment varchar(300),
  GuestID int,
  AID int,
  PID int NOT NULL, -- Set PID to NOT NULL
  CONSTRAINT Feedback_PK PRIMARY KEY(FID),
  CONSTRAINT Feedback_GuestID_FK FOREIGN KEY(GuestID) REFERENCES Guest(GID),
  CONSTRAINT Feedback_AID_FK FOREIGN KEY(AID) REFERENCES SAdmin(Admin_ID),
  CONSTRAINT Feedback_PID_FK FOREIGN KEY(PID) REFERENCES Patient(PatientID)
);


/*create table blog*/
create table Blog(
  Blog_ID int,
  BDesc varchar(1000),
  Title varchar(70),
  BImage varchar(250),
  constraint Blog_PK PRIMARY KEY(Blog_ID)
);

/*create table blog post*/
create table Blog_POST(
  POST_ID int,
  Blog_ID int,
  Sup_ID int,
  constraint Blog_POST_PK PRIMARY KEY(POST_ID),
  constraint Blog_ID_FK FOREIGN KEY(Blog_ID) REFERENCES Blog(Blog_ID),
  constraint Blog_SUP_FK FOREIGN KEY(Sup_ID) REFERENCES Support_Staff(STID)
);

/*insert guset table*/
INSERT INTO Guest (GID, GName, Email, Tel) VALUES
(1, 'John', 'john@example.com', '1234567890'),
(2, 'Alice', 'alice@example.com', '9876543210'),
(3, 'Bob', 'bob@example.com', '5551234567'),
(4, 'Emily', 'emily@example.com', '1112223333'),
(5, 'David', 'david@example.com', '4445556666');

/*insert donation table*/
INSERT INTO Donation (DID, D_Date, Email, Reason, GuestID) VALUES
(1, '2024-04-01', 'john@example.com', 'Medical research', 1),
(2, '2024-04-02', 'alice@example.com', 'Charity event', 2),
(3, '2024-04-03', 'bob@example.com', 'Disaster relief', 3),
(4, '2024-04-04', 'emily@example.com', 'Education fund', 4),
(5, '2024-04-05', 'david@example.com', 'Healthcare support', 5);

/*insert Admin table*/
INSERT INTO SAdmin (Admin_ID, Email, APassword, F_Name, L_Name, Postal_code, House_no, Street, DOB, Gender) VALUES
(1, 'admin1@example.com', 'adminpass1', 'Admin', 'One', 12345, 'A1', 'Street One', '1990-01-01', 'Male'),
(2, 'admin2@example.com', 'adminpass2', 'Admin', 'Two', 54321, 'A2', 'Street Two', '1995-05-05', 'Female'),
(3, 'admin3@example.com', 'adminpass3', 'Admin', 'Three', 67890, 'A3', 'Street Three', '1985-10-10', 'Male'),
(4, 'admin4@example.com', 'adminpass4', 'Admin', 'Four', 98765, 'A4', 'Street Four', '1980-12-12', 'Female'),
(5, 'admin5@example.com', 'adminpass5', 'Admin', 'Five', 13579, 'A5', 'Street Five', '1975-07-07', 'Male');

/*insert admin_telephone table*/
INSERT INTO Ad_Telephone (Tel, AID) VALUES
('0771111111', 1),
('0772222222', 2),
('0773333333', 3),
('0774444444', 4),
('0775555555', 5);

/*insert support staff table*/
INSERT INTO Support_Staff (STID, SPassword, F_Name, L_Name, Postal_code, House_no, Street, DOB, Gender, Email, AID) VALUES
(1, 'support1pass',  'Kamal', 'Herath', 11111,'25/b', 'Street One', '1992-02-02', 'Female', 'support1@example.com', 1),
(2, 'support2pass',  'Sanath', 'wijesinghe', 22222,'35/a', 'Street Two', '1993-03-03', 'Male', 'support2@example.com', 2),
(3, 'support3pass',  'Suneth', 'dharmarathne', 33333,'45/c', 'Street Three', '1994-04-04', 'Female', 'support3@example.com', 3),
(4, 'support4pass',  'Kasun', 'manu', 44444, '55/c' ,'Street Four', '1995-05-05', 'Male', 'support4@example.com', 4),
(5, 'support5pass',  'Vidath', 'thilakarathne', 55555, '65/e', 'Street Five', '1996-06-06', 'Female', 'support5@example.com', 5);

/*insert support staff telephone table*/
INSERT INTO SupS_Telephone (Tel, STID) VALUES
('1234567890', 1),
('2345678901', 2),
('3456789012', 3),
('4567890123', 4),
('5678901234', 5);

/*insert doctor table*/
INSERT INTO Doctor (DoctorID, DPassword, F_Name, L_Name, Postal_code, House_no, Street, DOB, Gender, Email, AID) VALUES
(1, 'pass1', 'John', 'Doe', 12345, 'A1', 'Main Street', '1980-01-01', 'Male', 'john@example.com', 1),
(2, 'pass2', 'Alice', 'Smith', 54321, 'B2', 'Park Avenue', '1975-05-05', 'Female', 'alice@example.com', 2),
(3, 'pass3', 'Bob', 'Johnson', 67890, 'C3', 'Elm Street', '1985-10-10', 'Male', 'bob@example.com', 3),
(4, 'pass4', 'Emily', 'Brown', 98765, 'D4', 'Oak Road', '1990-12-12', 'Female', 'emily@example.com', 4),
(5, 'pass5', 'David', 'Wilson', 13579, 'E5', 'Maple Avenue', '1970-07-07', 'Male', 'david@example.com', 5);

/*insert doctor telephone table*/
INSERT INTO DR_Telephone (Tel, Doc_ID) VALUES
('0812222222', 1),
('0111111111', 2),
('0611111111', 3),
('0811111111', 4),
('0111255252', 5);

/*insert patient table*/
INSERT INTO Patient (PatientID, PPassword, F_Name, L_Name, Postal_code, House_no, Street, DOB, Gender, Email) VALUES
(101, 'pass1', 'Michael', 'Johnson', 54321, 'A1', 'Main Street', '1982-03-15', 'Male', 'mic@example.com'),
(102, 'pass2', 'Emily', 'Smith', 67890, 'B2', 'Park Avenue', '1978-07-25', 'Female', 'emi@example.com'),
(103, 'pass3', 'Robert', 'Williams', 98765, 'C3', 'Elm Street', '1990-11-10', 'Male', 'r@example.com'),
(104, 'pass4', 'Jessica', 'Brown', 24680, 'D4', 'Oak Road', '1985-05-12', 'Female', 'jes@example.com'),
(105, 'pass5', 'Christor', 'Davis', 13579, 'E5', 'Maple Avenue', '1976-09-20', 'Male', 'chs@example.com');

/*insert patient telephone table*/
INSERT INTO patient_Telephone (Tel, PID) VALUES
('1234567890', 101),
('2345678901', 102),
('3456789012', 103),
('4567890123', 104),
('5678901234', 105);

/*insert medical records table*/
INSERT INTO Medical_Records (MID, PatientID, PDesc, MDate) VALUES
(1, 101, 'Checkup', '2023-01-05'),
(2, 102, 'X-Ray', '2023-02-10'),
(3, 103, 'Blood Test', '2023-03-15'),
(4, 104, 'MRI Scan', '2023-04-20'),
(5, 105, 'Ultrasound', '2023-05-25');

/*insert appointment table*/
INSERT INTO Appointment (Appoint_ID, ADesc, ADate, PID, Doc_ID, F_Name, L_Name) VALUES
(1, 'General Checkup', '2023-01-10', 101, 1, 'John', 'Doe'),
(2, 'Dental Cleaning', '2023-02-15', 102, 2, 'Alice', 'Smith'),
(3, 'Follow-up Consultation', '2023-03-20', 103, 3, 'Bob', 'Johnson'),
(4, 'Physical Therapy', '2023-04-25', 104, 4, 'Emily', 'Brown'),
(5, 'Surgery Consultation', '2023-05-30', 105, 5, 'David', 'Wilson');


/*insert feedback table*/
INSERT INTO Feedback (FID, F_Date, Comment, PID, AID) VALUES
(1, '2023-01-05', 'Great service!', 101, 1),
(2, '2023-02-10', 'Very helpful staff.', 102, 2);

INSERT INTO Feedback (FID, F_Date, Comment, GuestID, AID, PID) VALUES
(3, '2023-03-15', 'Prompt response.', 1, 1, 103),
(4, '2023-04-20', 'Clean facilities.', 2, 3, 104),
(5, '2023-05-20', 'Clean.', 3, 2, 104);


INSERT INTO Prescription (PrescripID, Doc_ID, PDate, PID, PContent) VALUES
(1, 1, '2023-01-05', 101, 'Take one pill daily for a week.'),
(2, 2, '2023-02-10', 102, 'Apply ointment twice a day for two weeks.'),
(3, 3, '2023-03-15', 103, 'Take antibiotics as prescribed.'),
(4, 4, '2023-04-20', 104, 'Follow up after two weeks for review.'),
(5, 5, '2023-05-25', 105, 'Avoid strenuous activities until next appointment.');

/*insert blog table*/
INSERT INTO Blog (Blog_ID, BDesc, Title, BImage) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur  ', 'First Blog Post', 'image1.jpg'),
(2, 'Nullam hendrerit, sem at convallis porta, ', 'Second Blog Post', 'image2.jpg'),
(3, 'Vivamus quis mi a nisl dignissim blandit. ', 'Third Blog Post', 'image3.jpg'),
(4, 'Suspendisse potenti. Sed tincidunt nisi ', 'Fourth Blog Post', 'image4.jpg'),
(5, 'Proin vitae sapien at quam gravida consequat. ', 'Fifth Blog Post', 'image5.jpg');

/*insert blog post table*/
INSERT INTO Blog_POST (POST_ID, Blog_ID, Sup_ID) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5);


