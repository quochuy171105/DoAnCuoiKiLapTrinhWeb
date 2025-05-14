<?php
require_once __DIR__ . '/google_oauth.php';
$login_url = $google_client->createAuthUrl();
echo "<a href='$login_url'>Đăng nhập với Google</a>";
?>