<?php

namespace Controller\FacturaController;
use Model\FacturaModel\FacturaM;

class Factura{

    
    public function inFactura( $FkMetodoPago,$idCliente)
    {
        $Cat = FacturaM::inFacturaM($FkMetodoPago,$idCliente);
        return $Cat;
    }

    public function indetalles($productos)
    {
        $Cat = FacturaM::inDetallesFacturaM($productos);
        return $Cat;
    }

    public function showFactura()
    {
        if (isset($_SESSION['idCliente'])) {
            $idCliente = $_SESSION['idCliente'];
            $idFactura = 0;
        } else if (isset($_GET['idFactura'])) {
            $idFactura = $_GET['idFactura'];
            $idCliente = 0;
        } else {
            $idFactura = FacturaM::MaxIdFactura();
            $idCliente = 0;
        }

        $fact = FacturaM::showFactura($idCliente, $idFactura);
        return $fact;
    }
}