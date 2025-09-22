<?php
require_once 'ClassAutoLoad.php';

try {
    $dsn = "mysql:host={$conf['db_host']};dbname={$conf['db_name']};charset=utf8";
    $pdo = new PDO($dsn, $conf['db_user'], $conf['db_pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // fetch users ordered by id
    $stmt = $pdo->query("SELECT name, email FROM user ORDER BY id ASC");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("DB error: " . $e->getMessage());
}

$layout->header($conf);

echo "<h2>Registered Users</h2>";
echo "<ol>"; // ordered (numbered) list
foreach ($users as $user) {
    echo "<li>" . htmlspecialchars($user['name']) . " (" . htmlspecialchars($user['email']) . ")</li>";
}
echo "</ol>";

$layout->footer($conf);
?>