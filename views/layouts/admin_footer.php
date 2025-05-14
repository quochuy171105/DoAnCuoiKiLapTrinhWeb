<!-- views/layouts/admin_footer.php -->
    </main>

    <footer class="bg-dark text-light text-center py-3 mt-4">
        <div class="container">
            &copy; <?= date('Y') ?> - Hệ thống quản trị website | Nhóm 7
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="<?= BASE_URL ?>assets/js/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/admin.js"></script>

    <?php
    // Tùy chọn load Chart.js khi là trang doanh thu
    if (isset($_GET['url']) && $_GET['url'] === 'revenue') {
        echo '<script src="' . BASE_URL . 'assets/js/chart.min.js"></script>';
    }
    ?>
</body>
</html>
