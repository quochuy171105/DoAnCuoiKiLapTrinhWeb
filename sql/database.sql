-- Tạo cơ sở dữ liệu
CREATE DATABASE IF NOT EXISTS doancuoikylaptrinhweb;
USE doancuoikylaptrinhweb;

-- Bảng users: Lưu thông tin người dùng (khách hàng, admin)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Mật khẩu mã hóa bằng password_hash
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    role ENUM('customer', 'admin') DEFAULT 'customer',
    google_id VARCHAR(255), -- ID từ Google OAuth
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Bảng addresses: Lưu địa chỉ giao hàng của người dùng
CREATE TABLE addresses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    address_line VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    postal_code VARCHAR(20),
    country VARCHAR(100) NOT NULL,
    is_default BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Bảng categories: Lưu danh mục sản phẩm
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT
);

-- Bảng brands: Lưu thương hiệu
CREATE TABLE brands (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    logo VARCHAR(255) -- Đường dẫn đến logo thương hiệu
);

-- Bảng products: Lưu thông tin sản phẩm
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    brand_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    image VARCHAR(255), -- Đường dẫn đến hình ảnh
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE RESTRICT,
    FOREIGN KEY (brand_id) REFERENCES brands(id) ON DELETE RESTRICT
);

-- Bảng product_attributes: Lưu thuộc tính kỹ thuật của sản phẩm (RAM, dung lượng, ...)
CREATE TABLE product_attributes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    attribute_name VARCHAR(100) NOT NULL, -- Ví dụ: RAM, Dung lượng
    attribute_value VARCHAR(255) NOT NULL, -- Ví dụ: 8GB, 256GB
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Bảng cart: Lưu giỏ hàng
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Bảng promotions: Lưu mã khuyến mãi
CREATE TABLE promotions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL UNIQUE,
    discount_type ENUM('percentage', 'fixed') NOT NULL,
    discount_value DECIMAL(10, 2) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    min_order_amount DECIMAL(10, 2), -- Giá trị đơn hàng tối thiểu để áp dụng
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bảng orders: Lưu đơn hàng
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    address_id INT NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    promotion_id INT, -- Mã khuyến mãi áp dụng (nếu có)
    payment_method ENUM('cod', 'bank_transfer', 'e_wallet') NOT NULL,
    status ENUM('pending', 'processing', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE RESTRICT,
    FOREIGN KEY (address_id) REFERENCES addresses(id) ON DELETE RESTRICT,
    FOREIGN KEY (promotion_id) REFERENCES promotions(id) ON DELETE SET NULL
);

-- Bảng order_details: Lưu chi tiết đơn hàng
CREATE TABLE order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL, -- Giá tại thời điểm đặt hàng
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE RESTRICT
);

-- Bảng feedback: Lưu đánh giá và bình luận sản phẩm
CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    rating INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Bảng notifications: Lưu thông báo
CREATE TABLE notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Bảng recently_viewed: Lưu sản phẩm đã xem
CREATE TABLE recently_viewed (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    viewed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Bảng revenue: Lưu dữ liệu doanh thu
CREATE TABLE revenue (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    revenue_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
);

-- Thêm dữ liệu mẫu
-- Users
INSERT INTO users (email, password, name, phone, role) VALUES
('customer1@example.com', '$2y$10$examplehash', 'Nguyen Van A', '0123456789', 'customer'),
('admin@example.com', '$2y$10$examplehash', 'Admin User', '0987654321', 'admin');

-- Addresses
INSERT INTO addresses (user_id, address_line, city, postal_code, country, is_default) VALUES
(1, '123 Đường Láng', 'Hà Nội', '100000', 'Vietnam', TRUE);

-- Categories
INSERT INTO categories (name, description) VALUES
('Điện thoại', 'Các dòng điện thoại thông minh'),
('Laptop', 'Máy tính xách tay');

-- Brands
INSERT INTO brands (name, logo) VALUES
('Apple', '/images/brands/apple.png'),
('Samsung', '/images/brands/samsung.png');

-- Products
INSERT INTO products (category_id, brand_id, name, description, price, stock, image) VALUES
(1, 1, 'iPhone 14 Pro', 'Điện thoại cao cấp từ Apple', 999.99, 50, '/images/products/iphone14pro.jpg'),
(2, 2, 'Samsung Galaxy Book', 'Laptop mạnh mẽ từ Samsung', 1299.99, 30, '/images/products/galaxybook.jpg');

-- Product Attributes
INSERT INTO product_attributes (product_id, attribute_name, attribute_value) VALUES
(1, 'RAM', '6GB'),
(1, 'Dung lượng', '128GB'),
(2, 'CPU', 'Intel Core i7'),
(2, 'Dung lượng', '512GB');

-- Promotions
INSERT INTO promotions (code, discount_type, discount_value, start_date, end_date, min_order_amount) VALUES
('SALE2023', 'percentage', 10.00, '2023-01-01', '2023-12-31', 500.00);