<?php
include '../Modelo/Conexion.php';

class Salida
{
    private $Conexion;

    public function __construct()
    {
        $this->Conexion = Conectarse();
    }

    public function agregarSalida($FechaSalida, $PrecioTotal)
    {
        $sql = "INSERT INTO ticket_salida (FechaSalida, PrecioTotal) VALUES (?, ?)";
        $stmt = $this->Conexion->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Error en la preparación de la consulta: " . $this->Conexion->error);
        }

        $stmt->bind_param("sd", $FechaSalida, $PrecioTotal);
        
        if (!$stmt->execute()) {
            throw new Exception("Error al agregar salida: " . $stmt->error);
        }

        $stmt->close();
    }

    public function consultarSalida($IdTicketSalida = null)
    {
        if ($IdTicketSalida === null) { 
            $sql = "SELECT IdTicketSalida, FechaSalida, PrecioTotal FROM ticket_salida;";
            $resultado = $this->Conexion->query($sql);
        } else {
            $sql = "SELECT * FROM ticket_salida WHERE IdTicketSalida = ?";
            $stmt = $this->Conexion->prepare($sql);
            $stmt->bind_param("i", $IdTicketSalida);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $stmt->close();
        }
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
