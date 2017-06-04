GRANT ALL PRIVILEGES ON * . * TO 'manager'@'localhost';

GRANT SELECT ON `woodsart`.`customer` TO 'stock'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON `woodsart`.`items` TO 'stock'@'localhost';
GRANT SELECT, UPDATE ON `woodsart`.`Orders` TO 'stock'@'localhost';
GRANT SELECT ON `woodsart`.`factory_view_orders` TO 'stock'@'localhost';
GRANT SELECT ON `woodsart`.`oper_view_cus` TO 'stock'@'localhost';
GRANT SELECT, INSERT, UPDATE ON `woodsart`.`stock_view_items` TO 'stock'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON `woodsart`.`stock_view_order` TO 'stock'@'localhost';

GRANT SELECT, INSERT, UPDATE (`CID`, `CFName`, `CLName`, `CEmail`, `CAddress1`, `CAddress2`, `CAddress3`, `CTPno`) ON `woodsart`.`customer` TO 'operator'@'localhost';
GRANT SELECT, INSERT, UPDATE ON `woodsart`.`oper_view_order` TO 'operator'@'localhost';
GRANT SELECT, INSERT ON `woodsart`.`Orders` TO 'operator'@'localhost';
GRANT SELECT ON `woodsart`.`items` TO 'operator'@'localhost';
GRANT SELECT ON `woodsart`.`oper_view_cus` TO 'operator'@'localhost';
GRANT SELECT ON `woodsart`.`oper_view_items` TO 'operator'@'localhost';
