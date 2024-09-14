CREATE TABLE Student_Registration(
    id SERIAL primary key check(id>0),
    fullname varchar(100) not null,
    email varchar(100) not null,
    phoneNumber varchar(20) unique check(phoneNumber ~'^[0-9]{10}$'),
    studentId varchar(100),
    password varchar(100) not null,
    address varchar(100) not null
);

CREATE TABLE Abhyasika_Registration(
    id SERIAL primary key check(id>0),
    AbhyasikaName varchar(100) not null,
    OwnerName varchar(100) not null,
    email varchar(100) not null,
    phone varchar(20) unique  check(phone ~'^[0-9]{10}$'),
    password varchar(100) not null,
    address varchar(100) not null
);

CREATE TABLE Abhyasika_Details (
    Abhyasika_ID SERIAL PRIMARY KEY,
    Abhyasika_Name VARCHAR(255) NOT NULL,
    Abhyasika_Owner_Name VARCHAR(255) NOT NULL,
    Abhyasika_Owner_ID VARCHAR(50) NOT NULL,
    Phone_Number VARCHAR(15) NOT NULL,
    Established_Date DATE NOT NULL,
    Address VARCHAR(255) NOT NULL,
    Number_of_Seats INT NOT NULL,
    Additional_Facility TEXT
);

