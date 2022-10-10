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
	'{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'
), (
	2,
	'Israel',
	'González',
	'CDMX',
	'México',
	'6497c66bcc464e26871c046dd5bb86c8',
	'Vue,Node.js,MongoDB',
	'{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"https://github.com/codigoconjuan\"}'
), (
	3,
	'Isabella',
	'Tassis',
	'Buenos Aires',
	'Argentina',
	'55c7866df31370ec3299eed6eb63daa1',
	'UX / UI,HTML,CSS,TailwindCSS',
	'{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"\"}'
), (
	4,
	'Jazmín',
	'Hurtado',
	'CDMX',
	'México',
	'de6e3fa0cde8402de4c28e6be0903ada',
	'Django,React, Vue.js',
	'{\"facebook\":\"\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'
), (
	5,
	'María Camila',
	'Murillo',
	'Guadalajara',
	'México',
	'cec8c9d7bcb4c19e87d1164bce8fe176',
	'Devops,Git,CI CD',
	'{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'
), (
	6,
	'Tomas',
	'Aleman',
	'Bogotá',
	'Colombia',
	'5332118b8d7690a1b992431802eafab1',
	'WordPress,PHP,React',
	'{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'
), (
	7,
	'Lucía',
	'Velázquez',
	'Buenos Aires',
	'Argentina',
	'90956ece4adbd9f9ccb8f4ae80dc1537',
	'React,Angular,Svelte',
	'{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"https://github.com/codigoconjuan\"}'
), (
	8,
	'Catarina',
	'Pardo',
	'Lima',
	'Perú',
	'9886ffc0d31e4c20a04acc1464630527',
	'Next.js,Laravel,MERN',
	'{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"\"}'
), (
	9,
	'Raquel',
	'Ros',
	'Madrid',
	'España',
	'd697f6c454c36252d70abacd7599566c',
	'Next.js,Remix,Vue.js',
	'{\"facebook\":\"\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'
), (
	10,
	'Sofía',
	'Amengual',
	'Santiago',
	'Chile',
	'414ffd61380bbf0e9f45cbde4d0cbb7f',
	'UX / UI,Figma,TailwindCSS',
	'{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'
), (
	11,
	'María José',
	'Leoz',
	'NY',
	'Estados Unidos',
	'c8b3a77bce7a6efb6e6872db67cfa553',
	'React,TypeScript,JavaScript',
	'{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'
), (
	12,
	'Alexa',
	'Mina',
	'Bogotá',
	'Colombia',
	'6eac63d88743bbb9ee0bfd8c60cf4186',
	'HTML,CSS,React,TailwindCSS',
	'{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"https://github.com/codigoconjuan\"}'
), (
	13,
	'Jesus',
	'López',
	'Madrid',
	'España',
	'e481bca0c512f5b4d8f76ccea2548f0d',
	'PHP,WordPress,HTML,CSS',
	'{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"\"}'
), (
	14,
	'Irene',
	'Dávalos',
	'CDMX',
	'México',
	'6727e8ee7f6c642026247fe0556d866d',
	'Node.js,Vue.js,Angular',
	'{\"facebook\":\"\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"\",\"github\":\"https://github.com/codigoconjuan\"}'
), (
	15,
	'Brenda',
	'Ocampo',
	'Santiago',
	'Chile',
	'40e01f5c023c7e74c9c372a8126edd97',
	'Laravel,Next.js,GraphQL,Flutter',
	'{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'
), (
	16,
	'Julián',
	'Noboa',
	'Las Vegas',
	'EU',
	'6d4629dacbed2e4f5a344282ec2f4f76',
	"iOS,Figma,REST API's",
	'{\"facebook\":\"\",\"twitter\":\"\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"https://instagram.com/codigoconjuan\",\"tiktok\":\"https://tiktok.com/@codigoconjuan\",\"github\":\"https://github.com/codigoconjuan\"}'
), (
	17,
	'Vicente ',
	'Figueroa',
	'CDMX',
	'México',
	'2a41a781d8ae8f0f7a1969c766276b08',
	'React,Tailwind,JavaScript,TypeScript,Node',
	'{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'
), (
	18,
	'Nico ',
	'Fraga',
	'Buenos Aires',
	'Argentina',
	'222dc6502643afa2f4a55acaecd93221',
	'PHP,Laravel,Flutter,React Native',
	'{\"facebook\":\"https://facebook.com/C%C3%B3digo-Con-Juan-103341632130628\",\"twitter\":\"https://twitter.com/codigoconjuan\",\"youtube\":\"https://youtube.com/codigoconjuan\",\"instagram\":\"\",\"tiktok\":\"\",\"github\":\"\"}'
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
	'¿Qué es el desarrollo web?',
	'En esta conferencia aprenderás qué es el desarrollo web, qué lenguajes de programación se utilizan y cómo puedes iniciar tu carrera como desarrollador web.',
	100,
	1,
	1,
	1,
	1
);
