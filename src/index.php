<?php
$path = trim($_SERVER['REQUEST_URI'], '/');
$file = '';

if ($path === '') {
	$file = __DIR__ . "/index.html";
}
else {
	$file = __DIR__ . "/{$path}.html";
}

readfile($file);
