-- Create database if not exists
CREATE DATABASE IF NOT EXISTS stud88360;
USE stud88360;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    description VARCHAR(100)
);

-- Insert sample data
INSERT INTO users (username, email, description) VALUES
('student_88360', '88360@uwb.edu.pl', 'Main student account'),
('admin', 'admin@example.com', 'Administrator'),
('user1', 'user1@example.com', 'Test user 1'),
('user2', 'user2@example.com', 'Test user 2');