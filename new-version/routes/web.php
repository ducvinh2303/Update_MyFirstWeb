<?php

// Lấy đường dẫn từ URL
$request = $_SERVER['REQUEST_URI'];

// Xóa query string nếu có
$request = strtok($request, '?');

echo $request;
// Định tuyến các URL đến các file PHP tương ứng
switch ($request) {
    case '/':
    case '/home':
        require __DIR__ . "/../views/home.php";
        break;
    case '/register':
        require __DIR__ . '/../views/register.php';
        break;
    case '/login':
        require __DIR__ . '/../views/login.php';
        break;
    default:
        http_response_code(404);
        echo "Page not found";
        break;
}
