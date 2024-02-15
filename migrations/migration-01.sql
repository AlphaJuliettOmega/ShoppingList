-- Shopping list seeding DDL script
-- Created: 2024-02-15

CREATE TABLE shopping_list (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_title VARCHAR(50) NOT NULL,
    is_checked BOOLEAN DEFAULT FALSE,
    -- column for soft delete
    is_deleted BOOLEAN DEFAULT FALSE
);
