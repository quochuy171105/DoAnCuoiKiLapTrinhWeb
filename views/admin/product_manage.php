<!-- views/admin/product_manage.php -->
<?php
$page_title = 'Quản lý sản phẩm';
include __DIR__ . '/../layouts/admin_header.php';

?>
<h2>Quản lý sản phẩm</h2>
<a href="#" class="btn btn-success mb-3">Thêm sản phẩm</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Giá</th>
            <th>Tồn kho</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <!-- Dữ liệu sẽ được thêm bởi AdminProductController -->
    </tbody>
</table>
<?php include __DIR__ . '/../layouts/admin_footer.php'; ?>