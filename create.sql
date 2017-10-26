/*Primary key constraint #1: Every movie should have one unique id*/
CREATE TABLE Movie (
         id int NOT NULL,
		 title varchar(100) NOT NULL,
		 year int NOT NULL,
		 rating varchar(10),
		 company varchar(50),
		 PRIMARY KEY (id)
     );
	 
/*Primary key constraint #2: Every actor should have one unique id
Check constraint #1: Check that actor's DOB is before DOD, if not marked as dead*/ 
CREATE TABLE Actor (
         id int NOT NULL AUTO_INCREMENT,
		 last varchar(20) NOT NULL,
		 first varchar(20) NOT NULL,
		 sex varchar(6) NOT NULL,
		 dob date NOT NULL,
		 dod date,
		 PRIMARY KEY (id),
		 CHECK(dod IS NULL OR dob < dod)
     );

ALTER TABLE Actor AUTO_INCREMENT=68636;
/*Referential integrity constraint #1: The sales mid references the corresponding movie id
Check constraint #2: Check that number of tickets sold are not negative*/
CREATE TABLE Sales (
         mid int NOT NULL,
		 ticketsSold int NOT NULL,
		 totalIncome int,
		 FOREIGN KEY (mid) REFERENCES Movie(id),
		 CHECK(ticketsSold >= 0)
     ) ENGINE=INNODB;

/*Primary key constraint #3: Every director should have one unique id
Check constraint #3: Check that actor's DOB is before DOD, if not marked as dead*/ 
CREATE TABLE Director (
         id int NOT NULL AUTO_INCREMENT,
		 last varchar(20) NOT NULL,
		 first varchar(20) NOT NULL,
		 dob date NOT NULL,
		 dod date,
		 PRIMARY KEY (id),
		 CHECK(dod IS NULL OR dob < dod)
     );
	 
ALTER TABLE Director AUTO_INCREMENT=68626;

/*Referential integrity constraint #2: The MovieGenre mid references the corresponding movie id*/
CREATE TABLE MovieGenre (
         mid int NOT NULL,
		 genre varchar(20),
		 FOREIGN KEY (mid) REFERENCES Movie(id)
     ) ENGINE = INNODB;

/*Referential integrity constraint #3: The MovieDirector mid references the corresponding movie id*/
CREATE TABLE MovieDirector (
         mid int NOT NULL,
		 did int NOT NULL,
		 FOREIGN KEY (mid) REFERENCES Movie(id)
     ) ENGINE = INNODB;

/*Referential integrity constraint #4: The MovieActor mid references the corresponding movie id*/
CREATE TABLE MovieActor (
         mid int NOT NULL,
		 aid int NOT NULL,
		 role varchar(50),
		 FOREIGN KEY (mid) REFERENCES Movie(id)
     ) ENGINE = INNODB;

/*Referential integrity constraint #5: The MovieRatings mid references the corresponding movie id*/	 
CREATE TABLE MovieRating (
         mid int NOT NULL,
		 imdb int,
		 rot int,
		 FOREIGN KEY (mid) REFERENCES Movie(id)
     ) ENGINE = INNODB;
	 
/*Referential integrity constraint #6: The Review mid references the corresponding movie id*/
CREATE TABLE Review (
         name varchar(20) NOT NULL,
		 time timestamp NOT NULL,
		 mid int NOT NULL,
		 rating int NOT NULL,
		 comment varchar(500),
		 FOREIGN KEY(mid) REFERENCES Movie(id)
     ) ENGINE = INNODB;
	 
CREATE TABLE MaxPersonID (
		id int NOT NULL
	 );

CREATE TABLE MaxMovieID (
		id int NOT NULL
	 );
