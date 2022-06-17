CREATE DATABASE CuaHangNongSan1 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use CuaHangNongSan1;

CREATE TABLE IF NOT EXISTS Categories
(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(100) NOT NULL UNIQUE,
    status tinyint(1) DEFAULT '1' COMMENT '1 is display, 0 hidden',
    priority tinyint(1) DEFAULT '0',
    created_at date DEFAULT NOW(),
    updated_at date DEFAULT NOW()
 
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS Banners
(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(200) NOT NULL,
    image varchar(200) NOT NULL,
    link varchar(255) DEFAULT '#',
    description varchar(255),
    status tinyint(1) DEFAULT '1' COMMENT '1 is display, 0 hidden',
    priority tinyint(1) DEFAULT '0',
    created_at date DEFAULT NOW(),
    updated_at date DEFAULT NOW()
 
) ENGINE = InnoDB;

-- Chua rang buoc khoa
CREATE TABLE IF NOT EXISTS Product
(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(200) NOT NULL,
    image varchar(200) NOT NULL,
    price float(9,3) NOT NULL,
    sale_price float(9,3) DEFAULT 0,
    description text,
    status tinyint(1) DEFAULT '1' COMMENT '1 is display, 0 hidden',
    category_id int NOT NULL,
    created_at date DEFAULT NOW(),
    updated_at date DEFAULT NOW(),
    CONSTRAINT 'fk_products_categories' FOREIGN KEY (category_id) REFERENCES Categories(id) 
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Blogs
(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(100) NOT NULL UNIQUE,
    image varchar(200) NOT NULL,
    sumary varchar(255),
    description text,
    status tinyint(1) DEFAULT '1' COMMENT '1 is display, 0 hidden',  
    created_at date DEFAULT NOW(),
    updated_at date DEFAULT NOW()
    user_id bigint(20) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Orders
(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    email varchar(200) NOT NULL,
    phone varchar(200) NOT NULL,
    address varchar(200) NOT NULL,
    note text,
    status tinyint(1) DEFAULT '1' COMMENT '1 is display, 0 hidden',  
    created_at date DEFAULT NOW(),
    updated_at date DEFAULT NOW(),
    user_id bigint(20) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Orders_detail
(
    order_id int NOT NULL,
    product_id int NOT NULL,
    quantity int NOT NULL,
    price float NOT NULL,
    FOREIGN KEY (order_id) REFERENCES Orders(id),
    FOREIGN KEY (product_id) REFERENCES Product(id)
) ENGINE = InnoDB;

php  artisan make:controller BannerController --model=Banners
php  artisan make:controller AccountController --model=Accounts 
php  artisan make:controller BlogController --model=Blog
php  artisan make:controller OrderController --model=Orders