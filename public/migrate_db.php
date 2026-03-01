<?php
// migrate_db.php
// Place this file in your public_html folder on Hostinger
// Example: https://ielpu.org/migrate_db.php

$host = 'localhost'; // Usually localhost on Hostinger
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
    echo "<h3>Connected successfully to database <strong>$db</strong></h3>";
} catch (\PDOException $e) {
    die("<h3>Connection failed: " . $e->getMessage() . "</h3>");
}

$queries = [
    // 1. Users table
    "CREATE TABLE IF NOT EXISTS `users` (
      `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
      `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `email_verified_at` timestamp NULL DEFAULT NULL,
      `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `role` enum('admin','donor','beneficiary') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'donor',
      `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
      `created_at` timestamp NULL DEFAULT NULL,
      `updated_at` timestamp NULL DEFAULT NULL,
      PRIMARY KEY (`id`),
      UNIQUE KEY `users_email_unique` (`email`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

    // 2. Categories Table
    "CREATE TABLE IF NOT EXISTS `categories` (
      `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
      `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `created_at` timestamp NULL DEFAULT NULL,
      `updated_at` timestamp NULL DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

    // 3. Help Requests Table
    "CREATE TABLE IF NOT EXISTS `help_requests` (
      `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
      `user_id` bigint(20) unsigned NOT NULL,
      `category_id` bigint(20) unsigned NOT NULL,
      `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
      `amount_required` decimal(10,2) NOT NULL,
      `amount_raised` decimal(10,2) NOT NULL DEFAULT '0.00',
      `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `status` enum('pending','approved','fulfilled','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
      `created_at` timestamp NULL DEFAULT NULL,
      `updated_at` timestamp NULL DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `help_requests_user_id_foreign` (`user_id`),
      KEY `help_requests_category_id_foreign` (`category_id`),
      CONSTRAINT `help_requests_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
      CONSTRAINT `help_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

    // 4. Donations Table
    "CREATE TABLE IF NOT EXISTS `donations` (
      `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
      `donor_id` bigint(20) unsigned NULL,
      `help_request_id` bigint(20) unsigned NULL,
      `amount` decimal(10,2) NOT NULL,
      `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `created_at` timestamp NULL DEFAULT NULL,
      `updated_at` timestamp NULL DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `donations_donor_id_foreign` (`donor_id`),
      KEY `donations_help_request_id_foreign` (`help_request_id`),
      CONSTRAINT `donations_donor_id_foreign` FOREIGN KEY (`donor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
      CONSTRAINT `donations_help_request_id_foreign` FOREIGN KEY (`help_request_id`) REFERENCES `help_requests` (`id`) ON DELETE SET NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

    // 5. Distributions Table
    "CREATE TABLE IF NOT EXISTS `distributions` (
      `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
      `help_request_id` bigint(20) unsigned NOT NULL,
      `amount` decimal(10,2) NOT NULL,
      `notes` text COLLATE utf8mb4_unicode_ci,
      `date` date NOT NULL,
      `created_at` timestamp NULL DEFAULT NULL,
      `updated_at` timestamp NULL DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `distributions_help_request_id_foreign` (`help_request_id`),
      CONSTRAINT `distributions_help_request_id_foreign` FOREIGN KEY (`help_request_id`) REFERENCES `help_requests` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",
];

foreach ($queries as $i => $sql) {
    try {
        $pdo->exec($sql);
        echo "<p>Table batch " . ($i + 1) . " ran successfully.</p>";
    } catch (\PDOException $e) {
        if ($e->getCode() == '42S01') {
            echo "<p style='color:orange;'>Table batch " . ($i + 1) . " skipped (already exists).</p>";
        } else {
            echo "<p style='color:red;'>Error in batch " . ($i + 1) . ": " . $e->getMessage() . "</p>";
        }
    }
}

// Optional Seeding data
try {
    $pdo->exec("INSERT IGNORE INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
        (1, 'Medical Emergency', NOW(), NOW()),
        (2, 'Education Support', NOW(), NOW()),
        (3, 'Natural Disaster Relief', NOW(), NOW()),
        (4, 'Food & Shelter', NOW(), NOW());
    ");
    echo "<p>Categories seeded successfully.</p>";
} catch (\PDOException $e) {
    echo "<p style='color:orange;'>Categories already seeded or failed: " . $e->getMessage() . "</p>";
}

echo "<h3>Migration process finished!</h3>";
echo "<p><strong>Security Note:</strong> Please delete this file from your server after running it.</p>";
?>
