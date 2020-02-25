<?php
//TODO: Implementar
require "DataModel/Item.php";

class TItem
{
    private Item $item;

    public function __construct($codigoBarra)
    {
        $importe = new Producto($codigoBarra);
        $this->item = new Item();
    }

    public function darImporteItem()
    {
        $valorProducto = $this->producto->getImporte();
    }
}