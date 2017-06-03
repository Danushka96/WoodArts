GRANT ALL PRIVILEGES ON * . * TO 'manager'@'localhost';

GRANT INSERT,SELECT,UPDATE ON woodsart.customer TO ‘operator’@'localhost';
GRANT SELECT ON woodsart.items TO ‘operator’@'localhost';
GRANT INSERT,SELECT ON woodsart.Orders TO ‘operator’@'localhost';
GRANT SELECT ON woodsart.users TO ‘operator’@'localhost';
GRANT SELECT ON woodsart.showrooms TO ‘operator’@'localhost';

GRANT SELECT ON woodsart.customer TO ‘stock’@'localhost';
GRANT SELECT,UPDATE,INSERT,DELETE ON woodsart.items TO ‘stock’@'localhost';
GRANT SELECT,UPDATE ON woodsart.Orders TO ‘stock’@'localhost';
GRANT SELECT ON woodsart.users TO ‘stock’@'localhost';
GRANT SELECT ON woodsart.showrooms TO ‘stock’@'localhost';
