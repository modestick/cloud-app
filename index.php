<?php
// DB connection
$db_host = $_SERVER['DB_HOST'] ?? '';
$db_name = $_SERVER['DB_NAME'] ?? '';
$db_user = $_SERVER['DB_USER'] ?? '';
$db_pass = $_SERVER['DB_PASSWORD'] ?? '';

$db_connected = false;
$users = [];
$error = '';

if (!empty($db_host) && !empty($db_name) && !empty($db_user) && !empty($db_pass)) {
    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $db_connected = true;
        
        // Get users
        $stmt = $pdo->query("SELECT * FROM users");
        $users = $stmt->fetchAll();
    } catch (PDOException $e) {
        $error = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student App 88360</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #eee; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Student Application - 88360</h1>
    <p>Port: 8006</p>
    
    <h2>Database Status</h2>
    <?php if ($db_connected): ?>
        <p class="success">✅ Connected to: <?php echo htmlspecialchars($db_name); ?></p>
    <?php else: ?>
        <p class="error">❌ Error: <?php echo htmlspecialchars($error ?: 'DB config missing'); ?></p>
    <?php endif; ?>
    
    <h2>Users from Database</h2>
    <?php if (!empty($users)): ?>
        <table>
            <tr><th>ID</th><th>Username</th><th>Email</th><th>Description</th></tr>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['id']); ?></td>
                <td><?php echo htmlspecialchars($user['username']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo htmlspecialchars($user['description'] ?? ''); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No users found in database.</p>
    <?php endif; ?>
    
    <hr>
    <p><strong>Server Time:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
    <p><strong>PHP Version:</strong> <?php echo phpversion(); ?></p>
</body>
</html>