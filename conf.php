<?php
// Site Information
$conf['site_name'] = 'ICS C Community';
$conf['site_url'] = 'http://localhost';
$conf['admin_email'] = 'admin@icsccommunity.com';

// Database Configuration
$conf['db_type'] = 'mysql';
$conf['db_host'] = 'localhost';
$conf['db_user'] = 'root';
$conf['db_pass'] = 'qwerty123';
$conf['db_name'] = 'php_class';

// Site Language
$conf['site_lang'] = 'en';

//Email Configuration
$conf['mail_type']  = 'smtp';
$conf['smtp_host_']  = 'smtp.gmail.com';
$conf['smtp_user']  = 'adan.konse@strathmore.edu';
$conf['stmp_pass']  = 'dryn jelu bram eczd';
$conf['stmp_port']  = '465';
$conf['stmp_secure']  = 'ssl';

//Database Connection using PDO
try {
    $dsn = "mysql:host={$conf['db_host']};dbname={$conf['db_name']};charset=utf8";
    $pdo = new PDO($dsn, $conf['db_user'], $conf['db_pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo ("ICS C COMMUNITY");
} catch (PDOException $e) {
    die("DB Connection Failed: " . $e->getMessage());
}
?> 