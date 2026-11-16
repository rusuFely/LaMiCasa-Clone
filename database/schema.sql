CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    user_password VARCHAR(255) NOT NULL,
    phone VARCHAR(30) DEFAULT NULL,
    user_type ENUM('CLIENT', 'ADMIN') DEFAULT 'CLIENT',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    slug VARCHAR(150) UNIQUE NOT NULL,
    parent_id INT DEFAULT NULL,
    image VARCHAR(255) DEFAULT NULL,
    is_featured BOOLEAN DEFAULT FALSE,

    FOREIGN KEY (parent_id) REFERENCES categories(id)
        ON DELETE RESTRICT
);

CREATE TABLE brands (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) UNIQUE NOT NULL,
    slug VARCHAR(150) UNIQUE NOT NULL,
    logo VARCHAR(255) DEFAULT NULL
);

CREATE TABLE products(
    id INT PRIMARY KEY AUTO_INCREMENT,
    brand_id INT DEFAULT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT DEFAULT NULL,
    image_path VARCHAR(100) DEFAULT NULL,
    price DECIMAL(10, 2) NOT NULL,
    sale_price DECIMAL(10,2) DEFAULT NULL,
    stock INT NOT NULL DEFAULT 0,
    is_recommended BOOLEAN DEFAULT FALSE,
    sku VARCHAR(100) UNIQUE DEFAULT NULL,
    barcode VARCHAR(100) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (brand_id) REFERENCES brands(id) ON DELETE RESTRICT
);

CREATE TABLE product_categories (
    product_id INT NOT NULL, 
    category_id INT NOT NULL, 
    PRIMARY KEY (product_id, category_id),
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE RESTRICT
);

CREATE VIEW categories_hierarchy AS
SELECT
    c.name AS categorie_principala,
    s.name AS subcategorie,
    ss.name AS subsubcategorie
FROM categories c
LEFT JOIN categories s ON s.parent_id = c.id
LEFT JOIN categories ss ON ss.parent_id = s.id
WHERE c.parent_id IS NULL;

-- price DECIMAL(10,2) NOT NULL CHECK (price >= 0),
-- sale_price DECIMAL(10,2) DEFAULT NULL CHECK (sale_price >= 0),
-- stock INT NOT NULL DEFAULT 0 CHECK (stock >= 0),