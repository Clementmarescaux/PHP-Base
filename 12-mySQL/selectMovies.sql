SELECT * FROM movie;

SELECT * FROM movie WHERE category_id = 18;

SELECT * FROM movie WHERE category_id = 18 AND `date` < '1990-01-01';

SELECT ROUND(AVG(YEAR(`date`))) AS average FROM movie;