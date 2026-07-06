<?php
try {
    $db = new PDO('sqlite:test.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $createTableQuery = "CREATE TABLE IF NOT EXISTS guests (
        id INTEGER PRIMARY KEY,
        email TEXT UNIQUE NOT NULL,
        message TEXT NOT NULL
    )";
    $db->exec($createTableQuery);

} catch (PDOException $e) {
    error_log("DB setup failed: " . $e->getMessage());

    http_response_code(500);
    die('Error: Calamitous failure. Try again later.');
}

$query2 = "INSERT INTO guests (email, message) VALUES
    ('abc@email.com', 'Hello!'),
    ('123@email2.com', 'Howdy')";

$db->exec($query2);

$sql = 'SELECT * FROM guests';
foreach ($db->query($sql) as $row) {
    print_r($row);
}