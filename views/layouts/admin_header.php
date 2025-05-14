<!-- views/layouts/admin_header.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản trị Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/admin.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php?url=dashboard">
                <i class="fa fa-cogs me-2"></i> Admin Panel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php?url=dashboard">Tổng quan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php?url=products">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php?url=orders">Đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php?url=promotions">Khuyến mãi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php?url=revenue">Doanh thu</a>
                    </li>
                </ul>
                <span class="navbar-text text-light me-3">
                    Xin chào, <?= $_SESSION['user']['name'] ?? 'Admin' ?>
                </span>
                <a class="btn btn-outline-light btn-sm" href="<?= BASE_URL ?>logout.php">Đăng xuất</a>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
