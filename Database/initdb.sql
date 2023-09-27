CREATE DATABASE notes_db;

USE notes_db;

CREATE TABLE IF NOT EXIST note(
    id int AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);