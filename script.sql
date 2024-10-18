INSERT INTO `catprod` (`idCatProd`, `Categoria`)
VALUES ('1', 'Belleza'), (NULL, 'Deportes'),
(NULL, 'Electrodomésticos'), (NULL, 'Electrónicos');


INSERT INTO `subcategoria` (`idSubCategoria`, `NSubCategoria`, `SubCategoriaP`, `FkCategoria`) VALUES
(2, 'Cremas Faciales', NULL, '1'),
(3, 'Cuidado de la Piel', NULL, '1'),
(4, 'Cuidado del Cabello', NULL, '1'),
(5, 'Fragancias', NULL, '1'),
(6, 'Accesorios de Belleza', NULL, '1'),
(7, 'Productos Antiedad', NULL, '1'),
(8, 'Cuidado de las Uñas', NULL, '1'),
(9, 'Protección Solar', NULL, '1'),
(10, 'Afeitado', NULL, '1');


insert into UnidadMedida (idUnidadMedida, UnidadMedida) values (1, 'kg');
insert into UnidadMedida (idUnidadMedida, UnidadMedida) values (2, 'ft');
insert into UnidadMedida (idUnidadMedida, UnidadMedida) values (3, 'Lt');
insert into UnidadMedida (idUnidadMedida, UnidadMedida) values (4, 'g');
insert into UnidadMedida (idUnidadMedida, UnidadMedida) values (5, 'oz');
insert into UnidadMedida (idUnidadMedida, UnidadMedida) values (6, 'ml');
insert into UnidadMedida (idUnidadMedida, UnidadMedida) values (7, 'plg');
insert into UnidadMedida (idUnidadMedida, UnidadMedida) values (8, 'unidad');
insert into UnidadMedida (idUnidadMedida, UnidadMedida) values (9, 'mm');
insert into UnidadMedida (idUnidadMedida, UnidadMedida) values (10, 'lb');


-- Subcategoría 2: Cremas Faciales
INSERT INTO `Producto` (`idProducto`, `NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) VALUES
(11, 'Crema Hidratante Diaria', 6, '50', 45.00, 2, 100),
(12, 'Crema Noche Antiarrugas', 6, '30', 55.00, 2, 50),
(13, 'Crema Nutritiva de Día', 6, '75', 60.00, 2, 80);

-- Subcategoría 3: Cuidado de la Piel
INSERT INTO `Producto` (`idProducto`, `NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) VALUES
(14, 'Gel Limpiador Facial', 6, '150', 35.00, 3, 120),
(15, 'Tónico Facial Suavizante', 6, '200', 40.00, 3, 70),
(16, 'Exfoliante Suave', 6, '100', 50.00, 3, 60);

-- Subcategoría 4: Cuidado del Cabello
INSERT INTO `Producto` (`idProducto`, `NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) VALUES
(17, 'Shampoo Fortalecedor', 6, '300', 55.00, 4, 200),
(18, 'Acondicionador Hidratante', 6, '250', 50.00, 4, 180),
(19, 'Mascarilla Reparadora', 6, '150', 65.00, 4, 90);

-- Subcategoría 5: Fragancias
INSERT INTO `Producto` (`idProducto`, `NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) VALUES
(20, 'Perfume Floral', 6, '50', 150.00, 5, 30),
(21, 'Colonia Cítrica', 6, '100', 120.00, 5, 40),
(22, 'Body Mist Fresco', 6, '200', 90.00, 5, 60);

-- Subcategoría 6: Accesorios de Belleza
INSERT INTO `Producto` (`idProducto`, `NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) VALUES
(23, 'Esponjas de Maquillaje', 8, '5', 25.00, 6, 150),
(24, 'Brochas Profesionales', 8, '10', 100.00, 6, 50),
(25, 'Rizador de Pestañas', 8, '1', 35.00, 6, 100);

-- Subcategoría 7: Productos Antiedad
INSERT INTO `Producto` (`idProducto`, `NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) VALUES
(26, 'Suero Antiarrugas', 6, '30', 90.00, 7, 40),
(27, 'Crema Redensificante', 6, '50', 120.00, 7, 50),
(28, 'Contorno de Ojos', 6, '15', 85.00, 7, 70);

-- Subcategoría 8: Cuidado de las Uñas
INSERT INTO `Producto` (`idProducto`, `NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) VALUES
(29, 'Esmalte Transparente', 6, '15', 20.00, 8, 200),
(30, 'Removedor de Esmalte', 6, '100', 30.00, 8, 150),
(31, 'Lima de Uñas', 8, '1', 10.00, 8, 300);

-- Subcategoría 9: Protección Solar
INSERT INTO `Producto` (`idProducto`, `NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) VALUES
(32, 'Protector Solar SPF 50', 6, '100', 80.00, 9, 120),
(33, 'Bloqueador en Spray', 6, '150', 90.00, 9, 100),
(34, 'Protector Solar Facial', 6, '50', 70.00, 9, 110);

-- Subcategoría 10: Afeitado
INSERT INTO `Producto` (`idProducto`, `NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) VALUES
(35, 'Crema de Afeitar', 6, '100', 40.00, 10, 80),
(36, 'Aftershave Balsámico', 6, '50', 45.00, 10, 60),
(37, 'Máquina de Afeitar', 8, '1', 100.00, 10, 40);
-- Subcategoría 11: Maquillaje
INSERT INTO `Producto` (`idProducto`, `NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) VALUES
(38, 'Base de Maquillaje Líquida', 6, '30', 75.00, 1, 100),
(39, 'Polvo Compacto', 8, '1', 60.00, 1, 150),
(40, 'Corrector de Ojeras', 6, '15', 50.00, 1, 120),
(41, 'Rubor en Polvo', 8, '1', 45.00, 1, 80),
(42, 'Delineador de Ojos', 8, '1', 35.00, 1, 200);

insert into Subcategoria (idSubcategoria, Nsubcategoria, fkCategoria) values (11, 'Balones', 2);
insert into Subcategoria (idSubcategoria, Nsubcategoria, fkCategoria) values (12, 'Ropa deportiva', 2);
insert into Subcategoria (idSubcategoria, Nsubcategoria, fkCategoria) values (13, 'Zapatillas deportivas', 2);
insert into Subcategoria (idSubcategoria, Nsubcategoria, fkCategoria) values (14, 'Equipos de gimnasio', 2);
insert into Subcategoria (idSubcategoria, Nsubcategoria, fkCategoria) values (15, 'Bicicletas', 2);
insert into Subcategoria (idSubcategoria, Nsubcategoria, fkCategoria) values (16, 'Accesorios para ciclismo', 2);
insert into Subcategoria (idSubcategoria, Nsubcategoria, fkCategoria) values (17, 'Raquetas de tenis', 2);
insert into Subcategoria (idSubcategoria, Nsubcategoria, fkCategoria) values (18, 'Patines', 2);
insert into Subcategoria (idSubcategoria, Nsubcategoria, fkCategoria) values (19, 'Cascos y protección', 2);
insert into Subcategoria (idSubcategoria, Nsubcategoria, fkCategoria) values (20, 'Suplementos deportivos', 2);

-- Balones
INSERT INTO `Producto` (`NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) 
VALUES 
('Balón de fútbol', 8, '1', 150.00, 11, 25),
('Balón de baloncesto', 8, '1', 180.00, 11, 15);

-- Ropa deportiva
INSERT INTO `Producto` (`NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) 
VALUES 
('Camiseta deportiva', 8, '1', 75.00, 12, 100),
('Pantalones deportivos', 8, '1', 120.00, 12, 80);

-- Zapatillas deportivas
INSERT INTO `Producto` (`NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) 
VALUES 
('Zapatillas running', 8, '1', 350.00, 13, 50),
('Zapatillas para baloncesto', 8, '1', 400.00, 13, 40);

-- Equipos de gimnasio
INSERT INTO `Producto` (`NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) 
VALUES 
('Mancuernas 10kg', 1, '10', 500.00, 14, 30),
('Banco de pesas', 8, '1', 1500.00, 14, 10);

-- Bicicletas
INSERT INTO `Producto` (`NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) 
VALUES 
('Bicicleta de montaña', 8, '1', 2000.00, 15, 20),
('Bicicleta de ruta', 8, '1', 3500.00, 15, 15);

-- Accesorios para ciclismo
INSERT INTO `Producto` (`NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) 
VALUES 
('Casco para ciclismo', 8, '1', 250.00, 16, 60),
('Guantes para ciclismo', 8, '1', 100.00, 16, 80);

-- Raquetas de tenis
INSERT INTO `Producto` (`NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) 
VALUES 
('Raqueta profesional', 8, '1', 1200.00, 17, 25),
('Raqueta amateur', 8, '1', 800.00, 17, 40);

-- Patines
INSERT INTO `Producto` (`NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) 
VALUES 
('Patines en línea', 8, '1', 750.00, 18, 30),
('Patines clásicos', 8, '1', 650.00, 18, 25);

-- Cascos y protección
INSERT INTO `Producto` (`NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) 
VALUES 
('Casco protector', 8, '1', 300.00, 19, 50),
('Rodilleras y coderas', 8, '1', 150.00, 19, 70);

-- Suplementos deportivos
INSERT INTO `Producto` (`NombreProd`, `FkUnidadMedida`, `CantMedida`, `Precio`, `FkSubCat`, `existencias`) 
VALUES 
('Proteína en polvo', 3, '1', 450.00, 20, 80),
('Creatina', 4, '500', 300.00, 20, 100);


SELECT 
    C.idCliente,                                   -- ID del cliente
    C.Nombre AS ClienteNombre,                     -- Nombre del cliente
    C.Apellido AS ClienteApellido,                 -- Apellido del cliente
    C.Telefono,                                    -- Teléfono del cliente
    C.Correo,                                      -- Correo electrónico del cliente
    F.idDatosFactura AS IdFactura,                 -- ID de la factura
    DATE(F.FechaFactura) AS FechaFactura,          -- Fecha de la factura sin hora
    DF.Cantidad,                                   -- Cantidad del producto
    P.NombreProd AS ProductoComprado,              -- Nombre del producto
    P.Precio AS PrecioProducto,                    -- Precio del producto
    (DF.Cantidad * P.Precio) AS Subtotal           -- Subtotal por producto
FROM 
    Cliente C
JOIN 
    Factura F ON C.idCliente = F.FkCliente
JOIN 
    DetallesFactura DF ON F.idDatosFactura = DF.FkFactura
JOIN 
    Producto P ON DF.FkPruductoFac = P.idProducto
WHERE 
    C.idCliente = 7 OR F.idDatosFactura = 0
ORDER BY 
    F.idDatosFactura, P.NombreProd;