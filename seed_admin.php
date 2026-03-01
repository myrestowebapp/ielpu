<?php

$host = '82.25.121.105'; // or srv1113.hstgr.io
$db   = 'u144227799_CWMZI';
$user = 'u144227799_se5Rt';
$pass = 'Ielpu123@';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Connected successfully to database $db\n\n";

    // 1. Create the admin user
    $password = password_hash('admin123@', PASSWORD_DEFAULT);
    $now = date('Y-m-d H:i:s');
    
    // Check if admin already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = 'admin'");
    $stmt->execute();
    
    if ($stmt->fetch()) {
        echo "Admin user already exists. Updating password and role...\n";
        $updateStmt = $pdo->prepare("UPDATE users SET password = ?, role = 'admin', email_verified_at = ? WHERE email = 'admin'");
        $updateStmt->execute([$password, $now]);
        echo "Admin user updated successfully!\n";
    } else {
        echo "Creating new admin user...\n";
        $insertStmt = $pdo->prepare("INSERT INTO users (name, email, password, role, email_verified_at, created_at, updated_at) VALUES ('Super Admin', 'admin', ?, 'admin', ?, ?, ?)");
        $insertStmt->execute([$password, $now, $now, $now]);
        echo "Admin user created successfully!\n";
    }

} catch (\PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}

echo "\nSuper Admin Setup finished!\n";
echo "Security Note: Please delete this file from your server after running it.\n";
