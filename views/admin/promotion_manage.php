<!-- views/admin/promotion_manage.php -->
<?php
$page_title = 'Quản lý khuyến mãi';
include __DIR__ . '/../layouts/admin_header.php';

?>
<h2>Quản lý khuyến mãi</h2>
<a href="#" class="btn btn-success mb-3">Thêm khuyến mãi</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Mã</th>
            <th>Loại</th>
            <th>Giá trị</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <!-- Dữ liệu sẽ được thêm bởi AdminPromotionController -->
    </tbody>
</table>
<?php include __DIR__ . '/../layouts/admin_footer.php'; ?>