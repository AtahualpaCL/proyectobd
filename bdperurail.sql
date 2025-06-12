CREATE DATABASE PERURAIL;
USE PERURAIL;

CREATE TABLE pasajero (
	id_pasajero INT (11) AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR (50) NOT NULL,
    apellidos VARCHAR (50) NOT NULL,
    email VARCHAR (100) DEFAULT NULL,
    nacionalidad VARCHAR (15) DEFAULT NULL,
    telefono INT (9) DEFAULT NULL,	
    genero VARCHAR (10) NOT NULL,
    tipo_pasajero ENUM('Empresa', 'Corriente') NOT NULL
);

/* TABLAS HIJAS */
CREATE TABLE psjEmpresa (
	id_pasajero INT (11) PRIMARY KEY,
    RUC INT (11) NOT NULL,
    direccion VARCHAR (50) DEFAULT NULL,
    razon_social VARCHAR (100) DEFAULT NULL,
    FOREIGN KEY (id_pasajero) REFERENCES pasajero (id_pasajero) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE psjCorriente (
	id_pasajero INT PRIMARY KEY,
    FOREIGN KEY (id_pasajero) REFERENCES pasajero (id_pasajero) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE empleado (
	id_empleado INT (11) AUTO_INCREMENT PRIMARY KEY,
    nombresEmp VARCHAR (50) NOT NULL,
    apellidosEmp VARCHAR (50) NOT NULL,
    correo VARCHAR (100) DEFAULT NULL,
    fech_nac DATE DEFAULT NULL,
    documento VARCHAR (8) NOT NULL,
    edad VARCHAR (2) DEFAULT NULL,
    tipo_empleado ENUM('Asesor', 'Tripulante Cabina', 'Chofer') NOT NULL
);

CREATE TABLE asesor (
	id_empleado INT PRIMARY KEY,
    estacionTrabajo VARCHAR (20) NOT NULL,
	FOREIGN KEY (id_empleado) REFERENCES empleado (id_empleado) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE tripulanteCabina (
	id_empleado INT PRIMARY KEY,
    idiomas VARCHAR (2) NOT NULL,
    FOREIGN KEY (id_empleado) REFERENCES empleado (id_empleado) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE chofer (
	id_empleado INT PRIMARY KEY,
    licencia VARCHAR (9) NOT NULL,
    FOREIGN KEY (id_empleado) REFERENCES empleado (id_empleado) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE transporte (
	id_transporte INT (11) PRIMARY KEY,
    id_tripulantecabina INT NOT NULL,
    id_chofer INT NOT NULL,
	clase VARCHAR (15) NOT NULL,
	cantidad DECIMAL (8, 2) DEFAULT NULL,
	aforo INT (3) DEFAULT NULL,
    FOREIGN KEY (id_chofer) REFERENCES chofer (id_empleado) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_tripulantecabina) REFERENCES tripulanteCabina (id_empleado) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE ruta (
	id_ruta INT (11) AUTO_INCREMENT PRIMARY KEY,
    ciudad_destino VARCHAR (12) NOT NULL,
    duracion_viaje TIME NOT NULL, /* 15hrs o 30min*/
    ciudad_origen VARCHAR (12) DEFAULT NULL
);

CREATE TABLE horario (
	id_horario INT (11) AUTO_INCREMENT PRIMARY KEY,
    id_transporte INT NOT NULL, 
    id_ruta INT NOT NULL,
    fecha_salida DATE NOT NULL,
    hora_salida TIME NOT NULL,
    FOREIGN KEY (id_transporte) REFERENCES transporte (id_transporte) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_ruta) REFERENCES ruta (id_ruta) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE reserva (
	id_reserva INT (11) AUTO_INCREMENT PRIMARY KEY,
    id_pasajero INT NOT NULL,
    id_horario INT NOT NULL, 
    id_empleado INT NOT NULL,
    estado VARCHAR (25) NOT NULL,
    tipo_viaje VARCHAR (20) DEFAULT NULL,
    fecha_reserva DATE NOT NULL,
    precio DECIMAL (5, 2) DEFAULT NULL,
    FOREIGN KEY (id_pasajero) REFERENCES pasajero (id_pasajero) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_horario) REFERENCES horario (id_horario) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_empleado) REFERENCES asesor (id_empleado) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE pago (
	id_pago INT (11) AUTO_INCREMENT PRIMARY KEY,
    id_reserva INT NOT NULL,
    fecha_pago DATE NOT NULL,
    metodo_pago VARCHAR (13) DEFAULT NULL,
    monto DECIMAL (5, 2) NOT NULL,
    FOREIGN KEY (id_reserva) REFERENCES reserva (id_reserva) ON DELETE CASCADE ON UPDATE CASCADE
);