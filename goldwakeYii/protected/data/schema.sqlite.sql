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

INSERT INTO tbl_category (id, super_id, name) VALUES (1, NULL, 'Shortboards');
INSERT INTO tbl_category (id, super_id, name) VALUES (2, NULL, 'Longboards');
INSERT INTO tbl_category (id, super_id, name) VALUES (3, NULL, 'Softboards');

/* Category #1: Shortboards */
INSERT INTO tbl_product (id, category_id, name, price) VALUES (1, 1, 'Bic Surf DURA-TEC 6''7', 229.94);
INSERT INTO tbl_product (id, category_id, name, price) VALUES (2, 1, 'Bic Surf DURA-TEC 7''0 EGG', 239.95);
INSERT INTO tbl_product (id, category_id, name, price) VALUES (3, 1, 'Bic Surf DURA-TEC 5''10 Fish', 199.94);

/* Category #2: Longboards */
INSERT INTO tbl_product (id, category_id, name, price) VALUES (4, 2, 'Bic Surf DURA-TEC 9''4 Super Magnum', 409.94);
INSERT INTO tbl_product (id, category_id, name, price) VALUES (5, 2, 'Bic Surf Bic 9''4 Nat Young', 478.99);
INSERT INTO tbl_product (id, category_id, name, price) VALUES (6, 2, 'Circle One 10'' Heritage Custom', 480.00);

/* Category #2: Softboards */
INSERT INTO tbl_product (id, category_id, name, price) VALUES (7, 3, 'Bic Surf 5''6 G Board Kid Twin Fin', 249.00);
INSERT INTO tbl_product (id, category_id, name, price) VALUES (8, 3, 'Bic Surf 6''6 G Board Classic', 298.99);
INSERT INTO tbl_product (id, category_id, name, price) VALUES (9, 3, 'Soft Surfboards 6''0 Beginner', 119.00);
