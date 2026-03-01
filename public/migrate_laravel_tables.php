<?php
// migrate_laravel_tables.php
// Place this file in your public_html folder on Hostinger
// Example: https://ielpu.org/migrate_laravel_tables.php

$host = 'localhost';
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
    // 1. Password Reset Tokens
    "CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
      `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `created_at` timestamp NULL DEFAULT NULL,
      PRIMARY KEY (`email`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

    // 2. Sessions
    "CREATE TABLE IF NOT EXISTS `sessions` (
      `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `user_id` bigint(20) unsigned DEFAULT NULL,
      `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
      `user_agent` text COLLATE utf8mb4_unicode_ci,
      `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
      `last_activity` int(11) NOT NULL,
      PRIMARY KEY (`id`),
      KEY `sessions_user_id_index` (`user_id`),
      KEY `sessions_last_activity_index` (`last_activity`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

    // 3. Cache
    "CREATE TABLE IF NOT EXISTS `cache` (
      `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
      `expiration` int(11) NOT NULL,
      PRIMARY KEY (`key`),
      KEY `cache_expiration_index` (`expiration`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

    // 4. Cache Locks
    "CREATE TABLE IF NOT EXISTS `cache_locks` (
      `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `expiration` int(11) NOT NULL,
      PRIMARY KEY (`key`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

    // 5. Jobs
    "CREATE TABLE IF NOT EXISTS `jobs` (
      `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
      `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
      `attempts` tinyint(3) unsigned NOT NULL,
      `reserved_at` int(10) unsigned DEFAULT NULL,
      `available_at` int(10) unsigned NOT NULL,
      `created_at` int(10) unsigned NOT NULL,
      PRIMARY KEY (`id`),
      KEY `jobs_queue_index` (`queue`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

    // 6. Job Batches
    "CREATE TABLE IF NOT EXISTS `job_batches` (
      `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `total_jobs` int(11) NOT NULL,
      `pending_jobs` int(11) NOT NULL,
      `failed_jobs` int(11) NOT NULL,
      `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
      `options` mediumtext COLLATE utf8mb4_unicode_ci,
      `cancelled_at` int(11) DEFAULT NULL,
      `created_at` int(11) NOT NULL,
      `finished_at` int(11) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

    // 7. Failed Jobs
    "CREATE TABLE IF NOT EXISTS `failed_jobs` (
      `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
      `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
      `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
      `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
      `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
      `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`),
      UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;"
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

echo "<h3>Laravel Boilerplate Tables Migration process finished!</h3>";
echo "<p><strong>Security Note:</strong> Please delete this file from your server after running it.</p>";
?>
