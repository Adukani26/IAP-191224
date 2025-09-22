
<?php
require_once 'ClassAutoLoad.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Basic validation
    if (empty($name) || empty($email) || empty($password)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {
        try {
            $pdo = new PDO(
                "mysql:host={$conf['db_host']};dbname={$conf['db_name']}",
                $conf['db_user'],
                $conf['db_pass']
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Check if email exists
            $stmt = $pdo->prepare("SELECT id FROM user WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $error = "Email already registered.";
            } else {
                // Hash password and insert
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
                $stmt->execute([$name, $email, $passwordHash]);
                $mailCnt = [
                    'name_from' => 'Adan Konse',
                    'mail_from' => 'adan.konse@gmail.com',
                    'name_to' => $name,
                    'mail_to' => $email,
                    'subject' => 'Hello From Adan Konse 191224',
                    'body' => 'Welcome to ICS C! <br> This is a new semester.'
                ];

                $ObjSendMail->Send_Mail($conf, $mailCnt);
                $success = "Signup successful! You can now sign in.";
            }
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}



// Include the ClassAutoLoad Method

$layout->header($conf);
$form->signup();
$layout->footer($conf);


