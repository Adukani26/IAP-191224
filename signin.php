<?php
// Include the ClassAutoLoad Method
require_once 'ClassAutoLoad.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Basic validation
    if (empty($email) || empty($password)) {
        $error = "Email and password are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        try {
            $pdo = new PDO(
                "mysql:host={$conf['db_host']};dbname={$conf['db_name']}",
                $conf['db_user'],
                $conf['db_pass']
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Fetch user
            $stmt = $pdo->prepare("SELECT id, name, password FROM user WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $success = "Successful Sign in";
                header("Location: users.php"); // Redirect to home or dashboard
                exit;
            } else {
                $error = "Invalid email or password.";
            }
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}



$layout->header($conf);
$form->signin();
$layout->footer($conf);