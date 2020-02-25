<?php
require "DataModel/Producto.php";

class TProducto
{
    private Producto $producto;

    public function __construct(int $codigobarra, string $nombre = null, string $marca = null, string $color = null, string $descripcion = null, int $cantstock = null, float $importe = null)
    {
        $producto = new Producto($codigobarra, $nombre, $marca, $color, $descripcion, $cantstock, $importe);
    }

    public function actualizarStock($cantidad, $producto)
    {
        if ($cantidad <> 0) {
            $stockActual = $this->producto->getCantstock() + $cantidad;
            $this->producto->setCantstock($stockActual);
            $this->producto->modificar();
        }
    }
}