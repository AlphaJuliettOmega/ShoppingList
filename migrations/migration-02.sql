-- Shopping list extra column for default timestamps
-- Created: 2024-02-15

-- use db
USE ShoppingListDB;

ALTER TABLE shopping_list 
    ADD created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ADD updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;
