# Dự án cuối kỳ Lập trình Web

## Giới thiệu
Website thương mại điện tử bán đồ công nghệ, tương tự ShopDunk, sử dụng PHP, MySQL, Bootstrap, jQuery.

## Cài đặt
1. **Cơ sở dữ liệu**:
   - Tạo cơ sở dữ liệu `doancuoikylaptrinhweb`.
   - Chạy file `sql/database.sql` để tạo bảng và dữ liệu mẫu.
   - Cấu hình kết nối trong `config/database.php`.

2. **Cấu hình web**:
   - Sao chép dự án vào thư mục web server (ví dụ: `/var/www/html/DoAnCuoiKyLapTrinhWeb`).
   - Cập nhật `BASE_URL` trong `config/config.php`.
   - Đảm bảo Apache bật `mod_rewrite` cho `.htaccess`.

3. **Google OAuth**:
   - Đăng ký tại Google Cloud Console.
   - Cập nhật `GOOGLE_CLIENT_ID`, `GOOGLE_CLIENT_SECRET` trong `config/google_oauth.php`.

## Cấu trúc thư mục
- `assets/`: CSS, JS, hình ảnh.
- `config/`: Cấu hình hệ thống.
- `controllers/`: Bộ điều khiển MVC.
- `models/`: Mô hình dữ liệu.
- `views/`: Giao diện người dùng và admin.
- `services/`: Xử lý AJAX.

## Thành viên
- Huy (Thành viên 4): Quản lý admin, thông báo, cấu hình hệ thống.

## Tiến độ
- Tuần 1: Thiết kế giao diện, cấu hình hệ thống, thiết lập cơ sở dữ liệu.