-- Location Table
CREATE TABLE Location (
    LocationID INT PRIMARY KEY,
    LocationName VARCHAR(100) NOT NULL,
    Address TEXT,
    OpeningHours VARCHAR(255)
);

-- Category Table
CREATE TABLE Category (
    CategoryID INT PRIMARY KEY,
    CategoryName VARCHAR(100) NOT NULL,
    Slug VARCHAR(100) UNIQUE
);


CREATE TABLE Users (
    UserID INT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    PhoneNumber VARCHAR(20),
    Address TEXT
);

-- Resource Table
CREATE TABLE Resource (
    ResourceID INT PRIMARY KEY,
    Title VARCHAR(255) NOT NULL,
    Authors VARCHAR(255),
    PublicationYear INT,
    Publisher VARCHAR(100),
    ISBN VARCHAR(20),
    Description TEXT,
    Keywords VARCHAR(255),
    Format VARCHAR(50),
    AvailabilityStatus VARCHAR(20),
    LocationID INT,
    CategoryID INT,
    Slug VARCHAR(255) UNIQUE,
    FOREIGN KEY (LocationID) REFERENCES Location(LocationID),
    FOREIGN KEY (CategoryID) REFERENCES Category(CategoryID)
);

-- Reservation Table
CREATE TABLE Reservation (
    ReservationID INT PRIMARY KEY,
    UserID INT,
    ResourceID INT,
    ReservationDate DATE,
    PickupDate DATE,
    Status VARCHAR(20),
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (ResourceID) REFERENCES Resource(ResourceID)
);

-- Feedback Table
CREATE TABLE Feedback (
    FeedbackID INT PRIMARY KEY,
    UserEmail INT,
    FeedbackText TEXT,
    Timestamp DATETIME
);

-- Message Table
CREATE TABLE Message (
    MessageID INT PRIMARY KEY,
    SenderEmail TEXT,
    SenderSubject TEXT,
    MessageText TEXT,
    Timestamp DATETIME
);

-- Blog Table
CREATE TABLE Blog (
    BlogID INT PRIMARY KEY,
    Title VARCHAR(255) NOT NULL,
    Content TEXT,
    PublishDate DATE,
    Slug VARCHAR(255) UNIQUE
);
