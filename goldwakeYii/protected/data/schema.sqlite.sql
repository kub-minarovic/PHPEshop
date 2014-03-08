CREATE TABLE tbl_user (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL,
    name VARCHAR(128) NOT NULL
    surname VARCHAR(128) NOT NULL
    phone VARCHAR(20)
    role INTEGER

);
CREATE TABLE tbl_product (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(128) NOT NULL,
    category_id INTEGER,
    price FLOAT
);
CREATE TABLE tbl_order (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER,
  user_name VARCHAR(128) NOT NULL,
  user_surname VARCHAR(128) NOT NULL,
  user_email VARCHAR(128) NOT NULL,
  user_phone VARCHAR(20) NOT NULL,
  billing_address VARCHAR(150) NOT NULL,
  shipping_address VARCHAR(150),
  status INTEGER NOT NULL
);
CREATE TABLE tbl_order_product (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  product_id INTEGER NOT NULL,
  product_price FLOAT NOT NULL,
  quantity INTEGER NOT NULL,
);
CREATE TABLE tbl_category (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  super_id INTEGER,
  name VARCHAR(128)
);
CREATE TABLE tbl_wishlist (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER NOT NULL,
  name VARCHAR(128)
);
CREATE TABLE tbl_wishlist_product (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  wishlist_id INTEGER NOT NULL,
  product_id INTEGER NOT NULL
);

INSERT INTO tbl_user (username, password, email) VALUES ('admin', 'admin', 'admin@example.com');
