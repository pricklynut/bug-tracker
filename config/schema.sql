CREATE TABLE tasks (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(255) NOT NULL,
  task TEXT NOT NULL,
  image VARCHAR(255),
  status ENUM('finished', 'new') NOT NULL DEFAULT 'new'
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO tasks (username, email, task, status) VALUES ('Владимир', 'vladimir@example.com', 'Описание первой задачи', 'finished');
INSERT INTO tasks (username, email, task) VALUES ('Александр', 'alexander@example.com', 'Описание второй задачи');
INSERT INTO tasks (username, email, task) VALUES ('Ирина', 'irina@example.com', 'Описание третьей задачи');
INSERT INTO tasks (username, email, task) VALUES ('Андрей', 'andrey@example.com', 'Описание четвертой задачи');
INSERT INTO tasks (username, email, task, status) VALUES ('Виталий', 'vitaliy@example.com', 'Описание пятой задачи', 'finished');
INSERT INTO tasks (username, email, task) VALUES ('Дмитрий', 'dmitriy@example.com', 'Описание шестой задачи');
INSERT INTO tasks (username, email, task) VALUES ('Анна', 'anna@example.com', 'Описание седьмой задачи');
INSERT INTO tasks (username, email, task) VALUES ('Евгений', 'evgeniy@example.com', 'Описание восьмой задачи');
INSERT INTO tasks (username, email, task) VALUES ('Роман', 'roman@example.com', 'Описание девятой задачи');
INSERT INTO tasks (username, email, task) VALUES ('Елена', 'elena@example.com', 'Описание десятой задачи');
