Tarea - Desarrollo en Plataformas

Estudiante: Mateo Morales
Fecha: 19/12/2025
Mis Decisiones de Diseño
1) Tabla
Nombre de la tabla: reparaciones
Campos (Campo   Tipo   Obligatorio)
id                 BIGINT UNSIGNED AUTO_INCREMENT (PK)                 Sí
tipo_bicicleta     VARCHAR(30)                                         Sí
marca              VARCHAR(40)                                         Sí
reparacion_necesita TEXT                                               Sí
nombre_dueno       VARCHAR(100)                                        Sí
telefono           VARCHAR(20)                                         Sí
estado             ENUM(esperando, trabajando, lista, recogida)         Sí
created_at         TIMESTAMP                                           Sí (auto)
updated_at         TIMESTAMP                                           Sí (auto)
2) Tipos de vehículo
Se registran como texto en tipo_bicicleta.
Ejemplos: BMX, Montaña, Ruta, Urbana, Eléctrica, 3 ruedas.
3) ¿Se puede eliminar registros?
Respuesta: No se elimina físicamente; se usa retiro/borrado lógico.
Razón (1 línea): Para mantener historial y trazabilidad de las reparaciones.
Evidencias
Las capturas están en la carpeta: capturas/
Repositorio GitHub
https://github.com/mora3320/ciclo-mania-
