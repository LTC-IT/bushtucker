create table IF NOT EXISTS orderDetails
(
    orderDetails_id INTEGER      not null
        primary key autoincrement,
    orderCode       VARCHAR(100) not null,
    customerID      INTEGER      not null,
    productCode     VARCHAR(100) not null,
    orderDate       DATETIME,
    quantity        INTEGER,
    status          VARCHAR(50) default 'OPEN' not null
);