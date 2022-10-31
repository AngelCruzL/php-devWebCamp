CREATE DATABASE IF NOT EXISTS devwebcamp;

USE devwebcamp;

CREATE TABLE IF NOT EXISTS users (
	id INT(11) AUTO_INCREMENT,
	first_name VARCHAR(40) NOT NULL,
	last_name VARCHAR(40) NOT NULL,
	email VARCHAR(40) NOT NULL,
	password CHAR(60) NOT NULL,
	token CHAR(13) DEFAULT NULL,
	is_confirmed TINYINT(1) NOT NULL DEFAULT 0,
	is_admin TINYINT(1) NOT NULL DEFAULT 0,
	PRIMARY KEY (id)
);

INSERT INTO users (
	first_name,
	last_name,
	email,
	password,
	is_confirmed,
	is_admin
) VALUES (
	'Ángel',
	'Cruz',
	'admin@test.com',
	'$2y$10$yGtTR.0evE/4AgIiun/u1eTGJBfnTgDU7MlrZLAMmXkANsYxzSpEG',
	1,
	1
), (
	'Luis',
	'Lara',
	'client@test.com',
	'$2y$10$yGtTR.0evE/4AgIiun/u1eTGJBfnTgDU7MlrZLAMmXkANsYxzSpEG',
	1,
	0
);

CREATE TABLE IF NOT EXISTS speakers (
	id INT(11) AUTO_INCREMENT,
	first_name VARCHAR(40) NOT NULL,
	last_name VARCHAR(40) NOT NULL,
	city VARCHAR(40),
	country VARCHAR(20),
	image VARCHAR(32),
	tags VARCHAR(120),
	social_networks TEXT,
	PRIMARY KEY (id)
);

INSERT INTO speakers (
	id,
	first_name,
	last_name,
	city,
	country,
	image,
	tags,
	social_networks
) VALUES (
	1,
	'Julian',
	'Muñoz',
	'Madrid',
	'España',
	'6764a74ccf2b4b5b74e333016c13388a',
	'React,PHP,Laravel',
	'{\"facebook\":\"https://facebook.com/\",\"twitter\":\"https://twitter.com/\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/\",\"tiktok\":\"\",\"github\":\"https://github.com/\"}'
), (
	2,
	'Israel',
	'González',
	'CDMX',
	'México',
	'6497c66bcc464e26871c046dd5bb86c8',
	'Vue,Node.js,MongoDB',
	'{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/\",\"instagram\":\"https://instagram.com/\",\"tiktok\":\"https://tiktok.com\",\"github\":\"https://github.com/\"}'
), (
	3,
	'Isabella',
	'Tassis',
	'Buenos Aires',
	'Argentina',
	'55c7866df31370ec3299eed6eb63daa1',
	'UX / UI,HTML,CSS,TailwindCSS',
	'{\"facebook\":\"https://facebook.com/\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/\",\"instagram\":\"\",\"tiktok\":\"https://tiktok.com\",\"github\":\"\"}'
), (
	4,
	'Jazmín',
	'Hurtado',
	'CDMX',
	'México',
	'de6e3fa0cde8402de4c28e6be0903ada',
	'Django,React, Vue.js',
	'{\"facebook\":\"\",\"twitter\":\"https://twitter.com/\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/\",\"tiktok\":\"\",\"github\":\"https://github.com/\"}'
), (
	5,
	'María Camila',
	'Murillo',
	'Guadalajara',
	'México',
	'cec8c9d7bcb4c19e87d1164bce8fe176',
	'Devops,Git,CI CD',
	'{\"facebook\":\"https://facebook.com/\",\"twitter\":\"https://twitter.com/\",\"youtube\":\"https://youtube.com/\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'
), (
	6,
	'Tomas',
	'Aleman',
	'Bogotá',
	'Colombia',
	'5332118b8d7690a1b992431802eafab1',
	'WordPress,PHP,React',
	'{\"facebook\":\"https://facebook.com/\",\"twitter\":\"https://twitter.com/\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/\",\"tiktok\":\"\",\"github\":\"https://github.com/\"}'
), (
	7,
	'Lucía',
	'Velázquez',
	'Buenos Aires',
	'Argentina',
	'90956ece4adbd9f9ccb8f4ae80dc1537',
	'React,Angular,Svelte',
	'{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/\",\"instagram\":\"https://instagram.com/\",\"tiktok\":\"https://tiktok.com\",\"github\":\"https://github.com/\"}'
), (
	8,
	'Catarina',
	'Pardo',
	'Lima',
	'Perú',
	'9886ffc0d31e4c20a04acc1464630527',
	'Next.js,Laravel,MERN',
	'{\"facebook\":\"https://facebook.com/\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/\",\"instagram\":\"\",\"tiktok\":\"https://tiktok.com\",\"github\":\"\"}'
), (
	9,
	'Raquel',
	'Ros',
	'Madrid',
	'España',
	'd697f6c454c36252d70abacd7599566c',
	'Next.js,Remix,Vue.js',
	'{\"facebook\":\"\",\"twitter\":\"https://twitter.com/\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/\",\"tiktok\":\"\",\"github\":\"https://github.com/\"}'
), (
	10,
	'Sofía',
	'Amengual',
	'Santiago',
	'Chile',
	'414ffd61380bbf0e9f45cbde4d0cbb7f',
	'UX / UI,Figma,TailwindCSS',
	'{\"facebook\":\"https://facebook.com/\",\"twitter\":\"https://twitter.com/\",\"youtube\":\"https://youtube.com/\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'
), (
	11,
	'María José',
	'Leoz',
	'NY',
	'Estados Unidos',
	'c8b3a77bce7a6efb6e6872db67cfa553',
	'React,TypeScript,JavaScript',
	'{\"facebook\":\"https://facebook.com/\",\"twitter\":\"https://twitter.com/\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/\",\"tiktok\":\"\",\"github\":\"https://github.com/\"}'
), (
	12,
	'Alexa',
	'Mina',
	'Bogotá',
	'Colombia',
	'6eac63d88743bbb9ee0bfd8c60cf4186',
	'HTML,CSS,React,TailwindCSS',
	'{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/\",\"instagram\":\"https://instagram.com/\",\"tiktok\":\"https://tiktok.com\",\"github\":\"https://github.com/\"}'
), (
	13,
	'Jesus',
	'López',
	'Madrid',
	'España',
	'e481bca0c512f5b4d8f76ccea2548f0d',
	'PHP,WordPress,HTML,CSS',
	'{\"facebook\":\"https://facebook.com/\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/\",\"instagram\":\"\",\"tiktok\":\"https://tiktok.com\",\"github\":\"\"}'
), (
	14,
	'Irene',
	'Dávalos',
	'CDMX',
	'México',
	'6727e8ee7f6c642026247fe0556d866d',
	'Node.js,Vue.js,Angular',
	'{\"facebook\":\"\",\"twitter\":\"https://twitter.com/\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/\",\"tiktok\":\"\",\"github\":\"https://github.com/\"}'
), (
	15,
	'Brenda',
	'Ocampo',
	'Santiago',
	'Chile',
	'40e01f5c023c7e74c9c372a8126edd97',
	'Laravel,Next.js,GraphQL,Flutter',
	'{\"facebook\":\"https://facebook.com/\",\"twitter\":\"https://twitter.com/\",\"youtube\":\"https://youtube.com/\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'
), (
	16,
	'Julián',
	'Noboa',
	'Las Vegas',
	'EU',
	'6d4629dacbed2e4f5a344282ec2f4f76',
	"iOS,Figma,REST API's",
	'{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/\",\"instagram\":\"https://instagram.com/\",\"tiktok\":\"https://tiktok.com\",\"github\":\"https://github.com/\"}'
), (
	17,
	'Vicente ',
	'Figueroa',
	'CDMX',
	'México',
	'2a41a781d8ae8f0f7a1969c766276b08',
	'React,Tailwind,JavaScript,TypeScript,Node',
	'{\"facebook\":\"https://facebook.com/\",\"twitter\":\"https://twitter.com/\",\"youtube\":\"https://youtube.com/\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'
), (
	18,
	'Nico ',
	'Fraga',
	'Buenos Aires',
	'Argentina',
	'222dc6502643afa2f4a55acaecd93221',
	'PHP,Laravel,Flutter,React Native',
	'{\"facebook\":\"https://facebook.com/\",\"twitter\":\"https://twitter.com/\",\"youtube\":\"https://youtube.com/\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'
);

CREATE TABLE IF NOT EXISTS categories (
	id INT(11) NOT NULL AUTO_INCREMENT,
	name VARCHAR(45) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO categories (id, name)
VALUES (1, 'Conferencias'), (2, 'Workshops');

CREATE TABLE IF NOT EXISTS days (
	id INT(11) NOT NULL AUTO_INCREMENT,
	name VARCHAR(15) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO days (id, name)
VALUES (1, 'Viernes'), (2, 'Sábado');

CREATE TABLE IF NOT EXISTS hours (
	id INT(11) NOT NULL AUTO_INCREMENT,
	hour VARCHAR(13) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO hours (id, hour) VALUES
(1, '10:00 - 10:55'),
(2, '11:00 - 11:55'),
(3, '12:00 - 12:55'),
(4, '13:00 - 13:55'),
(5, '16:00 - 16:55'),
(6, '17:00 - 17:55'),
(7, '18:00 - 18:55'),
(8, '19:00 - 19:55');

CREATE TABLE IF NOT EXISTS events (
	id INT(11) NOT NULL AUTO_INCREMENT,
	name VARCHAR(120) NOT NULL,
	description TEXT NOT NULL,
	available_places INT(11) NOT NULL,
	category_id INT(11) NOT NULL,
	day_id INT(11) NOT NULL,
	hour_id INT(11) NOT NULL,
	speaker_id INT(11) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (category_id) REFERENCES categories(id),
	FOREIGN KEY (day_id) REFERENCES days(id),
	FOREIGN KEY (hour_id) REFERENCES hours(id),
	FOREIGN KEY (speaker_id) REFERENCES speakers(id)
);

INSERT INTO events (
	id,
	name,
	description,
	available_places,
	category_id,
	day_id,
	hour_id,
	speaker_id
) VALUES (
	1,
	'Next.js - Aplicaciones con gran performance',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare.',
	50,
	2,
	2,
	1,
	1
), (
	2,
	'MongoDB - Base de Datos a gran escala',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	50,
	2,
	2,
	2,
	2
), (
	3,
	'Tailwind y Figma',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	50,
	1,
	1,
	2,
	3
), (
	4,
	'MERN - MongoDB Express React y Node.js - Ejemplo Real',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	30,
	1,
	2,
	4,
	8
), (
	5,
	'Vue.js con Django para gran Performance',
	'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ',
	50,
	2,
	1,
	1,
	4
), (
	6,
	'DevOps - Primeros Pasos',
	'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ',
	30,
	1,
	1,
	1,
	5
), (
	7,
	'WordPress y React - Gran Performance a costo 0',
	'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ',
	40,
	2,
	1,
	2,
	6
), (
	8,
	'React, Angular y Svelte - Creando un Proyecto',
	'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ',
	30,
	1,
	1,
	3,
	7
), (
	9,
	'Laravel y Next.js - Aplicaciones Full Stack en Tiempo Record',
	'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ',
	40,
	1,
	2,
	1,
	8
), (
	10, 'Remix - El Nuevo Framework de React',
	'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ',
	30,
	2,
	1,
	3,
	9
), (
	11,
	'TailwindCSS - Crear Sitios Accesibles',
	'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ',
	30,
	1,
	1,
	4,
	10
), (
	12,
	'TypeScript en React',
	'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ',
	30,
	2,
	2,
	3,
	11
), (
	13,
	'Presente y Futuro del Frontend',
	'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ',
	30,
	2,
	2,
	8,
	12
), (
	14,
	'Extiende la API de WordPress con PHP',
	'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ',
	20,
	1,
	1,
	8,
	13
), (
	15,
	'Node y Vue.js - Proyecto Práctico',
	'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ',
	30,
	1,
	2,
	2,
	14
), (
	16,
	'GraphQL y Flutter - Gran Performance para Android y iOS',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	30,
	1,
	1,
	5,
	15
), (
	17,
	"REST API's - Backend para Web y Móvil",
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	20,
	2,
	1,
	4,
	16
), (
	18,
	'JavaScript - Apps para Web, Desktop y Escritorio',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	50,
	2,
	1,
	8,
	17
), (
	19,
	'Flutter y React Native - ¿Cómo elegir?',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	40,
	2,
	1,
	6,
	18
), (
	20,
	'Laravel y Flutter - Creando Un Proyecto Real',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	30,
	1,
	2,
	5,
	18
), (
	21,
	'Laravel y React Native - Creando un Proyecto Real',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	50,
	1,
	2,
	7,
	18
), (
	22,
	'PHP 8 - ¿Qué es Nuevo y que cambió?',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	50,
	2,
	1,
	7,
	1
), (
	23,
	'MEVN Stack - Mongo Express  Vue.js y Node.js',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	50,
	2,
	1,
	5,
	2
), (
	24,
	'Introducción a TailwindCSS',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	30,
	2,
	2,
	4,
	3
), (
	25,
	'WPGraphQL y GatsbyJS - Headless WordPress',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	40,
	2,
	2,
	5,
	6
), (
	26,
	'Svelte - El Nuevo Framework de JS ',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	40,
	2,
	2,
	6,
	7
), (
	27,
	'Next.js - El Mejor Framework para React',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	40,
	2,
	2,
	7,
	8
), (
	28,
	'React 18 - Una Introducción Práctica',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	30,
	1,
	1,
	6,
	9
), (
	29,
	'Vue.js - Composition API',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	20,
	1,
	1,
	7,
	14
), (
	30,
	'Vue.js - Pinia para reemplazar Vuex',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	25,
	1,
	2,
	3,
	14
), (
	31,
	'GraphQL - Introducción Práctica',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	30,
	1,
	2,
	8,
	15
), (
	32,
	'React y TailwindCSS - Frontend Moderno',
	'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ',
	30,
	1,
	2,
	6,
	17
);

CREATE TABLE IF NOT EXISTS packs (
	id INT(11) NOT NULL AUTO_INCREMENT,
	name VARCHAR(30) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO packs (id, name) VALUES
(1, 'Presencial'),
(2, 'Virtual'),
(3, 'Gratis');

CREATE TABLE IF NOT EXISTS gifts (
	id INT(11) NOT NULL AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO gifts (id, name) VALUES
(1, 'Paquete Stickers'),
(2, 'Camisa Mujer - Chica'),
(3, 'Camisa Mujer - Mediana'),
(4, 'Camisa Mujer - Grande'),
(5, 'Camisa Mujer - XL'),
(6, 'Camisa Hombre - Chica'),
(7, 'Camisa Hombre - Mediana'),
(8, 'Camisa Hombre - Grande'),
(9, 'Camisa Hombre - XL');

CREATE TABLE IF NOT EXISTS registers (
	id INT(11) NOT NULL AUTO_INCREMENT,
	token CHAR(8) NOT NULL,
	has_conferences TINYINT(1) NOT NULL DEFAULT 0,
	pack_id INT(11) NOT NULL,
	user_id INT(11) NOT NULL,
	payment_id VARCHAR(30) NOT NULL,
	gift_id INT(11) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (pack_id) REFERENCES packs(id),
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (gift_id) REFERENCES gifts(id)
);

CREATE TABLE IF NOT EXISTS events_registers (
	id INT(11) NOT NULL AUTO_INCREMENT,
	event_id INT(11) NOT NULL,
	register_id INT(11) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (event_id) REFERENCES events(id),
	FOREIGN KEY (register_id) REFERENCES registers(id)
);
