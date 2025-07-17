-- 1. PASAJERO
INSERT INTO PASAJERO (nombres, apellidos, genero, tipo_documento, numero_documento, telefono, nacionalidad, fech_nac, email, contacto_compra)
VALUES 
('Carlos', 'Perez', 'M', 'DNI', '987654321', '999111222', 'Peruana', '1990-05-10', 'carlos.perez@mail.com', TRUE),
('Ana', 'Torres', 'F', 'DNI', '923456789', '988222333', 'Chilena', '1992-08-25', 'ana.torres@mail.com', FALSE),
('Luis', 'Ramirez', 'M', 'Pasaporte', 'P1234567', '987333444', 'Argentina', '1985-11-30', 'luis.ramirez@mail.com', TRUE);

-- 2. PASAJERO_CORRIENTE
INSERT INTO PASAJERO_CORRIENTE VALUES
(1);

-- 3. PASAJERO_EMPRESA
INSERT INTO PASAJERO_EMPRESA VALUES
(2, '20456789012', 'Av. Los Empresarios 123', 'Transporte Torres SAC');

-- 4. EMPLEADO
INSERT INTO EMPLEADO (nombre, apellido, documento, fech_nac, correo, edad)
VALUES 
('Jose', 'Martinez', '12345678', '1980-05-20', 'jose.martinez@mail.com', 44),
('Maria', 'Lopez', '87654321', '1990-08-15', 'maria.lopez@mail.com', 33),
('Elena', 'Gomez', '11223344', '1985-12-30', 'elena.gomez@mail.com', 39),
('Pedro', 'Cruz', '44556677', '1988-02-10', 'pedro.cruz@mail.com', 36);

-- 5. ASESOR, CHOFER, TRIPULANTE_DE_CABINA
INSERT INTO ASESOR VALUES
(1, 'Estación Central');
INSERT INTO CHOFER VALUES
(2, 'LIC123456');
INSERT INTO TRIPULANTE_DE_CABINA VALUES
(3),
(4);

-- 6. RUTA
INSERT INTO RUTA (ciudad_origen, ciudad_destino, estacion_origen, estacion_destino)
VALUES
('Wanchaq', 'Machu Picchu', 'Wanchaq', 'Machu  Picchu'),
('San Pedro', 'Machu Picchu', 'San Pedro', 'Machu  Picchu'),
('Poroy', 'Machu Picchu', 'Poroy', 'Machu  Picchu'),
('Urubamba', 'Machu Picchu', 'Urubamba', 'Machu Picchu'),
('Ollantaytambo', 'Machu Picchu', 'Ollantaytambo', 'Machu Picchu');

-- 7. CLASE
INSERT INTO CLASE (clase, precio_clase, servicios)
VALUES 
('Expedition', 100.00, 'Asientos reclinables, Aire acondicionado'),
('Vistadome', 150.00, 'Ventanas panorámicas, Snacks'),
('Vistadome Observatory', 180.00, 'Vista observatorio, Snacks, Bebidas'),
('Hiram Bingham', 400.00, 'Servicio de lujo, Comida gourmet, Música en vivo'),
('Titicaca', 300.00, 'Tren turístico de lujo, Comidas incluidas'),
('ExpeditionH', 90.00, 'Ruta Hidroeléctrica, Asientos reclinables'),
('VistadomeH', 120.00, 'Ruta Hidroeléctrica, Ventanas panorámicas');

-- 8. TRANSPORTE
INSERT INTO TRANSPORTE (id_clase, aforo)
VALUES
(1, 50),  -- Expedition
(2, 45),  -- Vistadome
(3, 40),  -- Vistadome Observatory
(4, 30);  -- Hiram Bingham

-- 9. HORARIO
INSERT INTO HORARIO (tipo, hora_salida, hora_llegada, duracion_viaje, id_ruta)
VALUES
('Directo', '03:20:00', '07:40:00', '4:20:00', 3),
('Directo', '04:20:00', '09:15:00', '4:55:00', 3),
('Directo', '05:10:00', '09:15:00', '4:05:00', 3),
('Directo', '06:40:00', '10:52:00', '4:12:00', 4),
('Directo', '07:35:00', '10:52:00', '3:17:00', 5),
('Directo', '06:06:00', '09:15:00', '03:09:00', 6),
('Directo', '06:06:00', '09:15:00', '03:09:00', 6),
('Directo', '06:06:00', '09:15:00', '03:09:00', 6),
('Directo', '06:06:00', '09:15:00', '03:09:00', 6),
('Directo', '06:06:00', '09:15:00', '03:09:00', 6),
('Directo', '05:05:00', '06:37:00', '01:32:00', 7),
('Directo', '07:05:00', '08:27:00', '01:22:00', 7),
('Directo', '08:00:00', '09:25:00', '01:25:00', 7),
('Directo', '08:53:00', '10:29:00', '01:36:00', 7),
('Directo', '10:32:00', '12:11:00', '01:39:00', 7);

-- 10. PAGO
INSERT INTO PAGO (metodo_pago, fecha_pago, monto)
VALUES 
('Tarjeta', '2025-07-10', 180.00),
('Efectivo', '2025-07-11', 360.00);

-- 11. RESERVA
INSERT INTO RESERVA (tipo_viaje, tipo_transporte, fecha_reserva, fecha_salida, fecha_retorno, id_pasajero, id_horario, id_pago)
VALUES 
('Ida', 'Bus y Tren', '2025-07-05', '2025-07-10', NULL, 1, 1, 1),
('Ida y vuelta', 'Bus', '2025-07-06', '2025-07-12', '2025-07-18', 2, 2, 2);

-- 12. RESERVA_FISICA, RESERVA_VIRTUAL
INSERT INTO RESERVA_FISICA VALUES
(1, 1);
INSERT INTO RESERVA_VIRTUAL VALUES
(2);

-- 13. PASAJEROS_SECUNDARIOS y PS_ADULTO
INSERT INTO PASAJEROS_SECUNDARIOS (id_reserva) VALUES
(2);
INSERT INTO PS_ADULTO (id_pasajerosec, nombres, apellidos, genero, tipo_documento, numero_documento, nacionalidad, fech_nac, contacto_compra)
VALUES 
(1, 'Laura', 'Fernandez', 'F', 'DNI', '45678912', 'Peruana', '1994-07-20', TRUE);

INSERT INTO ATIENDE VALUES
(3, 1),  -- Tripulante 3 atiende el Expedition
(4, 2),  -- Tripulante 4 atiende el Vistadome
(3, 3),  -- Tripulante 3 atiende Vistadome Observatory
(4, 4);  -- Tripulante 4 atiende Hiram Bingham

-- CONDUCE (chofer maneja los transportes)
INSERT INTO CONDUCE VALUES
(2, 1),  -- Chofer 2 conduce Expedition
(2, 2),  -- Conduce Vistadome
(2, 3),  -- Conduce Vistadome Observatory
(2, 4);  -- Conduce Hiram Bingham

-- 15. TIENE
INSERT INTO TIENE (id_tran, id_horario)
VALUES
(1, 1),  -- Expedition → primer horario
(3, 2),  -- Vistadome Observatory → segundo horario
(2, 3),  -- Vistadome → tercer horario
(4, 4);  -- Hiram Bingham → cuarto horario