CREATE TABLE genero
(
  id     			int(11) NOT NULL auto_increment PRIMARY KEY,
  nombre 			varchar(30) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE peliculas
(
  id     			int(11) NOT NULL auto_increment PRIMARY KEY,
  nombre 			varchar(30) NOT NULL,
  id_genero 		int(11) NOT NULL,
  director 			varchar(50) NOT NULL,
  fecha_lanzamiento datetime,
  imagen 			varchar(200),
  FOREIGN KEY (id_genero) REFERENCES genero(id)
)ENGINE=InnoDB;
