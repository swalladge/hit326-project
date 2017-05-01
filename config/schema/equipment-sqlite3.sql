CREATE TABLE equipment(
equipmentID int IDENTITY(1,1) PRIMARY KEY,
name varchar (255),
description varchar (255),
location varchar (255),
isportable boolean,
Quantity int
);
