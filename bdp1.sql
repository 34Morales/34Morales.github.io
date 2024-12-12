CREATE DATABASE pagina2;

USE pagina2;


-- Tabla de Categorías
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de Proveedores
CREATE TABLE proveedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    contacto_nombre VARCHAR(100),
    contacto_email VARCHAR(100) UNIQUE NOT NULL,
    contacto_telefono VARCHAR(20),
    direccion VARCHAR(255),
    ciudad VARCHAR(100),
    estado VARCHAR(100),
    codigo_postal VARCHAR(20),
    pais VARCHAR(100),
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de Productos
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    categoria_id INT,
    proveedor_principal_id INT,
    stock INT DEFAULT 0,
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT FK_categoria FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE SET NULL,
    CONSTRAINT FK_proveedor_principal FOREIGN KEY (proveedor_principal_id) REFERENCES proveedores(id) ON DELETE SET NULL
);

-- Tabla General de Imágenes
CREATE TABLE imagenes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    entidad ENUM('categoria', 'producto', 'usuario') NOT NULL,
    entidad_id INT NOT NULL,
    url_imagen VARCHAR(255) NOT NULL,
    fecha_agregado DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de Usuarios con Seguridad Mejorada
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    estatus ENUM('Administrador', 'Cliente', 'Proveedor') DEFAULT 'Cliente',
    estado ENUM('Activo', 'Inactivo', 'Suspendido') DEFAULT 'Activo',
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de Direcciones
CREATE TABLE direcciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    ciudad VARCHAR(100),
    estado VARCHAR(100),
    codigo_postal VARCHAR(20),
    pais VARCHAR(100),
    CONSTRAINT FK_usuario_direccion FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Métodos de Pago
CREATE TABLE metodos_pago (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    tipo_pago ENUM('Tarjeta', 'PayPal', 'Transferencia') NOT NULL,
    detalles_pago VARCHAR(255),
    CONSTRAINT FK_usuario_metodo_pago FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Pedidos
CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    direccion_id INT NOT NULL,
    metodo_pago_id INT NOT NULL,
    fecha_pedido DATETIME DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10, 2) NOT NULL,
    estado ENUM('Pendiente', 'Enviado', 'Entregado', 'Cancelado') DEFAULT 'Pendiente',
    CONSTRAINT FK_usuario_pedido FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    CONSTRAINT FK_direccion_pedido FOREIGN KEY (direccion_id) REFERENCES direcciones(id),
    CONSTRAINT FK_metodo_pago_pedido FOREIGN KEY (metodo_pago_id) REFERENCES metodos_pago(id)
);

-- Detalle de Pedidos
CREATE TABLE detalle_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    CONSTRAINT FK_pedido_detalle FOREIGN KEY (pedido_id) REFERENCES pedidos(id) ON DELETE CASCADE,
    CONSTRAINT FK_producto_detalle FOREIGN KEY (producto_id) REFERENCES productos(id) ON DELETE CASCADE
);

-- Tabla de Roles y Permisos
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE permisos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rol_id INT NOT NULL,
    recurso VARCHAR(100) NOT NULL,
    accion ENUM('Ver', 'Editar', 'Eliminar', 'Crear') NOT NULL,
    CONSTRAINT FK_rol_permiso FOREIGN KEY (rol_id) REFERENCES roles(id) ON DELETE CASCADE
);

-- Relación Usuarios-Roles
CREATE TABLE usuario_roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    rol_id INT NOT NULL,
    CONSTRAINT FK_usuario_rol FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    CONSTRAINT FK_rol_usuario FOREIGN KEY (rol_id) REFERENCES roles(id) ON DELETE CASCADE
);



INSERT INTO categorias (nombre, descripcion) 
VALUES ('Electrónica', 'Productos electrónicos como teléfonos, computadoras, etc.');


INSERT INTO proveedores (nombre, contacto_nombre, contacto_email, contacto_telefono, direccion, ciudad, estado, codigo_postal, pais)
VALUES ('Proveedor X', 'Juan Pérez', 'juan@proveedorx.com', '123456789', 'Calle Falsa 123', 'Ciudad X', 'Estado X', '12345', 'País X');

INSERT INTO productos (nombre, descripcion, precio, categoria_id, proveedor_principal_id, stock)
VALUES ('Smartphone Y', 'Smartphone con características avanzadas', 599.99, 1, 1, 50);

--Procedimientos almacenado--
DELIMITER $$

CREATE PROCEDURE AgregarPedido(
    IN usuario_id INT,
    IN direccion_id INT,
    IN metodo_pago_id INT,
    IN total DECIMAL(10, 2)
)
BEGIN
    INSERT INTO pedidos (usuario_id, direccion_id, metodo_pago_id, total)
    VALUES (usuario_id, direccion_id, metodo_pago_id, total);
END $$

DELIMITER ;

--Agregar un detalle de pedido--
DELIMITER $$

CREATE PROCEDURE AgregarDetallePedido(
    IN pedido_id INT,
    IN producto_id INT,
    IN cantidad INT,
    IN precio DECIMAL(10, 2)
)
BEGIN
    INSERT INTO detalle_pedido (pedido_id, producto_id, cantidad, precio)
    VALUES (pedido_id, producto_id, cantidad, precio);
END $$

DELIMITER ;

-- Disparadores
DELIMITER $$

CREATE TRIGGER ActualizarStock AFTER INSERT ON detalle_pedido
FOR EACH ROW
BEGIN
    UPDATE productos
    SET stock = stock - NEW.cantidad
    WHERE id = NEW.producto_id;
END $$

DELIMITER ;

-- Fecha de creación en la tabla de productos
DELIMITER $$

CREATE TRIGGER EstablecerFechaCreacion BEFORE INSERT ON productos
FOR EACH ROW
BEGIN
    SET NEW.fecha_creacion = IFNULL(NEW.fecha_creacion, CURRENT_TIMESTAMP);
END $$

DELIMITER ;
