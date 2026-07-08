<?php
$path = trim($_SERVER['REQUEST_URI'], '/');
$file = '';

if ($path === '') {
	$file = __DIR__ . "/index.html";
}
else {
	$file = __DIR__ . "/{$path}.html";
    // echo $file;
}

if (file_exists($file)) {
    readfile($file);
} else {
    $file = __DIR__ . "/error.html";
    readfile($file);
    die();
}