 create database demo;
 
 use demo;
 
 create table product (
	id int(6) auto_increment primary key,
    product_name varchar(255) not null,
    price int default 0,
    url_img varchar(255)
 );
 
insert into product(product_name, price, url_img) values
('Product 2', 300, 'iphone-11-pro-max-green.jpg'),
('Product 3', 500, 'oppo-a92-tim.jpg'),
('Product 4', 340, 'samsung-galaxy-a71.jpg'),
('Product 5', 550, 'samsung-galaxy-note-20.jpg'),
('Product 6', 600, 'xiaomi-redmi-note-9.jpg')