<?php
$host = getenv('DB_HOST') ?: ($_SERVER['DB_HOST'] ?? '');
$db   = getenv('DB_NAME') ?: ($_SERVER['DB_NAME'] ?? '');
$user = getenv('DB_USER') ?: ($_SERVER['DB_USER'] ?? '');
$pass = getenv('DB_PASSWORD') ?: ($_SERVER['DB_PASSWORD'] ?? '');

$db_connected = false;
$users = [];
$error = '';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>88360</title>
</head>
<body>
    <h1>Hello World! 👋</h1>
    <p>Title of this app: 88360</p>
    <p>This is a simple PHP app ready to deploy.</p>
    
    <hr>
    <h2>Database Status</h2>
    <?php
    if (empty($host) || empty($db) || empty($user) || empty($pass)) {
        echo "<p>DB config not set in environment</p>";
    } else {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            echo "<p>✅ Connected to: $db</p>";
            
            $result = $pdo->query("SHOW TABLES");
            echo "<p>Tables count: " . $result->rowCount() . "</p>";
            
            $check = $pdo->query("SHOW TABLES LIKE 'users'");
            if ($check->rowCount() > 0) {
                $data = $pdo->query("SELECT * FROM users")->fetchAll();
                echo "<h3>Users:</h3>";
                echo "<ul>";
                foreach ($data as $row) {
                    echo "<li>" . htmlspecialchars($row['username']) . " - " . 
                         htmlspecialchars($row['email']) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No 'users' table</p>";
            }
            
        } catch (Exception $e) {
            echo "<p>❌ DB Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
    ?>
</body>
</html>