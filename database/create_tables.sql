CREATE TABLE IF NOT EXISTS users (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    login VARCHAR(255) NOT NULL UNIQUE,
    email varchar(255) NOT NULL UNIQUE,
    password TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS themes (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS domains (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL UNIQUE,
    theme_id int,
    FOREIGN KEY (theme_id) REFERENCES themes(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS skills (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL UNIQUE,
    level varchar(255) NOT NULL,
    domain_id int,
    FOREIGN KEY (domain_id) REFERENCES domains(id) ON DELETE CASCADE
);