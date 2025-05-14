<!-- views/admin/order_manage.php -->
<?php
$page_title = 'Quản lý đơn hàng';
include __DIR__ . '/../layouts/admin_header.php';

?>
<h2>Quản lý đơn hàng</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Khách hàng</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Ngày đặt</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <!-- Dữ liệu sẽ được thêm bởi AdminOrderController -->
    </tbody>
</table>
<?php include __DIR__ . '/../layouts/admin_footer.php'; ?>