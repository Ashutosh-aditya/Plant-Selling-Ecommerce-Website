-- CREATE TRIGGER decrease_stock_value
-- AFTER INSERT ON cart
-- FOR EACH ROW
-- BEGIN
--     UPDATE stock1
--     SET value = value - NEW.quantity
--     WHERE item_id = NEW.item_id;
-- END;

-- CREATE TRIGGER increase_stock_value
-- AFTER INSERT ON cart
-- FOR EACH ROW
-- BEGIN
--     UPDATE stock1
--     SET value = value - NEW.quantity
--     WHERE item_id = NEW.item_id;
-- END;

-- CREATE TRIGGER delete_cart_items
-- AFTER INSERT ON orders
-- FOR EACH ROW
-- BEGIN
--     DELETE FROM cart
--     WHERE user_id = NEW.user_id;
-- END;

-- CREATE TRIGGER `delete_cart_items` 
-- AFTER INSERT ON `orders` 
-- FOLLOWS 
-- FOR EACH ROW 
-- BEGIN 
--     DELETE FROM cart 
--     WHERE user_id = NEW.user_id; 
-- END



-- DELIMITER $$
-- CREATE TRIGGER concatenate_item_ids 
-- AFTER INSERT ON orders
-- FOR EACH ROW
-- BEGIN
--     SET @item_ids = (SELECT GROUP_CONCAT(item_id SEPARATOR '_') FROM items);
--     UPDATE orders SET itemlist = @item_ids WHERE order_id = NEW.order_id;
-- END $$
-- DELIMITER ;

CREATE TRIGGER `concatenate_item_ids` AFTER INSERT ON `orders` FOR EACH ROW BEGIN SET @item_ids = (SELECT GROUP_CONCAT(item_id SEPARATOR '_') FROM items); UPDATE orders SET itemlist = @item_ids WHERE order_id = NEW.order_id; END



-- DROP TRIGGER IF EXISTS `delete_cart_items`;
-- CREATE TRIGGER `delete_cart_items` 
-- AFTER INSERT ON `orders` 
-- -- FOLLOWS concatenate_item_ids
-- FOR EACH ROW 
-- BEGIN 
-- DELETE FROM cart 
-- WHERE user_id = NEW.user_id;
-- END
DROP TRIGGER IF EXISTS `delete_cart_items`;CREATE DEFINER=`root`@`localhost` TRIGGER `delete_cart_items` AFTER INSERT ON `orders` FOR EACH ROW BEGIN DELETE FROM cart WHERE user_id = NEW.user_id; END

-- working
    DROP TRIGGER IF EXISTS `concatenate_item_ids`;CREATE DEFINER=`root`@`localhost` TRIGGER `concatenate_item_ids` AFTER INSERT ON `orders` FOR EACH ROW BEGIN SET @item_ids = (SELECT GROUP_CONCAT(CONCAT(item_id,'-',quantity) SEPARATOR '_') FROM cart where USER_ID=new.USER_ID); UPDATE USERS SET PREVIOUS_ORDER = @item_ids WHERE ID=new.USER_ID; END
    OR
    DELIMITER $$
    CREATE TRIGGER concatenate_item_ids_quantity
    AFTER INSERT ON orders
    FOR EACH ROW
    BEGIN
        SET @item_list = (SELECT GROUP_CONCAT(CONCAT(item_id,':',quantity) SEPARATOR ', ') FROM cart where user_id=NEW.user_id);
        UPDATE orders SET itemlist = @item_list WHERE order_id = NEW.order_id;
    END $$
    DELIMITER ;



-- stockcount
-- CREATE PROCEDURE StockCount(IN itemId INT)
-- BEGIN
--     UPDATE stock1
--     SET IN_STOCK1 = IN_STOCK1 + 1
--     WHERE ITEM_ID = itemId and IN_STOCK1 >0;
-- END
