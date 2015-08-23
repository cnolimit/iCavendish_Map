

CREATE TABLE images
(
  ImageID INT NOT NULL,
  imageLocation VARCHAR(800),
  PRIMARY KEY (ImageID)
);

CREATE TABLE paths
(
  PathID INT NOT NULL,
  route VARCHAR(800),
  PRIMARY KEY (PathID)
);

CREATE TABLE places
(
 PalceID INT NOT NULL,
 PathID INT NOT NULL,
 ImageID INT NOT NULL,
 title VARCHAR(500),
 PRIMARY KEY(PalceID),
 INDEX (PathID),
 FOREIGN KEY (PathID) REFERENCES Paths (PathID),
 INDEX (ImageID),
 FOREIGN KEY (ImageID) REFERENCES images (ImageID)
);

Alter table places modify PalceID INT NOT NULL AUTO_INCREMENT PRIMARY KEY
Alter table images modify ImageID INT NOT NULL AUTO_INCREMENT PRIMARY KEY
Alter table paths modify PathID INT NOT NULL AUTO_INCREMENT PRIMARY KEY


INSERT INTO paths VALUES ( NULL,'1,2,3,4');

INSERT INTO images VALUES ( NULL,'Front Desk');

INSERT INTO places VALUES ( NULL,1,1,'Front Desk');
INSERT INTO places VALUES ( NULL,1,1,'Toilet');
INSERT INTO places VALUES ( NULL,1,1,'Cafe');
INSERT INTO places VALUES ( NULL,1,1,'Finance Office');

INSERT INTO `iCavendish`.`places` (`PalceID`, `PathID`, `ImageID`, `title`) VALUES (NULL, '', '', 'Front Desk')

INSERT INTO `places` (`PalceID`, `PathID`, `ImageID`, `title`, `description`) VALUES
(3, 1, 1, 'Front Desk', 'Located at the front of the building'),
(4, 1, 1, 'Toilet', 'Located by entrance of copland building'),
(5, 1, 1, 'Cafe', 'Cafe neo straight ahead after barriers'),
(6, 1, 1, 'Finance Office', 'Located by first set of doors after lifts');



