CREATE VIEW oper_view_cus AS
SELECT CFName, CLName, CEmail, CAddress1, CAddress2, CAddress3, CTPno
FROM customer;

CREATE VIEW stock_view_items AS
SELECT ItemID, ItemName, Quantity
FROM items;

CREATE VIEW oper_view_items AS
SELECT ItemID, ItemName, type, price
FROM items;

CREATE VIEW oper_view_order AS
SELECT customer.CFName, customer.CLName, items.ItemName, Orders.Quantity, Orders.Dateissue, Orders.DeliverDate
FROM customer,items,Orders
WHERE (customer.CID=Orders.CID) AND (items.ItemID=Orders.OrderID);

CREATE VIEW stock_view_order AS
SELECT Orders.OrderID, items.ItemID, items.ItemName, customer.CAddress1, customer.CAddress2 ,customer.CAddress3, Orders.DeliverDate
FROM customer,items,Orders
WHERE (customer.CID=Orders.CID) AND (items.ItemID=Orders.ItemID) AND (Orders.Statues LIKE '%delivered%') AND (Orders.type LIKE '%stock%');

CREATE VIEW factory_view_orders AS
SELECT Orders.OrderID, items.ItemID, items.ItemName, customer.CAddress1, customer.CAddress2 ,customer.CAddress3, Orders.DeliverDate
FROM customer,items,Orders
WHERE (customer.CID=Orders.CID) AND (items.ItemID=Orders.ItemID) AND (Orders.Statues LIKE '%undelivered%')AND (Orders.type LIKE '%factory%');
