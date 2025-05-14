<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// admin.php
require_once 'config/config.php';
require_once 'config/database.php';

session_start();

// Tạm thời bỏ qua chức năng kiểm tra quyền admin để test giao diện
// if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
//     header('Location: ' . BASE_URL . 'views/admin/login.php');
//     exit;
// }

// Định tuyến đơn giản
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'dashboard';

// Hiển thị trang tương ứng
switch ($url) {
    case 'dashboard':
        include 'views/admin/dashboard.php';
        break;
    case 'products':
        include 'views/admin/product_manage.php';
        break;
    case 'orders':
        include 'views/admin/order_manage.php';
        break;
    case 'promotions':
        include 'views/admin/promotion_manage.php';
        break;
    case 'revenue':
        include 'views/admin/revenue.php';
        break;
    case 'login':
        include 'views/admin/login.php';
        break;
    case 'logout':
        // Xử lý đăng xuất đơn giản
        session_destroy();
        header('Location: ' . BASE_URL . 'admin.php?url=login');
        exit;
    default:
        include 'views/admin/dashboard.php';
        break;
}
?>