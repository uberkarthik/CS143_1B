/* names of all the actors in the movie 'Death to Smoochy' */
SELECT CONCAT (first, ' ', last)
FROM Actor, MovieActor, Movie 
WHERE Movie.title = 'Death to Smoochy'
AND Movie.id = MovieActor.mid 
AND MovieActor.aid = Actor.id;

/* count of all the directors who directed at least 4 movies */
SELECT COUNT(did)
FROM (SELECT did, COUNT(mid) as movs
FROM MovieDirector GROUP BY MovieDirector.did) as alldirs
WHERE alldirs.movs > 3;

/* display the name of all the movies made after the year 2000 in a table */
SELECT Movie.title
FROM Movie
WHERE Movie.year > 2000;

/* display movies that have more then 100,000 ticket sales in a table */
SELECT Movie.title
FROM Sales, Movie
WHERE ticketsSold > 100000
AND Sales.mid = Movie.id;
