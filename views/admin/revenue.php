<!-- views/admin/revenue.php -->
<?php
$page_title = 'Thống kê doanh thu';
$include_chart_js = true; // Tải chart.min.js
include __DIR__ . '/../layouts/admin_header.php';

?>
<h2>Thống kê doanh thu</h2>
<div class="row">
    <div class="col-md-12">
        <canvas id="revenueChart"></canvas>
    </div>
</div>
<?php include __DIR__ . '/../layouts/admin_footer.php'; ?>