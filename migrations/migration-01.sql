-- Shopping list seeding DDL script
-- Created: 2024-02-15

-- create db if not exists
CREATE DATABASE IF NOT EXISTS ShoppingListDB;

-- use db
USE ShoppingListDB;

-- create table if not exists
CREATE TABLE IF NOT EXISTS shopping_list (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_title VARCHAR(50) NOT NULL,
    is_checked BOOLEAN DEFAULT FALSE,
    is_deleted BOOLEAN DEFAULT FALSE
);

-- insert default data if not exists
INSERT INTO shopping_list (product_title)
SELECT 'Milk' 
WHERE NOT EXISTS (SELECT 1 FROM shopping_list WHERE product_title = 'Milk')
UNION ALL
SELECT 'Bread'
WHERE NOT EXISTS (SELECT 1 FROM shopping_list WHERE product_title = 'Bread')
UNION ALL
SELECT 'Eggs'
WHERE NOT EXISTS (SELECT 1 FROM shopping_list WHERE product_title = 'Eggs');
