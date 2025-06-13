use DBTREN;
-- PASAJEROS
INSERT INTO PASAJERO VALUES 
(1, 'Juan Pérez', 'Juan', 'Pérez', 'M', '912345678', 'Peruana', 'juan.perez@email.com'),
(2, 'Empresa XYZ SAC', 'XYZ', 'SAC', 'N', '945678912', 'Peruana', 'contacto@xyzsac.com');

INSERT INTO PASAJERO_CORRIENTE VALUES (1);
INSERT INTO PASAJERO_EMPRESA VALUES (2, '20481234567', 'Av. Industrial 123', 'XYZ SAC');

-- EMPLEADOS
INSERT INTO EMPLEADO VALUES 
(101, 'Ana Torres', 'Ana', 'Torres', 'DNI12345678', '1990-05-12', 'ana.torres@email.com', 34),
(102, 'Carlos Ruiz', 'Carlos', 'Ruiz', 'DNI87654321', '1985-08-25', 'carlos.ruiz@email.com', 39),
(103, 'Lucía Quispe', 'Lucía', 'Quispe', 'DNI23456789', '1992-03-10', 'lucia.quispe@email.com', 33),
(104, 'Marco Díaz', 'Marco', 'Díaz', 'DNI56789012', '1988-11-20', 'marco.diaz@email.com', 36);

-- ASESOR, CHOFER, TRIPULANTE
INSERT INTO ASESOR VALUES (101, 'Estación A');
INSERT INTO CHOFER VALUES (102, 'LIC987654');
INSERT INTO TRIPULANTE_DE_CABINA VALUES (103, 'Español');
INSERT INTO TRIPULANTE_DE_CABINA VALUES (104,  'Frances');

-- RUTAS
INSERT INTO RUTA VALUES 
(1, 'Lima', 'Cusco', '01:30:00'),
(2, 'Arequipa', 'Tacna', '02:45:00');

-- TRANSPORTE
INSERT INTO TRANSPORTE VALUES 
(1, 'Vistandome', 'Bus', 40),
(2, 'Observatory', 'Bus y tren', 25);

-- HORARIOS
INSERT INTO HORARIO VALUES 
(1, 'Directo', '2025-06-15', '08:00:00', 1, 1),
(2, 'Escala', '2025-06-16', '14:00:00', 2, 2);

-- RESERVAS
INSERT INTO RESERVA VALUES 
(1, 'Ida', '2025-06-10', 'Confirmada', 150.00, 1, 1, 101),
(2, 'Ida y vuelta', '2025-06-11', 'Pendiente', 280.00, 2, 2, 101);

-- PAGOS
INSERT INTO PAGO VALUES 
(1, 'Tarjeta', '2025-06-10', 150.00, 1),
(2, 'Efectivo', '2025-06-11', 280.00, 2);

-- PASAJEROS SECUNDARIOS
INSERT INTO PASAJEROS_SECUNDARIOS VALUES 
(1, 'María López', 'María', 'López', 'F', 1),
(2, 'Pedro Soto', 'Pedro', 'Soto', 'M', 2);

-- RELACIÓN N:M: ATIENDE (tripulante - transporte)
INSERT INTO ATIENDE VALUES 
(103, 1),
(104, 2);

-- RELACIÓN N:M: CONDUCE (chofer - transporte)
INSERT INTO CONDUCE VALUES 
(102, 1),
(102, 2);
