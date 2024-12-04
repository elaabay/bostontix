CREATE DATABASE boston_ticket_reseller;

USE boston_ticket_reseller;

CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT
);
