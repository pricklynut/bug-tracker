CREATE TABLE tasks (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(255) NOT NULL,
  task TEXT NOT NULL,
  image VARCHAR(255),
  status ENUM('finished', 'new') NOT NULL DEFAULT 'new'
) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO tasks (username, email, task, status) VALUES ('Владимир', 'vladimir@example.com', 'Lorem ipsum dolor sit amet,
    consectetur adipisicing elit. Asperiores at ex
    excepturi fugit in obcaecati qui repudiandae sapiente voluptatibus? Commodi
    debitis doloremque ea fugiat in, maxime nisi quibusdam sapiente tempore!', 'finished');
INSERT INTO tasks (username, email, task) VALUES ('Александр', 'alexander@example.com',
    'Cum dolores enim excepturi, fuga ipsum, nam numquam odio officia,
    praesentium provident quasi quia quibusdam quidem sed similique sint
    tempore. Adipisci earum eius illo officiis perferendis quasi! Libero
    possimus, ullam!');
INSERT INTO tasks (username, email, task) VALUES ('Ирина', 'irina@example.com',
    'Mollitia natus porro praesentium quam rem repudiandae sit. Assumenda cum
    debitis deleniti, dolore eveniet id ipsa laboriosam quaerat quia veniam.
    Amet consequuntur eos est fugit hic in magni, porro provident.');
INSERT INTO tasks (username, email, task) VALUES ('Андрей', 'andrey@example.com',
    'Adipisci cumque, et eveniet ex hic in laboriosam nemo obcaecati pariatur
    recusandae reiciendis ut voluptas? Corporis cum doloremque esse facere magni
    molestiae nihil quam voluptates. Dolorum earum excepturi molestiae non!');
INSERT INTO tasks (username, email, task, status) VALUES ('Виталий', 'vitaliy@example.com',
    'Ab, accusantium aliquam blanditiis consectetur cumque dolore eius eligendi
    eveniet id inventore ipsum natus necessitatibus nisi officia omnis optio
    perferendis praesentium quibusdam reiciendis repellat reprehenderit sequi
    suscipit tempore. Quae, recusandae!', 'finished');
INSERT INTO tasks (username, email, task) VALUES ('Дмитрий', 'dmitriy@example.com',
    'Accusantium aspernatur beatae blanditiis commodi deleniti dicta distinctio
    dolor et eum iusto libero nesciunt nihil nostrum odio odit quam qui quia
    recusandae, reiciendis rem reprehenderit sapiente soluta ut velit voluptas.');
INSERT INTO tasks (username, email, task) VALUES ('Анна', 'anna@example.com',
    'Animi ducimus eligendi excepturi id in laborum magni nam nesciunt qui
    voluptatem. Ab consectetur culpa, eos eveniet expedita inventore laborum
    libero maiores neque officiis perspiciatis, possimus quibusdam quis soluta
    vitae?');
INSERT INTO tasks (username, email, task) VALUES ('Евгений', 'evgeniy@example.com',
    'Ad animi consequatur corporis delectus deserunt dolore, dolores ea eius
    enim eveniet harum impedit incidunt itaque libero, nisi porro, quia
    quibusdam quisquam quo suscipit unde vel velit voluptatem voluptates
    voluptatibus.');
INSERT INTO tasks (username, email, task) VALUES ('Роман', 'roman@example.com',
    'Consectetur enim excepturi hic, libero nulla sint velit. Blanditiis
    consequuntur culpa doloremque ea facilis id ipsam iure, necessitatibus
    obcaecati officia possimus, quod reprehenderit sint suscipit temporibus
    velit veniam vero voluptas!');
INSERT INTO tasks (username, email, task) VALUES ('Елена', 'elena@example.com',
    'At blanditiis doloribus eligendi enim eos est et eveniet facilis laboriosam
    nesciunt non odit possimus quas quod sapiente sint, veniam voluptates.
    Aliquam laudantium molestiae molestias optio perspiciatis quod voluptates!
    Ducimus!');
