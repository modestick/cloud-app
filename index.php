<?php
require __DIR__ . '/sql_config.php';

try {
    $stmt = $pdo->query("SELECT * FROM stud88360 ORDER BY created_at DESC");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $db_status = "Connected to database successfully";
} catch (PDOException $e) {
    $users = [];
    $db_status = "Database error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student App - 88360</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .container { background: white; padding: 20px; border-radius: 8px; max-width: 900px; margin: 0 auto; }
        h1 { color: #333; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background: #f2f2f2; font-weight: bold; }
        .status { padding: 10px; margin: 15px 0; border-radius: 4px; background: #d4edda; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Application - 88360</h1>
        <p><strong>Port:</strong> 8006 | <strong>Server:</strong> <?= $_SERVER['SERVER_ADDR'] ?? 'N/A' ?></p>
        
        <div class="status <?= empty($users) ? 'error' : '' ?>">
            <?= htmlspecialchars($db_status) ?>
        </div>
        
        <?php if (!empty($users)): ?>
            <h2>Users from Database</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th>Created At</th>
                </tr>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['description'] ?? '') ?></td>
                    <td><?= htmlspecialchars($user['created_at'] ?? '') ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No users found in database.</p>
        <?php endif; ?>
        
        <hr>
        <h3>Server Information</h3>
        <p>PHP Version: <?= phpversion() ?></p>
        <p>Current Time: <?= date('Y-m-d H:i:s') ?></p>
    </div>
</body>
</html>