

<?php
include '../Modelo/Conexion.php';

class Ingreso
{
    private $idTicketIngreso;
    private $FechaIngresoProducto;
    private $PrecioUnitario;
    private $PrecioTotal;
    private $Conexion;

    public function __construct($idTicketIngreso = null, $FechaIngresoProducto = null,  $PrecioUnitario = null, $PrecioTotal = null )
    {
        $this->idTicketIngreso = $idTicketIngreso;
        $this->FechaIngresoProducto = $FechaIngresoProducto;
        $this->PrecioUnitario= $PrecioUnitario;
        $this->PrecioTotal = $PrecioTotal;
        $this->Conexion = Conectarse();
    }

    public function agregarIngreso($idTicketIngreso, $FechaIngresoProducto, $PrecioUnitario, $PrecioTotal )
    {
        $sql = "INSERT INTO ticket_ingreso (idTicketIngreso, FechaIngresoProducto, PrecioUnitario, PrecioTotal) VALUES (?, ?, ?, ?)";
        $stmt = $this->Conexion->prepare($sql);
        $stmt->bind_param("isii", $idTicketIngreso, $FechaIngresoProducto, $PrecioUnitario, $PrecioTotal);
        $stmt->execute();
        $stmt->close();
    }

    public function consultaringreso($idTicketIngreso = null)
    {
        if ($idTicketIngreso === null) { 
            $sql = "SELECT * FROM `ticket_ingreso`;";
 
            $resultado = $this->Conexion->query($sql);
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



   
    public function idTicketIngreso() {
        // Lógica para obtener el id del ticket de ingreso
        return $this->idTicketIngreso;
    }

    public function FechaIngresoProducto() {
        // Lógica para obtener la fecha de ingreso del producto
        return $this->FechaIngresoProducto;
    }

    public function PrecioUnitario() {
        // Lógica para obtener el precio unitario
        return $this->PrecioUnitario;
    }

    public function PrecioTotal() {
        // Lógica para obtener el precio total
        return $this->PrecioTotal;
    }


   

    public function ConsultarDetalle()
    {
        $sql = "SELECT CodigoCategoría, Nombre FROM categoria"; 
        $resultado = $this->Conexion->query($sql);
        return $resultado;
    }

    

    public function __destruct()
    {
      
        if ($this->Conexion) {
            $this->Conexion->close();
        }
    }
}
?>

