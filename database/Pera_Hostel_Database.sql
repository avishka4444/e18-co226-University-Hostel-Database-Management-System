DROP DATABASE IF EXISTS Pera_Hostel_Database;
CREATE DATABASE Pera_Hostel_Database;
USE Pera_Hostel_Database;


CREATE TABLE Hostel(
	HostelID CHAR(4) NOT NULL,
	HostelName VARCHAR(30) NOT NULL,
	HostelType VARCHAR(10) NOT NULL,
	FloorCount INT NOT NULL,
	RoomCount INT NOT NULL,
	WashroomCount INT NOT NULL,
	PRIMARY KEY(HostelID)
);



CREATE TABLE Room(
	RoomID CHAR(5) NOT NULL,
    HostelID CHAR(4) NOT NULL,
	RoomNo VARCHAR(5) NOT NULL,
	Capacity INT,
	PRIMARY KEY(RoomID),
	FOREIGN KEY (HostelID) REFERENCES Hostel(HostelID) 
    ON DELETE CASCADE ON UPDATE CASCADE
);




CREATE TABLE Furniture(
	FurnitureID CHAR(4) NOT NULL,
    HostelID CHAR(4) NOT NULL,
	ItemName VARCHAR(30) NOT NULL,
	FurnitureCount INT,
	PRIMARY KEY(FurnitureID),
	FOREIGN KEY (HostelID) REFERENCES Hostel(HostelID) 
    ON DELETE CASCADE ON UPDATE CASCADE
);



CREATE TABLE Student(
	StudentID CHAR(5) NOT NULL,
    RoomID CHAR(5) NOT NULL,
	Stu_FName VARCHAR(50) NOT NULL,
    Stu_LName VARCHAR(50),
	Stu_NIC VARCHAR(15) NOT NULL,
    Stu_PhoneNum CHAR(15),
    Stu_BirthDate DATE,
    Stu_Gender VARCHAR(10) NOT NULL,
    Stu_Address VARCHAR(100),
    Stu_Faculty VARCHAR(50),
    Stu_Batch VARCHAR(15),
    CheckInDate DATE,
    CheckOutDate DATE,
    AmountPaid VARCHAR(10),
	PRIMARY KEY(StudentID),
    FOREIGN KEY (RoomID) REFERENCES Room(RoomID) 
    ON DELETE CASCADE ON UPDATE CASCADE
);




CREATE TABLE Guardian(
	Guar_NIC VARCHAR(15) NOT NULL,
    StudentID CHAR(5) NOT NULL,
    Guar_FName VARCHAR(50) NOT NULL,
    Guar_LName VARCHAR(50),
    Guar_TelNum VARCHAR(15),
    Guar_Email VARCHAR(50),
    Occupation VARCHAR(20),
    Relationship VARCHAR(10),
	PRIMARY KEY(Guar_NIC),
    FOREIGN KEY (StudentID) REFERENCES Student(StudentID) 
    ON DELETE CASCADE ON UPDATE CASCADE
);



CREATE TABLE Login(
	LoginID CHAR(4) NOT NULL,
	UserName VARCHAR(50) NOT NULL,
	Password VARCHAR(10) NOT NULL,
	PRIMARY KEY(LoginID)
);



CREATE TABLE Admin(
	AdminID CHAR(4) NOT NULL,
    LoginID CHAR(4) NOT NULL,
    Admin_FName VARCHAR(50) NOT NULL,
    Admin_LName VARCHAR(50),
	Admin_Email VARCHAR(50),
	PRIMARY KEY(AdminID),
    FOREIGN KEY (LoginID) REFERENCES Login(LoginID)
	ON DELETE CASCADE ON UPDATE CASCADE
);



CREATE TABLE Staff(
	EmpID CHAR(4) NOT NULL,
    HostelID CHAR(4) NOT NULL,
    Emp_FName VARCHAR(50),
    Emp_LName VARCHAR(50),
    Emp_NIC VARCHAR(15),
    Emp_TelNum VARCHAR(15),
    Emp_Email VARCHAR(50),
    Emp_Gender VARCHAR(10),
    Emp_Address VARCHAR(50),
    Emp_JobType VARCHAR(20),
    PRIMARY KEY(EmpID),
	FOREIGN KEY (HostelID) REFERENCES Hostel(HostelID)
	ON DELETE CASCADE ON UPDATE CASCADE
);




CREATE TABLE MinorStaff(
	EmpID CHAR(4) NOT NULL,
	WorkedHours TIME,
	FOREIGN KEY (EmpID) REFERENCES Staff(EmpID)
	ON DELETE CASCADE ON UPDATE CASCADE
);




CREATE TABLE Warden_SubWarden(
	EmpID CHAR(4) NOT NULL,
	LoginID CHAR(4),
    Faculty VARCHAR(50),
    StartDate DATE,
	FOREIGN KEY (EmpID) REFERENCES Staff(EmpID)
	ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (LoginID) REFERENCES Login(LoginID)
	ON DELETE CASCADE ON UPDATE CASCADE
    );




INSERT INTO Hostel VALUES
	('H001','Arunachalam Hall','Male',3,5,3),
    ('H002','Akbar Nell Hall','Male',2,5,4),
    ('H003','Jayathilake Hall','Male',3,5,2),
    ('H004','Marrs Hall','Male',3,5,3),
    ('H005','Marcus Fernando Hall','Male',3,5,4),
    ('H006','New Akbar Hall','Male',2,5,5),
    ('H007','Hindagala Hall','Male',3,5,2),
    ('H008','James Peris Hall','Male',3,5,4),
    ('H009','Ivor Jennings Hall','Male',2,5,6),
    ('H010','Senaka Bibile Hall','Male',3,5,6),
    ('H011','Ramanathan Hall','Female',3,5,6),
    ('H012','Sangamitta Hall','Female',2,5,6),
    ('H013','Hilda Obeysekara Hall','Female',3,5,6),
    ('H014','Wijewardana Hall','Female',3,5,6),
    ('H015','Gunapala Malalasekara','Female',3,5,6),
    ('H016','Ediriweera Sarachchandra','Female',2,5,6),
    ('H017','Sarasavi Madura Hall','Female',3,5,6),
    ('H018','Sarasaviuyana Hall','Female',3,5,6),
    ('H019','Wilagedara Bikku Hostel','Bikku',3,5,6),
    ('H020','Kehelpannala Bikku Hostel','Bikku',3,5,6);



INSERT INTO Room VALUES
	('R0001','H001','1',3),
    ('R0002','H001','2',3),
    ('R0003','H001','3',3),
    ('R0004','H001','4',3),
    ('R0005','H001','5',3),
    
    ('R0006','H002','1',4),
    ('R0007','H002','2',4),
    ('R0008','H002','3',4),
    ('R0009','H002','4',4),
    ('R0010','H002','5',4),
    
    ('R0011','H003','1',3),
    ('R0012','H003','2',3),
    ('R0013','H003','3',3),
    ('R0014','H003','4',3),
    ('R0015','H003','5',3),
    
    ('R0016','H004','1',3),
    ('R0017','H004','2',3),
    ('R0018','H004','3',3),
    ('R0019','H004','4',3),
    ('R0020','H004','5',3),
    
    ('R0021','H005','1',4),
    ('R0022','H005','2',4),
    ('R0023','H005','3',4),
    ('R0024','H005','4',4),
    ('R0025','H005','5',4),
    
    ('R0026','H006','1',3),
    ('R0027','H006','2',3),
    ('R0028','H006','3',3),
    ('R0029','H006','4',3),
    ('R0030','H006','5',3),
    
    ('R0031','H007','1',5),
    ('R0032','H007','2',5),
    ('R0033','H007','3',5),
    ('R0034','H007','4',5),
    ('R0035','H007','5',5),
    
    ('R0036','H008','1',3),
    ('R0037','H008','2',3),
    ('R0038','H008','3',3),
    ('R0039','H008','4',3),
    ('R0040','H008','5',3),
    
    ('R0041','H009','1',4),
    ('R0042','H009','2',4),
    ('R0043','H009','3',4),
    ('R0044','H009','4',4),
    ('R0045','H009','5',4),
    
    ('R0046','H010','1',3),
    ('R0047','H010','2',3),
    ('R0048','H010','3',3),
    ('R0049','H010','4',3),
    ('R0050','H010','5',3),
    
    ('R0051','H011','1',3),
    ('R0052','H011','2',3),
    ('R0053','H011','3',3),
    ('R0054','H011','4',3),
    ('R0055','H011','5',3),
    
    ('R0056','H012','1',4),
    ('R0057','H012','2',4),
    ('R0058','H012','3',4),
    ('R0059','H012','4',4),
    ('R0060','H012','5',4),
    
    ('R0061','H013','1',3),
    ('R0062','H013','2',3),
    ('R0063','H013','3',3),
    ('R0064','H013','4',3),
    ('R0065','H013','5',3),
    
    ('R0066','H014','1',3),
    ('R0067','H014','2',3),
    ('R0068','H014','3',3),
    ('R0069','H014','4',3),
    ('R0070','H014','5',3),
    
    ('R0071','H015','1',3),
    ('R0072','H015','2',3),
    ('R0073','H015','3',3),
    ('R0074','H015','4',3),
    ('R0075','H015','5',3),
    
    ('R0076','H016','1',2),
    ('R0077','H016','2',2),
    ('R0078','H016','3',2),
    ('R0079','H016','4',2),
    ('R0080','H016','5',2),
    
    ('R0081','H017','1',3),
    ('R0082','H017','2',3),
    ('R0083','H017','3',3),
    ('R0084','H017','4',3),
    ('R0085','H017','5',3),
    
    ('R0086','H018','1',3),
    ('R0087','H018','2',3),
    ('R0088','H018','3',3),
    ('R0089','H018','4',3),
    ('R0090','H018','5',3),
    
    ('R0091','H019','1',4),
    ('R0092','H019','2',4),
    ('R0093','H019','3',4),
    ('R0094','H019','4',4),
    ('R0095','H019','5',4),
    
    ('R0096','H020','1',3),
    ('R0097','H020','2',3),
    ('R0098','H020','3',3),
    ('R0099','H020','4',3),
    ('R0100','H020','5',3);



INSERT INTO Furniture VALUES
	('F001','H001','Chairs',5),
    ('F002','H001','Tables',5),
    ('F003','H001','Beds',5),
	
    ('F004','H002','Chairs',10),
    ('F005','H002','Tables',5),
    ('F006','H002','Beds',10),

	('F007','H003','Chairs',10),
    ('F008','H003','Tables',5),
    ('F009','H003','Beds',15),

	('F010','H004','Chairs',5),
    ('F011','H004','Tables',15),
    ('F012','H004','Beds',10),
    
    ('F013','H005','Chairs',15),
    ('F014','H005','Tables',5),
    ('F015','H005','Beds',5),
    
    ('F016','H006','Chairs',15),
    ('F017','H006','Tables',10),
    ('F018','H006','Beds',5),
    
    ('F019','H007','Chairs',5),
    ('F020','H007','Tables',15),
    ('F021','H007','Beds',5),
    
	('F022','H008','Chairs',5),
    ('F023','H008','Tables',15),
    ('F024','H008','Beds',10),
    
	('F025','H009','Chairs',5),
    ('F026','H009','Tables',15),
    ('F027','H009','Beds',10),
    
	('F028','H010','Chairs',5),
    ('F029','H010','Tables',15),
    ('F030','H010','Beds',10),
    
	('F031','H011','Chairs',15),
    ('F032','H011','Tables',10),
    ('F033','H011','Beds',5),
    
	('F034','H012','Chairs',5),
    ('F035','H012','Tables',15),
    ('F036','H012','Beds',10),
    
    ('F037','H013','Chairs',5),
    ('F038','H013','Tables',15),
    ('F039','H013','Beds',5),
    
    ('F040','H014','Chairs',5),
    ('F041','H014','Tables',10),
    ('F042','H014','Beds',5),
    
    ('F043','H015','Chairs',5),
    ('F044','H015','Tables',10),
    ('F045','H015','Beds',5),
    
    ('F046','H016','Chairs',5),
    ('F047','H016','Tables',10),
    ('F048','H016','Beds',5),
    
    ('F049','H017','Chairs',15),
    ('F050','H017','Tables',5),
    ('F051','H017','Beds',10),
    
    ('F052','H018','Chairs',5),
    ('F053','H018','Tables',15),
    ('F054','H018','Beds',10),
    
    ('F055','H019','Chairs',15),
    ('F056','H019','Tables',5),
    ('F057','H019','Beds',10),
    
    ('F058','H020','Chairs',5),
    ('F059','H020','Tables',15),
    ('F060','H020','Beds',10);



INSERT INTO Student VALUES
('S0001','R0003','Madhushan','Prasanna','985562017v','077-6262001','1998-05-28','Male','Galle','Faculty of Engineering','18 Batch','2019-12-07',NULL,'LKR 900/='),
('S0002','R0058','Nirasha','Sewwandi','985562018v','077-6262002','1998-03-23','Female','Karapitiya','Faculty of Arts','18 Batch','2019-12-07',NULL,'LKR 900/='),
('S0003','R0059','Thakshila','Jayathileke','985562019v','077-6262003','1998-07-12','Female','Colombo','Faculty of Dental Sciences','20 Batch','2020-11-06',NULL,'LKR 900/='),
('S0004','R0003','Pasindu','Lokuhetti','985562020v','077-6262004','1998-06-05','Male','Gampaha','Faculty of Engineering','17 Batch','2018-06-04',NULL,'LKR 900/='),
('S0005','R0016','Ishan','Sellahewa','985562021v','077-6262005','1998-09-25','Male','Mathara','Faculty of Engineering','19 Batch','2019-12-07',NULL,'LKR 900/='),
('S0006','R0020','Ramith','Laksara','985562022v','077-6262006','1998-07-06','Male','Galle','Faculty of Engineering','20 Batch','2020-11-06',NULL,'LKR 900/='),
('S0007','R0016','Kaushan','Hasitha','985562023v','077-6262007','1998-12-14','Male','Piliyandala','Faculty of Agriculture','19 Batch','2019-12-07',NULL,'LKR 900/='),
('S0008','R0023','Sandeepa','Prabhash','985562001v','077-6262008','1998-10-30','Male','Moratuwa','Faculty of Medicine','18 Batch','2019-12-07',NULL,'LKR 900/='),
('S0009','R0024','Yohan','Akmeemana','985562002v','077-6262009','1998-01-05','Male','Rathnapura','Faculty of Medicine','18 Batch','2019-12-07',NULL,'LKR 900/='),
('S0010','R0004','Nadun','Nilupul','985562003v','077-6262010','1997-05-25','Male','Ampara','Faculty of Management','20 Batch','2020-11-06',NULL,'LKR 900/='),
('S0011','R0064','Kushani','Piyumika','985562004v','077-6262011','1997-02-28','Female','Kaluthara','Faculty of Allied Health Sciences','17 Batch','2018-06-04',NULL,'LKR 900/='),
('S0012','R0052','Romeshika','Gimhani','985562005v','077-6262012','1999-03-15','Female','Kaluthara','Faculty of Arts','18 Batch','2019-01-12',NULL,'LKR 900/='),
('S0013','R0036','Susira','Gamage','985562006v','077-6262013','1999-04-23','Male','Mathara','Faculty of Allied Health Sciences','20 Batch','2022-01-24',NULL,'LKR 900/='),
('S0014','R0036','Sandun','Weeranayaka','985562007v','077-6262014','1997-06-12','Male','Ampara','Faculty of Veterinary Medicine & Animal Science','19 Batch','2021-03-14',NULL,'LKR 900/='),
('S0015','R0036','Sumal','Hasith','985562008v','077-6262015','1998-08-27','Male','Anuradhapura','Faculty of Medicine','18 Batch','2019-01-18',NULL,'LKR 900/='),
('S0016','R0022','Thisal','Gamage','985562009v','077-6262016','1996-12-12','Male','Rathmalana','Faculty of Science','18 Batch','2019-02-06',NULL,'LKR 900/='),
('S0017','R0022','Tharindu','Illeperuma','985562010v','077-6262017','1999-05-28','Male','Bambalapitiya','Faculty of Dental Sciences','19 Batch','2021-03-24',NULL,'LKR 900/='),
('S0018','R0049','Maneka','Thathsara','985562011v','077-6262018','1997-07-01','Male','Kurunagala','Faculty of Science','18 Batch','2019-02-04',NULL,'LKR 900/='),
("S0019",'R0049','Anuradha','Kalansooriya','985562012v','077-6262019','1996-03-28','Male','Badulla','Faculty of Management','20 Batch','2022-03-22',NULL,'LKR 900/='),
('S0020','R0052','Ovindi','Danuddara','985562013v','077-6262020','1998-01-27','Female','Jaffna','Faculty of Science','20 Batch','2019-01-08',NULL,'LKR 900/='),
('S0021','R0093','Kalaganwaththa','Chanda Wimala Thero','985562014v','077-6262021','1998-10-18','Male','NuwaraEliya','Faculty of Arts','18 Batch','2019-03-02',NULL,'LKR 900/='),
('S0022','R0096','Marthuwela','Samithasiri Thero','985562015v','077-6262022','1998-11-18','Male','Polonnaruwa','Faculty of Arts','19 Batch','2021-03-15',NULL,'LKR 900/='),
('S0023','R0096','Lahugala','Sumanasara Thero','985562016v','077-6262023','1998-09-25','Male','Polonnaruwa','Faculty of Arts','18 Batch','2019-01-10',NULL,'LKR 900/=');




INSERT INTO Guardian VALUES
	('19568988001','S0001','Sirimal','Perera','077-7654211','sirimal@gmail.com','Carpenter','Father'),
    ('19578988002','S0002','Nimal','De Silva','077-7654224','nimal@gmail.com','Engineer','Father'),
    ('19608988003','S0003','Saman','Perera','077-7624271','saman@gmail.com','Doctor','Father'),
    ('19628988004','S0004','Nadesha','Abeywickrama','077-3654212','nadeesha@gmail.com','Teacher','Mother'),
    ('19618988005','S0005','Chandrasiri','De Alwis','077-7655211','chandrasiri@gmail.com','Teacher','Father'),
    ('19688988006','S0006','Pooja','Wanigasekara','077-9854201','pooja@gmail.com','Housewife','Mother'),
    ('19548988007','S0007','Aseka','Perera','077-7654400','aseka@gmail.com','Engineer','Mother'),
    ('19568988008','S0008','Sirimal','Perera','077-7654211','sirimal@gmail.com','Carpenter','Father'),
	('19568988009','S0009','Kanthi','Ranathunga','077-2378456','ranathunga35@gmail.com','Teacher','Mother'),
	('19568988010','S0010','Sathyananda','De Silva','071-2365387','desilva12@gmail.com','Doctor','Father'),
	('19568988011','S0011','Premalal','Rathnayake','077-1999886','rathnayake87@gmail.com','Clerk','Father'),
	('19568988012','S0012','Pradeepika','Gunasekara','077-2889978','gunsekara88@gmail.com','House wife','Mother'),
    ('19568988013','S0013','Ransika','Gamage','077-1432576','gamage45@gmail.com','Teacher','Mother'),
	('19568988014','S0014','Jayantha','Senanayake','071-2233555','senanayake2@gmail.com','Driver','Father'),
    ('19568988015','S0015','Sunimal','Gamage','077-7654215','sunimal@gmail.com','Doctor','Father'),
    ('19568988016','S0016','Kamal','Ginige','077-7654216','kamal@gmail.com','Doctor','Father'),
    ('19568988017','S0017','Aruni','Fernando','077-7654217','aruni@gmail.com','Engineer','Mother'),
    ('19568988018','S0018','Namal','Silva','077-7654218','namal@gmail.com','Driver','Father'),
    ('19568988019','S0019','Kasuni','Perera','077-7654219','kasuni@gmail.com','Housewife','Mother'),
    ('19568988020','S0020','Nirmali','Fernando','077-7654220','nirmali@gmail.com','Doctor','Mother'),
    ('19568988021','S0021','Beragama','Sumana Thero','077-7654221','sumanathero@gmail.com',NULL,'Guardian'),
    ('19568988022','S0022','Passaramulle','Dayawansa Thero','077-7654222','dayawansathero@gmail.com',NULL,'Guardian'),
    ('19568988023','S0023','Mavarala','Sumanaransi Thero','077-7654223','sumanaransithero@gmail.com',NULL,'Guardian');



INSERT INTO Login VALUES
    ('L001','avishkaabeywickrama99@gmail.com','anony4444'),
    ('L002','kkmdealwis@gmail.com','37ep160ic'),
    ('L003','shehan2k@gmail.com','9876543210'),
    ('L004','awickramasooriya@gmail.com','2022021001'),
    ('L005','lalithdehsapriya@gmail.com','2022021002'),
    ('L006','asithab@gmail.com','2022021003'),
    ('L007','karunasiri@yahoo.com','2022021004'),
    ('L008','supunochamara@gmail.com','2022021005'),
    ('L009','nalaka.uop@gmail.com','2022021006'),
    ('L010','shanthaw2003@yahoo.com','2022021007'),
    ('L011','prsadnirosha@gmail.com','2022021008'),
    ('L012','mudithpras@gmail.com','2022021009'),
    ('L013','malwattage1702@gmail.com','2022021010'),
    ('L014','maliniparamaguru@gmail.com','2022021011'),
    ('L015','gangodathanna456@gmail.com','2022021012'),
    ('L016','mallika.pinnawala@gmail.com','2022021013'),
    ('L017','mbandara1@hotmail.com','2022021014'),
    ('L018','chammiatt@pdn.ac.lk','2022021015'),
    ('L019','awickramasooriya@gmail.com','2022021016');
    

    
INSERT INTO Admin VALUES
    ('A001','L001','Avishka','Abeywickrama','avishkaabeywickrama99@gmail.com'),
    ('A002','L002','Muthuni','De Alwis','kkmdealwis@gmail.com'),
    ('A003','L003','Shehan','Madhusanka','shehan2k@gmail.com');



INSERT INTO Staff VALUES
    ('E001','H001','A.K.','Wickramasooriya','19568989001','0779406168','awickramasooriya@gmail.com','Male','Karapitiya, Galle','Warden'),
    ('E002','H001','M.M.L.','Deshapriya','19568989002','0713029930','lalithdehsapriya@gmail.com','Male','Kandy','Sub Warden'),
    ('E003','H002','Dr.Asitha','Bandaranayake','19568989003','0715117771','asithab@gmail.com','Male','Gampaha','Warden'),
    ('E004','H002','W.G.S','Karunasiri','19568989004','0712285793','karunasiri@yahoo.com','Male','Kaluthara','Sub Warden'),
    ('E005','H006','J.A.S.C','Jaysinghe','19568989011','0772209662','supunochamara@gmail.com','Male','Rathnapura','Warden'),
    ('E006','H006','A.N.S.','Kumara','19568989012','0719332200','nalaka.uop@gmail.com','Male','Kandy','Sub Warden'),
    ('E007','H007','Dr.H.M.K. Shantha','Wanninayake','19568989013','0718480806','shanthaw2003@yahoo.com','Male','Galle','Warden'),
    ('E008','H007','P.N.B.','Wijekoon','19568989014','0714705323','prsadnirosha@gmail.com','Male','Badulla','Sub Warden'),
    ('E009','H008','Dr. Muditha Prasannajith','Perera','19568989016','0776657847','mudithpras@gmail.com','Male','Ampara','Warden'),
    ('E010','H008','D.','Malwattage','19568989015','0718133481','malwattage1702@gmail.com','Male','Gampaha','Sub Warden'),
    ('E011','H011','Dr. Malini','Balamayuran','19568989021','0812392068','maliniparamaguru@gmail.com','Female','Badulla','Warden'),
    ('E012','H011','Mrs.N.R.','Gangodathanna','19568989022','0812392027','gangodathanna456@gmail.com','Female','Mathara','Sub Warden'),
    ('E013','H013','Prof.Mallika','Pinnawala','19568989025','0718188147','mallika.pinnawala@gmail.com','Female','Ampara','Warden'),
    ('E014','H013','M.D.T.M.','Menaka','19568989026','0713508800','mbandara1@hotmail.com','Female','Kurunegala','Sub Warden'),
    ('E015','H016','Dr.A.M.Chammi','P.K.Attanayake','19568989031','0813820769','chammiatt@pdn.ac.lk','Female','Kandy','Warden'),
    ('E016','H016','J.M.U.S.K.','Yatigammana','19568989032','0779406168','awickramasooriya@gmail.com','Female','Badulla','Sub Warden'),
    ('E017','H006','K.J.M','Attanayake','19568989033','0713578940','attanayake89@gmail.com','Male','Rathnapura','Clerk'),
    ('E018','H011','A.W.D','Wijeyrathna','19568989034','0772348767','wijeyrathna12@gmail.com','Male','Kandy','Security'),
    ('E019','H016','P.S.K.','Alahakoon','19568989013','0778654782','alahakoon456@yahoo.com','Female','Nuwareliya','Cleaner'),
    ('E020','H003','A.R.J','Jayaweera','19568989014','0715237877','jayaweera124@gmail.com','Male','Badulla','Security'),
    ('E021','H010','G.R.F.','Perera','19568989016','0712323445','pereragr@gmail.com','Female','Ampara','Clerk');



INSERT INTO MinorStaff VALUES
	('E017','32:40:00'),
    ('E018','48:20:00'),
    ('E019','40:10:00'),
    ('E020','32:35:00'),
    ('E021','48:55:00');
    
    
    
INSERT INTO Warden_SubWarden VALUES
	('E001','L004','Faculty of Arts','2018-01-01'),
    ('E002','L005', NULL, '2018-01-02'),
    ('E003','L006','Faculty of Engineering','2017-01-03'),
    ('E004','L007', NULL, '2017-01-04'),
    ('E005','L008','Faculty of Engineering','2019-01-05'),
    ('E006','L009', NULL, '2019-01-06'),
    ('E007','L010','Faculty of Arts','2020-01-07'),
    ('E008','L011', NULL, '2020-01-08'),
    ('E009','L012','Faculty of Arts','2021-01-09'),
    ('E010','L013', NULL, '2021-01-10'),
    ('E011','L014', NULL, '2016-01-11'),
    ('E012','L015', NULL, '2016-01-12'),
    ('E013','L016','Faculty of Arts','2017-01-13'),
    ('E014','L017', NULL, '2017-01-14'),
    ('E015','L018', NULL, '2021-01-15'),
    ('E016','L019', NULL, '2021-01-16');

