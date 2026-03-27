<?php
/**
 * Configuration base de données PostgreSQL
 */

$host = getenv('DB_HOST') ?: 'postgres';
$db_user = getenv('DB_USER') ?: 'iran_user';
$db_password = getenv('DB_PASSWORD') ?: 'iran_password';
$db_name = getenv('DB_NAME') ?: 'iran_news';
$port = getenv('DB_PORT') ?: 5432;

try {
    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$db_name",
        $db_user,
        $db_password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
