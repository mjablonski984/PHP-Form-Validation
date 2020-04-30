CREATE DATABASE burger_wizard

CREATE TABLE burgers (
    id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    type varchar(255) NOT NULL,
    roll varchar(255) NOT NULL,
    ingredients varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    created_at timestamp current_timestamp()
);