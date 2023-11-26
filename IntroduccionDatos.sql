-- Insertar tipos de usuarios
use eventosp2;
INSERT INTO tipos_usuarios (Descripcion) VALUE ('Administrador');
INSERT INTO tipos_usuarios (Descripcion) VALUE ('Usuario');
INSERT INTO tipos_usuarios (Descripcion) VALUE ('Ponente');

-- Insertar tipos de ventos
INSERT INTO tipo_acto (Descripcion) VALUE ('Conferencia');
INSERT INTO tipo_acto (Descripcion) VALUE ('Monólogo');
INSERT INTO tipo_acto (Descripcion) VALUE ('Concierto');
INSERT INTO tipo_acto (Descripcion) VALUE ('Mesa Redonda');
INSERT INTO tipo_acto (Descripcion) VALUE ('Seminario');

-- Lo pongo para hacer pruebas y poder borrar tablas con fk
SET FOREIGN_KEY_CHECKS = 0; 