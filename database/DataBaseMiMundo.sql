-- select sha224('123');
drop table usuarios;
DROP TYPE tipoUsuario;

-- Tabla de usuarios
create type tipoUsuario as enum ('admin', 'employee', 'user');

create Table usuarios(
	id serial not null primary key,
	nombre varchar(30) not null,
	apellido1 varchar(30) not null,
	apellido2 varchar(30),
	email varchar(200) not null unique,
	contrasenia bytea not null,
	genero char(1),
	rol tipoUsuario not null
);

insert into usuarios
values (default, 'Dennis', 'Silva', 'Lopez', 'dennis@gmail.com', sha224('12345678'),'M', 'admin' );

insert into usuarios
values (default, 'Ruben', 'Silva', 'Lopez', 'ruben@gmail.com', sha224('12345678'),'M', 'user' );

insert into usuarios
values (default, 'Kimberly', 'Silva', 'Lopez', 'kimberly@gmail.com', sha224('12345678'),'F', 'user' );

select * from usuarios;


-- Tabla de productos
CREATE TYPE tipoCategoria AS ENUM ('sueter', 'camisa', 'blusa', 'vestido', 'pantalon', 'short');
CREATE TYPE tipoTemporada AS ENUM ('primavera', 'verano', 'otoño', 'invierno');

Create table productos(
	idProducto serial not null primary key,
	producto varchar(30) not null,
	talla char(10) not null,
	precio smallint not null,
	categoria tipoCategoria not null,
	temporada tipoTemporada not null 
)

insert into productos
values (default, 'Camisa Azul', '3M', 150, 'camisa', 'primavera' );

insert into productos
values (default, 'Sueter Verde', '9M', 250, 'sueter', 'invierno' );

insert into productos
values (default, 'Pantalon Negro', 'T4', 300, 'pantalon', 'otoño' );

insert into productos
values (default, 'Vestido Naranja', 'T2', 150, 'vestido', 'verano' );

insert into productos
values (default, 'Short Cafe', '6M', 150, 'short', 'verano' );

insert into productos
values (default, 'Camisa Formal Rosa', 'T4', 300, 'camisa', 'primavera' );

SELECT idProducto,producto,talla,precio,categoria,temporada FROM productos;

SELECT idProducto,producto,talla,precio,categoria,temporada FROM productos WHERE idProducto=1;

DELETE FROM productos WHERE idProducto = 1;

UPDATE productos SET producto = 'Sueter Rojo', talla = '9M', precio = 200, categoria = 'sueter', temporada = 'invierno' WHERE idProducto = 2;

INSERT INTO Productos (producto, talla, precio, categoria, temporada)
VALUES ('Blusa blanca', 'T7', 300, 'blusa', 'verano');













-- -----------------------------------------------------------------------------


alter table usuarios
add column rol tipoUSuario;

update usuarios set rol="admin";

alter table usuarios
alter column rol tipoUSuario not null;