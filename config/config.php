<?php
// config/config.php
define('BASE_URL', 'http://localhost/DoAnCuoiKiLapTrinhWeb/'); // Thay bằng URL thực tế
define('ASSETS_PATH', BASE_URL . 'assets/');
define('IMAGES_PATH', ASSETS_PATH . 'images/');
define('UPLOADS_PATH', __DIR__ . '/../assets/images/');

// Cấu hình khác
define('ITEMS_PER_PAGE', 12); // Số sản phẩm mỗi trang
define('SESSION_COOKIE_LIFETIME', 86400); // Thời gian session (1 ngày)
?>