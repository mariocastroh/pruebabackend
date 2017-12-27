CREATE TABLE genero
(
  id     			serial NOT NULL,
  nombre 			character varying(30) NOT NULL,
  CONSTRAINT genero_pkey PRIMARY KEY (id)
  )
  WITH ( OIDS=FALSE );
  ALTER TABLE genero OWNER TO diana;


CREATE TABLE peliculas
(
  id     			  serial NOT NULL,
  nombre 			  character varying(30) NOT NULL,
  id_genero 		integer NOT NULL,
  director 			character varying(30) NOT NULL,
  fecha_lanzamiento date DEFAULT now(),
  imagen 			  character varying(300) NOT NULL,
  CONSTRAINT peliculas_pkey PRIMARY KEY (id),
  CONSTRAINT "$1" FOREIGN KEY (id_genero)
      REFERENCES genero (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
  )
  WITH ( OIDS=FALSE );
  ALTER TABLE peliculas OWNER TO diana;

  INSERT INTO genero(id, nombre) VALUES
  (1, 'Ciencia Ficción'),
  (2, 'Terror'),
  (3, 'Comedia'),
  (4, 'Acción');
