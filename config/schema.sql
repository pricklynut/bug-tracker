CREATE TABLE tasks (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(255) NOT NULL,
  task TEXT NOT NULL,
  image VARCHAR(255),
  status ENUM('finished', 'new') NOT NULL DEFAULT 'new'
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO tasks (username, email, task) VALUES ('user1', 'user1@example.com', 'Описание первой задачи');
INSERT INTO tasks (username, email, task) VALUES ('user2', 'user2@example.com', 'Описание второй задачи');
INSERT INTO tasks (username, email, task) VALUES ('user1', 'user1@example.com', 'Описание третьей задачи');
INSERT INTO tasks (username, email, task) VALUES ('user3', 'user3@example.com', 'Описание четвертой задачи');
INSERT INTO tasks (username, email, task) VALUES ('user2', 'user2@example.com', 'Описание пятой задачи');
INSERT INTO tasks (username, email, task) VALUES ('user1', 'user1@example.com', 'Описание шестой задачи');
INSERT INTO tasks (username, email, task) VALUES ('user1', 'user1@example.com', 'Описание седьмой задачи');
INSERT INTO tasks (username, email, task) VALUES ('user3', 'user3@example.com', 'Описание восьмой задачи');
INSERT INTO tasks (username, email, task) VALUES ('user2', 'user2@example.com', 'Описание девятой задачи');
INSERT INTO tasks (username, email, task) VALUES ('user1', 'user1@example.com', 'Описание десятой задачи');
