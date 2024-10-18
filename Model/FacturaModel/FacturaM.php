<?php

namespace Model\FacturaModel;
use Model\ConexionModel\Conexion;

class FacturaM
{

    public static function inFacturaM($FkMetodoPago, $idCliente)
    {

        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO Factura ( FkCliente, FechaFactura, FkMetodoPago) 
                       VALUES ( :FkCliente, NOW(), :FkMetodoPago)");
            $stmt->bindParam(":FkCliente", $idCliente, \PDO::PARAM_INT);
            $stmt->bindParam(":FkMetodoPago", $FkMetodoPago, \PDO::PARAM_INT);

            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            echo $th;
            return false;
        }

    }

    public static function inDetallesFacturaM($detalles)
    {
        // Conexión a la base de datos
        $conn = Conexion::conectar();

        // Verifica la conexión
        if (!$conn) {
            echo "Error en la conexión a la base de datos";
            return false;
        }

        // Obtener el ID máximo de la tabla Factura
        $idFactura = self::MaxIdFactura();  // Llamamos a la función que obtiene el ID máximo

        try {
            foreach ($detalles as $detalle) {
                $stmt = Conexion::conectar()->prepare("INSERT INTO DetallesFactura (FkPruductoFac, Cantidad, FkFactura)
                       VALUES ( :FkPruductoFac, :Cantidad, :FkFactura)");
                $stmt->bindParam("FkPruductoFac", $detalle['id'], \PDO::PARAM_INT);
                $stmt->bindParam(":Cantidad", $detalle['cantidad'], \PDO::PARAM_INT);
                $stmt->bindParam(":FkFactura", $idFactura, \PDO::PARAM_INT);

                $stmt->execute();

            }
            return $stmt ? true : false;
        } catch (\Throwable $th) {
            echo $th;
            return false;
        }

    }


    public static function MaxIdFactura()
    {


        // Consulta para obtener el ID máximo de la tabla Factura
        $sql_max_id = "SELECT NVL(MAX(idDatosFactura), 0) AS max_id FROM Factura";
        $conn = Conexion::conectar()->prepare($sql_max_id);
        $conn->execute();
        $result = $conn->fetch();

        $maxId = $result['max_id'];

        return $maxId;
    }
}