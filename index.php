<?php
// index.php
require_once 'config/config.php';
require_once 'config/database.php';

session_start();

// Định tuyến đơn giản
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';
$controller = 'ProductController'; // Controller mặc định

switch ($url) {
    case 'home':
        require_once 'controllers/ProductController.php';
        $controller = new ProductController();
        $controller->index(); // Hiển thị trang chủ
        break;
    case 'product':
        require_once 'controllers/ProductController.php';
        $controller = new ProductController();
        $controller->detail(); // Hiển thị chi tiết sản phẩm
        break;
    // Thêm các route khác sau
    default:
        http_response_code(404);
        echo "Trang không tìm thấy";
        break;
}
?>