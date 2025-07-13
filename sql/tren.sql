CREATE DATABASE DBTREN;
USE DBTREN;

CREATE TABLE PASAJERO (
  id_pasajero INT PRIMARY KEY,
  nombres VARCHAR(50),
  apellidos VARCHAR(50),
  genero CHAR(1),
  tipo_documento char(50),
  numero_documento char(50),
  telefono VARCHAR(20),
  nacionalidad VARCHAR(50),
  fech_nac DATE,
  email VARCHAR(100),
  contacto_compra BOOL
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
  estacion_origen VARCHAR(50),
  estacion_destino VARCHAR(50)
);

CREATE TABLE CLASE (
  id_clase INT PRIMARY KEY,
  clase VARCHAR(50) UNIQUE,
  precio_clase DECIMAL(10,2),
  servicios VARCHAR(100)
);

CREATE TABLE TRANSPORTE (
  id_tran INT PRIMARY KEY,
  id_clase INT,
  aforo INT,
  FOREIGN KEY (id_clase) REFERENCES clase(id_clase)
);


CREATE TABLE HORARIO (
  id_horario INT PRIMARY KEY,
  tipo VARCHAR(30),
  hora_salida TIME,
  hora_llegada TIME,
  duracion_viaje TIME,
  id_ruta INT,
  FOREIGN KEY (id_ruta) REFERENCES RUTA(id_ruta)
);

CREATE TABLE PAGO (
  id_pago INT PRIMARY KEY,
  metodo_pago VARCHAR(50),
  fecha_pago DATE,
  monto DECIMAL(10,2)
);

CREATE TABLE RESERVA (
  id_reserva INT PRIMARY KEY,
  tipo_viaje VARCHAR(50),
  tipo_transporte VARCHAR(50),
  fecha_reserva DATE,
  fecha_salida DATE,
  fecha_retorno DATE,
  id_pasajero INT,
  id_horario INT,
  id_pago INT UNIQUE,
  FOREIGN KEY (id_pasajero) REFERENCES PASAJERO(id_pasajero),
  FOREIGN KEY (id_horario) REFERENCES HORARIO(id_horario),
  FOREIGN KEY (id_pago) REFERENCES PAGO(id_pago)
);


CREATE TABLE RESERVA_FISICA (
 id_reserva INT PRIMARY KEY,
 id_asesor INT,
 FOREIGN KEY (id_reserva) REFERENCES RESERVA(id_reserva),
 FOREIGN KEY (id_asesor) REFERENCES ASESOR(id_empleado)
);

CREATE TABLE RESERVA_VIRTUAL(
 id_reserva INT PRIMARY KEY,
 FOREIGN KEY (id_reserva) REFERENCES RESERVA(id_reserva)
);

CREATE TABLE PASAJEROS_SECUNDARIOS (
  id_pasajerosec INT PRIMARY KEY,
  id_reserva INT,
  FOREIGN KEY (id_reserva) REFERENCES RESERVA(id_reserva)
);

CREATE TABLE PS_ADULTO (
  id_pasajerosec INT PRIMARY KEY,
  nombres VARCHAR(50),
  apellidos VARCHAR(50),
  genero CHAR(1),
  tipo_documento char(50),
  numero_documento char(50),
  nacionalidad VARCHAR(50),
  fech_nac DATE,
  contacto_compra BOOL,
  FOREIGN KEY (id_pasajerosec) REFERENCES PASAJEROS_SECUNDARIOS (id_pasajerosec)
);

CREATE TABLE PS_NIÑO (
  id_pasajerosec INT PRIMARY KEY,
  nombres VARCHAR(50),
  apellidos VARCHAR(50),
  genero CHAR(1),
  tipo_documento char(50),
  numero_documento char(50),
  nacionalidad VARCHAR(50),
  fech_nac date,
  FOREIGN KEY (id_pasajerosec) REFERENCES PASAJEROS_SECUNDARIOS (id_pasajerosec)
);

CREATE TABLE PS_INFANTE (
  id_pasajerosec INT PRIMARY KEY,
  resposable CHAR(50),
  FOREIGN KEY (id_pasajerosec) REFERENCES PASAJEROS_SECUNDARIOS (id_pasajerosec)
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

CREATE TABLE TIENE (
  id_tran INT,
  id_horario INT,
  PRIMARY KEY (id_horario, id_tran),
  FOREIGN KEY (id_horario) REFERENCES HORARIO(id_horario),
  FOREIGN KEY (id_tran) REFERENCES TRANSPORTE(id_tran)
);
ef
