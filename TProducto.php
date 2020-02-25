<?php
require "DataModel/Producto.php";

class TProducto
{
    private Producto $producto;

    public function __construct(int $codigobarra, string $nombre, string $marca, string $color, string $descripcion, int $cantstock, float $importe)
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