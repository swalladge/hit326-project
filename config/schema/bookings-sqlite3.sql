CREATE TABLE bookings(
equipmentID int,
userID int,
Date int,
StartTime int,
Duration int,
FOREIGN KEY (equipmentID) REFERENCES equipment(equipmentID),
FOREIGN KEY (userID) REFERENCES user(userID)
);
