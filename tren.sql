CREATE DATABASE DBTREN;
USE DBTREN;

CREATE TABLE PASAJERO (
  id_pasajero INT PRIMARY KEY,
  nomb_comp VARCHAR(100),
  nombres VARCHAR(50),
  apellidos VARCHAR(50),
  genero CHAR(1),
  telefono VARCHAR(20),
  nacionalidad VARCHAR(50),
  email VARCHAR(100)
);

CREATE TABLE PASAJERO_CORRIENTE (
  id_pasajero INT PRIMARY KEY,
  FOREIGN KEY (id_pasajero) REFERENCES PASAJERO(id_pasajero)
);

CREATE TABLE PASAJERO_EMPRESA (
  id_pasajero INT PRIMARY KEY,
  RUC VARCHAR(20),
  direccion VARCHAR(100),
  razonSocial VARCHAR(100),
  FOREIGN KEY (id_pasajero) REFERENCES PASAJERO(id_pasajero)
);

CREATE TABLE EMPLEADO (
  id_empleado INT PRIMARY KEY,
  nomb_comp VARCHAR(100),
  nombre VARCHAR(50),
  apellido VARCHAR(50),
  documento VARCHAR(30),
  fech_nac DATE,
  correo VARCHAR(100),
  edad INT
);

CREATE TABLE ASESOR (
  id_empleado INT PRIMARY KEY,
  estacionTrabajo VARCHAR(50),
  FOREIGN KEY (id_empleado) REFERENCES EMPLEADO(id_empleado)
);

CREATE TABLE CHOFER (
  id_empleado INT PRIMARY KEY,
  licencia VARCHAR(30),
  FOREIGN KEY (id_empleado) REFERENCES EMPLEADO(id_empleado)
);

CREATE TABLE TRIPULANTE_DE_CABINA (
  id_empleado INT PRIMARY KEY,
  FOREIGN KEY (id_empleado) REFERENCES EMPLEADO(id_empleado)
);

CREATE TABLE RUTA (
  id_ruta INT PRIMARY KEY,
  ciudad_origen VARCHAR(50),
  ciudad_destino VARCHAR(50),
  duracion_viaje TIME,
  idiomas VARCHAR(100)
);

CREATE TABLE TRANSPORTE (
  id_tran INT PRIMARY KEY,
  clase VARCHAR(20),
  cantidad INT,
  aforo INT
);

CREATE TABLE HORARIO (
  id_horario INT PRIMARY KEY,
  tipo VARCHAR(30),
  fecha_salida DATE,
  hora_salida TIME,
  id_ruta INT,
  id_tran INT,
  FOREIGN KEY (id_ruta) REFERENCES RUTA(id_ruta),
  FOREIGN KEY (id_tran) REFERENCES TRANSPORTE(id_tran)
);

CREATE TABLE RESERVA (
  id_reserva INT PRIMARY KEY,
  tipo_viaje VARCHAR(50),
  fecha_reserva DATE,
  estado VARCHAR(20),
  precio DECIMAL(10,2),
  id_pasajero INT,
  id_horario INT,
  id_asesor INT,
  FOREIGN KEY (id_pasajero) REFERENCES PASAJERO(id_pasajero),
  FOREIGN KEY (id_horario) REFERENCES HORARIO(id_horario),
  FOREIGN KEY (id_asesor) REFERENCES ASESOR(id_empleado)
);

CREATE TABLE PAGO (
  id_pago INT PRIMARY KEY,
  metodo_pago VARCHAR(50),
  fecha_pago DATE,
  monto DECIMAL(10,2),
  id_reserva INT UNIQUE,
  FOREIGN KEY (id_reserva) REFERENCES RESERVA(id_reserva)
);

CREATE TABLE PASAJEROS_SECUNDARIOS (
  id_pasajerosec INT PRIMARY KEY,
  nomb_comp VARCHAR(100),
  nombres VARCHAR(50),
  apellidos VARCHAR(50),
  genero CHAR(1),
  id_reserva INT,
  FOREIGN KEY (id_reserva) REFERENCES RESERVA(id_reserva)
);

CREATE TABLE ATIENDE (
  id_empleado INT,
  id_tran INT,
  PRIMARY KEY (id_empleado, id_tran),
  FOREIGN KEY (id_empleado) REFERENCES TRIPULANTE_DE_CABINA(id_empleado),
  FOREIGN KEY (id_tran) REFERENCES TRANSPORTE(id_tran)
);

CREATE TABLE CONDUCE (
  id_empleado INT,
  id_tran INT,
  PRIMARY KEY (id_empleado, id_tran),
  FOREIGN KEY (id_empleado) REFERENCES CHOFER(id_empleado),
  FOREIGN KEY (id_tran) REFERENCES TRANSPORTE(id_tran)
);

