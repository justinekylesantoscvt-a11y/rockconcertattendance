CREATE DATABASE IF NOT EXISTS rock_concert_db;
USE rock_concert_db;

DROP TABLE IF EXISTS concert_attendance;

-- We use DECIMAL for currency and TINYINT for boolean logic to increase complexity [cite: 10]
CREATE TABLE concert_attendance (
    id INT(11) NOT NULL AUTO_INCREMENT,
    fan_name VARCHAR(100) NOT NULL,
    band_name VARCHAR(100) NOT NULL,
    venue_name VARCHAR(100) NOT NULL,
    ticket_price DECIMAL(10, 2) DEFAULT NULL,
    section_area VARCHAR(50) DEFAULT NULL,
    concert_date DATE DEFAULT NULL,
    is_vip TINYINT(1) DEFAULT 0, -- 1 for True, 0 for False
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO concert_attendance 
(fan_name, band_name, venue_name, ticket_price, section_area, concert_date, is_vip)
VALUES 
('Alice Cooper', 'Pink Floyd', 'The Wall Arena', 250.00, 'VIP North', '2023-10-12', 1),
('Bob Dylan', 'The Rolling Stones', 'Marquee Club', 120.50, 'General Admission', '2023-11-05', 0),
('John Lennon', 'The Beatles', 'Rooftop Stage', 500.00, 'Backstage', '2024-01-20', 1),
('Stevie Nicks', 'Fleetwood Mac', 'Crystal Ballroom', 175.00, 'Lower Bowl', '2024-02-14', 0),
('Kurt Cobain', 'Nirvana', 'Underground Hub', 80.00, 'Pit', '2024-03-01', 0);