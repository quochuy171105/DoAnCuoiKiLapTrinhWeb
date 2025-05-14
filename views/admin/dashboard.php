<!-- views/admin/dashboard.php -->
<?php
$page_title = 'Tổng quan';
include __DIR__ . '/../layouts/admin_header.php';

?>
<h2>Tổng quan</h2>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tổng đơn hàng</h5>
                <p class="card-text">0</p> <!-- Sẽ cập nhật từ AdminController -->
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Doanh thu</h5>
                <p class="card-text">0 VND</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Sản phẩm</h5>
                <p class="card-text">0</p>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/../layouts/admin_footer.php'; ?>