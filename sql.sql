CREATE DATABASE IF NOT EXISTS deathgates;
use deathgates;

CREATE TABLE IF NOT EXISTS users(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(24) NOT NULL UNIQUE,
  password VARCHAR(40) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE
);
CREATE TABLE IF NOT EXISTS bios(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  firstName VARCHAR(20) DEFAULT('Sem Informacoes'),
  lastName VARCHAR(20) DEFAULT('Sem Informacoes'),
  description VARCHAR(255) DEFAULT('Usuario Sem Descricao'),
  user_id INT,
  FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS playersCombat(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  kills INT DEFAULT(0),
  deaths INT DEFAULT(0),
  user_id INT,
  FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE

);
CREATE TABLE IF NOT EXISTS playersBank(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  user_id INT,
  money INT DEFAULT(2500),
  FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO users(username, password, email) VALUES('Eriton', '123456', 'botheritons@gmail.com');
INSERT INTO bios(firstName, lastName, user_id) VALUES(
  'Eriton', 
  'Junior', 
  1);

INSERT INTO playersCombat(kills, deaths, user_id) VALUES(
  100,
  0,
  1
);

INSERT INTO playersBank(money, user_id) VALUES(
  1000000,
  1
);
