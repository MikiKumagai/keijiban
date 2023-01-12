CREATE USER apache_webserver IDENTIFIED BY 'uwfyzcyr';
GRANT ALL PRIVILEGES ON * . * TO apache_webserver;
FLUSH PRIVILEGES;

CREATE DATABASE ranking;

CREATE TABLE IF NOT EXISTS ranking.plan(
   `theme`     VARCHAR(30),
   `category`  INT,
   `comment`   VARCHAR(200),
   `date`      DATETIME,
   `active`    DATETIME,
   `thread_id` INT AUTO_INCREMENT,
   PRIMARY KEY (thread_id)
);
CREATE TABLE IF NOT EXISTS  ranking.vote(
   `name`      VARCHAR(30),
   `count`     INT,
   `id`        VARCHAR(13),
   `thread_id` INT
);
CREATE TABLE IF NOT EXISTS  ranking.user(
   `IP`        VARCHAR(15),
   `thread_id` INT
);
CREATE TABLE IF NOT EXISTS  ranking.bbs(
   `contents`  VARCHAR(200),
   `date`      DATETIME,
   `thread_id` INT,
   `name`      VARCHAR(30)
);