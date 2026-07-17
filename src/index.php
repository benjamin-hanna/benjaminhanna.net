<?php
if (php_sapi_name() === 'cli-server') {
    $ext = pathinfo(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), PATHINFO_EXTENSION);
    $staticExts = ['css', 'js', 'png', 'jpg', 'svg', 'ico', 'txt', 'webp'];
    if (in_array($ext, $staticExts, true)) {
        return false;
    }
}

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