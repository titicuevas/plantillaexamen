DROP TABLE IF EXISTS alumnos CASCADE;
DROP TABLE IF EXISTS ccee CASCADE;

DROP TABLE IF EXISTS notas CASCADE;
CREATE TABLE
    alumnos (
        id bigserial PRIMARY KEY,
        nombre varchar(255) NOT NULL,
        apellido VARCHAR (255) NOT NULL
    );


CREATE TABLE
    ccee (
        id bigserial PRIMARY KEY,
        ce varchar(255) NOT NULL UNIQUE,
        descripcion varchar (255) NOT NULL
    );


CREATE TABLE
    notas (
        id bigserial NOT NULL UNIQUE,
        alumno_id bigint NOT NULL REFERENCES alumnos(id),
        ccee_id bigint NOT NULL REFERENCES ccee(id),
        nota DECIMAL(4, 2) NOT NULL,
        PRIMARY KEY(alumno_id, ccee_id)
    );