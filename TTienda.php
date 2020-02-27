<?php


class TTienda
{
    public function registrarVenta($arregloProductos, $tipoVenta, $informacionVenta)
    {
        switch ($tipoVenta) {
            case "E":
                $venta = new Venta();
                break;
            case "D":
                $venta = new VentaDebito();
                break;
            case "C":
                $venta = new VentaCredito();
                break;
        }
    }

    public function realizarVenta($arregloProductos, $infoCliente, $formaPago)
    {
        foreach ($arregloProductos as $producto) {
            $codigoBarra = $producto["codigoBarra"];
            $tempProducto = new Producto();
        }
    }

    public function ventaMayorImporte()
    {
    }

    public function ventaMayorImporteXTipoVenta()
    {
    }
}