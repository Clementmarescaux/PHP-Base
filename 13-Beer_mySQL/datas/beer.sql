-- Nom, Degré, Volume, image, prix, ebc_id, brand_id

-- EBC : 1 > 4 / 2 > 26 / 3 > 39 / 4 > 57
-- Marque : 1 > Chimay / 2 > Duvel / 3 > Kwak / 4 > Guiness / 5 > Ch'ti 


INSERT INTO beer (`name`, degree, size, image, price, ebc_id, brand_id) VALUES
('Chimay Bleue', 9, 330, 'img/chimay-chimay-bleue.jpg', 1.79, 3, 1),
('Chimay blanche', 8, 330, 'img/chimay-chimay-blanche.jpg', 1.65, 1, 1),
('Duvel', 8.5, 330, 'img/duvel-duvel.jpg', 1.99, 1, 2),
('Duvel Triple hop', 9.5, 330, 'img/duvel-duvel-triple-hop.jpg', 1.95, 1, 2),
('Ch''ti Ambrée', 6.4, 330, 'img/chti-chti-ambree.jpg', 1.50, 3, 5),
('Ch''ti Blonde', 5.9, 250, 'img/chti-chti-ambree.jpg', 1.16, 1, 5);