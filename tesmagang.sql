-- create database penjualan; --

create table Customers(
customer_id INT PRIMARY KEY AUTO_INCREMENT,
	customer_name VARCHAR(100),
	customer_city VARCHAR(255)
);

create table Salesmans(
salesman_id INT PRIMARY KEY AUTO_INCREMENT,
    salesman_name VARCHAR(100),
    salesman_city varchar(100),
    commission DECIMAL(5, 2)
);

CREATE TABLE Orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT,
    salesman_id INT,
    order_date DATE,
    amount DECIMAL(10, 2),
    FOREIGN KEY (customer_id) REFERENCES Customers(customer_id),
    FOREIGN KEY (salesman_id) REFERENCES Salesmans(salesman_id)
);


ALTER TABLE Orders
ADD CONSTRAINT FK_Orders_Customers
FOREIGN KEY (customer_id) REFERENCES Customers(customer_id)
ON DELETE CASCADE;

ALTER TABLE Orders
ADD CONSTRAINT FK_Orders_Salesmans
FOREIGN KEY (salesman_id) REFERENCES Salesmans(salesman_id)
ON DELETE CASCADE;

SELECT customer_id, COUNT(DISTINCT salesman_id) AS total_salesmen
FROM Orders
GROUP BY customer_id
HAVING COUNT(DISTINCT salesman_id) >= 2;

SELECT salesman_name, MAX(commission) AS highest_commission
FROM Salesmans
GROUP BY salesman_name
ORDER BY highest_commission DESC
LIMIT 1;

DESCRIBE customers;
