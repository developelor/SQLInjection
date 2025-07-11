<?php
header('Content-Type: text/plain; charset=utf-8');
ob_implicit_flush(true);
ob_end_flush();

$con = mysqli_connect("localhost", "root", "");
if (!$con) {
    echo "[*] Error: Could not connect to MySQL - " . mysqli_connect_error() . "\n";
    exit;
}
echo "[1] Purging old database (if exists)...\n";
flush();
mysqli_query($con, "DROP DATABASE IF EXISTS security");
echo "[2] Creating new database...\n\n";
flush();
mysqli_query($con, "CREATE DATABASE security CHARACTER SET utf8mb4");
mysqli_select_db($con, "security");
sleep(1);
echo "[3] Creating table: users...\n";
flush();
mysqli_query($con, "
    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");
echo "[4] Creating table: emails...\n";
flush();
mysqli_query($con, "
    CREATE TABLE emails (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email_id VARCHAR(100) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");
echo "[5] Creating table: uagents...\n";
flush();
mysqli_query($con, "
    CREATE TABLE uagents (
        id INT AUTO_INCREMENT PRIMARY KEY,
        uagent VARCHAR(256) NOT NULL,
        ip_address VARCHAR(45) NOT NULL,
        username VARCHAR(50) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");
echo "[6] Creating table: referers...\n";
flush();
mysqli_query($con, "
    CREATE TABLE referers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        referer VARCHAR(256) NOT NULL,
        ip_address VARCHAR(45) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
");
sleep(1);
echo "[7] Inserting sample users...\n";
flush();
mysqli_query($con, "
    INSERT INTO users (username, password) VALUES
    ('mmp', '123'),
    ('mohammad', 'mahmoudi'),
    ('ahmad', '@nasj'),
    ('saman', 'guran'),
    ('adel', 'ferdousipur'),
    ('javad', 'khiabani'),
    ('hotan', 'shakiba'),
    ('admin1', 'admin1'),
    ('admin2', 'admin2'),
    ('admin3', 'admin3'),
    ('admin4', 'admin4'),
    ('admin5', 'admin5'),
    ('cow', 'ma_ma_ma_ma')
");
echo "[8] Inserting sample emails...\n";
flush();
mysqli_query($con, "
    INSERT INTO emails (email_id) VALUES
    ('me@me.com'),
    ('some@some.com'),
    ('ear@ear.com'),
    ('hand@hand.com'),
    ('noun@noun.com'),
    ('pic@picture.com'),
    ('avenger@avenger.com'),
    ('admin@admin.com')
");
sleep(1);
echo "\n✅ Setup completed successfully!";
flush();
