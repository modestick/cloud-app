CREATE TABLE IF NOT EXISTS stud88360 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    description VARCHAR(100)
);

INSERT INTO stud88360 (username, email, description) VALUES
('student_88360', '88360@uwb.edu.pl', 'Main student account'),
('admin_user', 'admin@example.com', 'Administrator'),
('john_doe', 'john@example.com', 'Regular user'),
('jane_smith', 'jane@example.com', 'Test account');