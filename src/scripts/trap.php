<?php

$ip = $_SERVER['REMOTE_ADDR'] . '<br>';
$agent = $_SERVER['HTTP_USER_AGENT'] . '<br>';
$path = $_SERVER['REQUEST_URI'] . '<br>';
$hitTime = time();

$pdo = new PDO('sqlite:../../data/trap.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS trap_hits (
        id INTEGER PRIMARY KEY,
        ip TEXT NOT NULL,
        agent TEXT NOT NULL,
        path TEXT NOT NULL,
        hit_time INTEGER NOT NULL
	)");

} catch (PDOException $e) {
    error_log("DB setup failed: " . $e->getMessage());
    http_response_code(500);
    die('Error: Calamitous failure. Try again later.');
}

try {
    $stmt = $pdo->prepare("INSERT INTO trap_hits (ip, agent, path, hit_time) VALUES (:ip, :agent, :path, :hit_time)");
    $stmt->execute([
    	':ip' => $ip,
    	':agent' => $agent,
    	':path' => $path,
    	':hit_time' => $hitTime
    ]);

} catch (PDOException $e) {
    error_log("DB write failed: " . $e->getMessage());
    http_response_code(500);
    die('Error: Calamitous failure. Try again later.');
}

try {
    $stmt = $pdo->query("SELECT * FROM trap_hits");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    print_r($rows);
    echo '</pre>';

} catch (PDOException $e) {
    error_log("DB query failed: " . $e->getMessage());
    http_response_code(500);
    die('Error: Calamitous failure. Try again later.');
}