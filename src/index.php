<?php
$path = trim($_SERVER['REQUEST_URI'], '/');
$segments = explode('/', $path);
$file = '';

if ($path === '') {
	$file = __DIR__ . "/pages/index.html";
}
else {
    if (in_array('posts', $segments, true)) {
        if (end($segments) === 'posts') {
            $file = __DIR__ . "/pages/{$path}.html";
        } else {
            $file = __DIR__ . "/{$path}.html";
        }   
    } else {
	   $file = __DIR__ . "/pages/{$path}.html";
    }
}

if (file_exists($file)) {
    readfile($file);
} else {
    http_response_code(404);
    readfile(__DIR__ . "/pages/error.html");
    exit();
}