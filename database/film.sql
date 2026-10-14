CREATE DATABASE IF NOT EXISTS koleksi_film
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE koleksi_film;

CREATE TABLE IF NOT EXISTS film (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    tahun_rilis SMALLINT NOT NULL,
    negara VARCHAR(50) NOT NULL,
    rating DECIMAL(3,1) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY uq_judul_tahun (judul, tahun_rilis)
);

INSERT INTO film (judul, genre, tahun_rilis, negara, rating) VALUES
('The First Frost', 'Romance, Drama', 2025, 'Tiongkok', 8.1),
('Pursuit of Jade', 'Historical, Romance', 2025, 'Tiongkok', 8.3),
('The King''s Avatar', 'Esports, Drama', 2019, 'Tiongkok', 8.0),
('The Early Spring', 'Drama, Romance', 2025, 'Tiongkok', 7.8),
('Never Ending Summer', 'Drama, Youth', 2025, 'Tiongkok', 7.9),
('Love Between Fairy and Devil', 'Fantasy, Romance', 2022, 'Tiongkok', 8.2),
('Hidden Love', 'Romance, Youth', 2023, 'Tiongkok', 8.4),
('Mysterious Lotus Casebook', 'Wuxia, Mystery', 2023, 'Tiongkok', 8.5),
('Nirvana in Fire', 'Historical, Political', 2015, 'Tiongkok', 9.0),
('Go Go Squid!', 'Esports, Romance', 2019, 'Tiongkok', 8.1);