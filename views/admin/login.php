<!-- views/admin/login.php -->
<?php
$page_title = 'Đăng nhập Admin';
include __DIR__ . '/../layouts/admin_header.php';
?>
<div class="row justify-content-center">
    <div class="col-md-4">
        <h2 class="text-center mb-4">Đăng nhập Admin</h2>
        <form action="<?php echo BASE_URL; ?>admin.php?url=login" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
        </form>
    </div>
</div>
<?php include __DIR__ . '/../layouts/admin_footer.php'; ?>