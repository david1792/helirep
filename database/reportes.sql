select movimiento_inventario.tipo_movimiento, 
bodega.nombre, 
producto.referencia
from movimiento_inventario inner join inventario on inventario.id = movimiento_inventario.inventario_id 
inner join bodega on inventario.bodega_id = bodega.id
inner join producto on producto.inventario_id = inventario.id
where fecha_actualizacion between '2017-01-01' and '2017-12-08' and producto.id = 2
group by movimiento_inventario.tipo_movimiento, 
bodega.nombre, 
producto.referencia;

select bodega.nombre, inventario.id, movimiento_inventario.tipo_movimiento, producto.referencia
from bodega inner join inventario on inventario.bodega_id = bodega.id 
inner join movimiento_inventario on movimiento_inventario.inventario_id = inventario.id
inner join producto on producto.inventario_id = inventario.id;

select   inventario.id, movimiento_inventario.tipo_movimiento, producto.referencia
from bodega inner join inventario on inventario.bodega_id = bodega.id 
inner join movimiento_inventario on movimiento_inventario.inventario_id = inventario.id
inner join producto on producto.inventario_id = inventario.id where producto.id = 3 order by referencia ;

select inventario.id, movimiento_inventario.tipo_movimiento 
from inventario inner join movimiento_inventario on inventario.id = movimiento_inventario.inventario_id
 where mov_producto = 3;  

------------------------------------------------;

7

select movimiento_solicitud.tipo_movimiento, solicitud.descripcion, producto.descripcion
from movimiento_solicitud inner join solicitud on solicitud.id = movimiento_solicitud.solicitud_id
inner join producto_solicitud on solicitud.id = producto_solicitud.solicitud_id_solicitud
inner join producto on producto.id = producto_solicitud.producto_id_producto
 where solicitud.id = 3;

--------------------------------------------------;

select movimiento_solicitud.tipo_movimiento, solicitud.descripcion, producto.referencia
from movimiento_solicitud inner join solicitud on solicitud.id = movimiento_solicitud.solicitud_id
inner join producto_solicitud on solicitud.id = producto_solicitud.solicitud_id_solicitud
inner join producto on producto.id = producto_solicitud.producto_id_producto
 where fecha_actualizacion between '2017-01-01' and '2017-10-01' and producto.id = 3 and solicitud.id = 2;



select * from movimiento_inventario;