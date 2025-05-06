<?php
include '../Modelo/Conexion.php';

class Ingreso
{
    private $Conexion;

    public function __construct()
    {
        $this->Conexion = Conectarse();
    }

    public function agregarIngreso($FechaIngresoProducto, $ProductoCodigoProducto, $Cantidad, $Descripción, $PrecioIngreso, $Empleado)
    {
        $PrecioTotal = $Cantidad * $PrecioIngreso;
        $this->Conexion->begin_transaction();

        try {
            // Verificar la existencia del producto
            $sqlProducto = "SELECT Stock FROM producto WHERE CodigoProducto = ?";
            $stmtProducto = $this->Conexion->prepare($sqlProducto);
            $stmtProducto->bind_param("i", $ProductoCodigoProducto);
            $stmtProducto->execute();
            $resultadoProducto = $stmtProducto->get_result();

            if ($resultadoProducto->num_rows === 0) {
                throw new Exception("El producto con código $ProductoCodigoProducto no existe.");
            }

            $producto = $resultadoProducto->fetch_assoc();
            $StockActual = $producto['Stock'];

            // Insertar en ticket_ingreso
            $sql = "INSERT INTO ticket_ingreso (FechaIngresoProducto, PrecioTotal) VALUES (?, ?)";
            $stmt = $this->Conexion->prepare($sql);
            $stmt->bind_param("sd", $FechaIngresoProducto, $PrecioTotal);

            if (!$stmt->execute()) {
                throw new Exception("Error al insertar en ticket_ingreso: " . $stmt->error);
            }

            $idTicketIngreso = $this->Conexion->insert_id;

            // Insertar en detalle_ingreso
            $sqlDetalle = "INSERT INTO detalle_ingreso (ProductoCodigoProducto, TicketSalidaidTicketIngreso, Cantidad, Descripción, PrecioIngreso, Empleado) 
                           VALUES (?, ?, ?, ?, ?, ?)";
            $stmtDetalle = $this->Conexion->prepare($sqlDetalle);
            $stmtDetalle->bind_param("iisiis", $ProductoCodigoProducto, $idTicketIngreso, $Cantidad, $Descripción, $PrecioIngreso, $Empleado);

            if (!$stmtDetalle->execute()) {
                throw new Exception("Error al insertar en detalle_ingreso: " . $stmtDetalle->error);
            }

            // Actualizar stock
            $NuevoStock = $StockActual + $Cantidad;
            $sqlActualizarStock = "UPDATE producto SET Stock = ? WHERE CodigoProducto = ?";
            $stmtActualizarStock = $this->Conexion->prepare($sqlActualizarStock);
            $stmtActualizarStock->bind_param("ii", $NuevoStock, $ProductoCodigoProducto);

            if (!$stmtActualizarStock->execute()) {
                throw new Exception("Error al actualizar el stock: " . $stmtActualizarStock->error);
            }

            // Confirmar transacción
            $this->Conexion->commit();

            // Cerrar recursos
            $stmtProducto->close();
            $stmt->close();
            $stmtDetalle->close();
            $stmtActualizarStock->close();
        } catch (Exception $e) {
            $this->Conexion->rollback();
            throw new Exception("Error al agregar el ingreso: " . $e->getMessage());
        }
    }

    public function verificarProductoExistente($ProductoCodigoProducto)
{
    $sql = "SELECT COUNT(*) FROM producto WHERE CodigoProducto = ?";
    $stmt = $this->Conexion->prepare($sql);
    $stmt->bind_param("i", $ProductoCodigoProducto);
    $stmt->execute();
    $stmt->bind_result($existe);
    $stmt->fetch();
    $stmt->close();
    
    return $existe > 0;
}


    public function consultarIngreso($idTicketIngreso = null)
    {
        if ($idTicketIngreso === null) {
            $sql = "SELECT 
                        TS.idTicketIngreso, 
                        TS.FechaIngresoProducto, 
                        TS.PrecioTotal, 
                        GROUP_CONCAT(DISTINCT P.Nombre SEPARATOR '<br>') AS ProductoCodigoProducto, 
                        GROUP_CONCAT(DS.Cantidad SEPARATOR '<br>') AS Cantidad,
                        GROUP_CONCAT(DS.Descripción SEPARATOR '<br>') AS Descripción,
                        GROUP_CONCAT(DS.PrecioIngreso SEPARATOR '<br>') AS PrecioIngreso, 
                        GROUP_CONCAT(U.Nombres SEPARATOR '<br>') AS Empleado
                    FROM 
                        ticket_ingreso AS TS
                    INNER JOIN 
                        detalle_ingreso AS DS ON TS.idTicketIngreso = DS.TicketSalidaidTicketIngreso
                    INNER JOIN 
                        producto AS P ON DS.ProductoCodigoProducto = P.CodigoProducto
                    INNER JOIN 
                        usuario AS U ON DS.Empleado = U.Num_Documento
                    GROUP BY 
                        TS.idTicketIngreso, TS.FechaIngresoProducto, TS.PrecioTotal";

            $resultado = $this->Conexion->query($sql) or die($this->Conexion->error);
        } else {
            $sql = "SELECT * FROM ticket_ingreso WHERE idTicketIngreso = ?";
            $stmt = $this->Conexion->prepare($sql);
            $stmt->bind_param("i", $idTicketIngreso);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $stmt->close();
        }

        return $resultado;
    }
}
?>
