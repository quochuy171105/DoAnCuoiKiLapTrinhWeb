<?php
// config/google_oauth.php
$autoload_path = __DIR__ . '/../vendor/autoload.php';
if (!file_exists($autoload_path)) {
    die("Lỗi: Không tìm thấy file autoload.php tại $autoload_path");
}
require_once $autoload_path;

if (!class_exists('Google_Client')) {
    die("Lỗi: Lớp Google_Client không được tìm thấy. Kiểm tra cài đặt Google API Client Library.");
}

define('GOOGLE_CLIENT_ID', '147514115248-8phlhhhis7aurcekeo6esrutd49c50mh.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
define('GOOGLE_REDIRECT_URI', 'http://localhost/DoAnCuoiKiLapTrinhWeb/views/user/login.php');

$google_client = new Google_Client();
$google_client->setClientId(GOOGLE_CLIENT_ID);
$google_client->setClientSecret(GOOGLE_CLIENT_SECRET);
$google_client->setRedirectUri(GOOGLE_REDIRECT_URI);
$google_client->addScope('email');
$google_client->addScope('profile');
echo "Google_Client được khởi tạo thành công!";
?>