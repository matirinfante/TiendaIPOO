<?php


class Producto
{
    private int $codigobarra;
    private string $nombre;
    private string $marca;
    private string $color;
    private string $descripcion;
    private int $cantstock;
    private float $importe;

    /**
     * Producto constructor.
     * @param int $codigobarra
     * @param string $nombre
     * @param string $marca
     * @param string $color
     * @param string $descripcion
     * @param int $cantstock
     * @param float $importe
     */
    public function __construct(int $codigobarra, string $nombre = null, string $marca = null, string $color = null, string $descripcion = null, int $cantstock = null, float $importe = null)
    {
        $this->codigobarra = $codigobarra;
        $this->nombre = $nombre;
        $this->marca = $marca;
        $this->color = $color;
        $this->descripcion = $descripcion;
        $this->cantstock = $cantstock;
        $this->importe = $importe;
    }
    
    /**
     * @return int
     */
    public function getCodigobarra(): int
    {
        return $this->codigobarra;
    }

    /**
     * @param int $codigobarra
     */
    public function setCodigobarra(int $codigobarra): void
    {
        $this->codigobarra = $codigobarra;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getMarca(): string
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     */
    public function setMarca(string $marca): void
    {
        $this->marca = $marca;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return int
     */
    public function getCantstock(): int
    {
        return $this->cantstock;
    }

    /**
     * @param int $cantstock
     */
    public function setCantstock(int $cantstock): void
    {
        $this->cantstock = $cantstock;
    }

    /**
     * @return float
     */
    public function getImporte(): float
    {
        return $this->importe;
    }

    /**
     * @param float $importe
     */
    public function setImporte(float $importe): void
    {
        $this->importe = $importe;
    }


    /**
     * Recupera los datos de un producto por codigo de barras
     * @param int $codigobarra
     * @return true en caso de encontrar los datos, false en caso contrario
     */
    public function buscar($codigobarra)
    {
        $bd = new BaseDatos();
        $consultaItem = "Select * from producto where codigobarra = {$this->getCodigobarra()}";
        $exitoso = false;
        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($consultaItem)) {
                if ($resultado = $bd->Registro()) {
                    $this->setCodigobarra($codigobarra);
                    $this->setNombre($resultado['nombre']);
                    $this->setMarca($resultado['marca']);
                    $this->setColor($resultado['color']);
                    $this->setDescripcion($resultado['descripcion']);
                    $this->setCantstock($resultado['cantstock']);
                    $this->setImporte($resultado['importe']);
                    $exitoso = true;
                }
            } else {
                //$this->setmensajeoperacion($base->getError());
            }
        } else {
            //$this->setmensajeoperacion($base->getError());
            return false;
        }
        return $exitoso;
    }

    /**
     * @param string $condicion
     * @return array|bool
     */
    public function listar($condicion = "")
    {
        $arregloProducto = array();
        $bd = new BaseDatos();
        $consultaProducto = "Select * from producto";
        if ($condicion != "") {
            $consultaProducto .= " where {$condicion}";
        }
        $consultaProducto .= " order by codigobarra ";
        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($consultaProducto)) {
                while ($resultado = $bd->Registro()) {

                    $codigobarra = $resultado['codigobarra'];
                    $nombre = $resultado['nombre'];
                    $marca = $resultado['marca'];
                    $color = $resultado['color'];
                    $descripcion = $resultado['descripcion'];
                    $stock = $resultado['cantstock'];
                    $importe = $resultado['importe'];

                    $itemTemp = new Producto($codigobarra, $nombre, $marca, $color, $descripcion, $stock, $importe);
                    array_push($arregloProducto, $itemTemp);
                }

            } else {
                //$this->setmensajeoperacion($bd->getError());
                return false;
            }
        } else {
            //$this->setmensajeoperacion($base->getError());
            return false;
        }
        return $arregloProducto;
    }

    /**
     * @return bool
     */
    public function insertar()
    {
        $bd = new BaseDatos();
        $consultaInsertar = "INSERT INTO producto(codigobarra, nombre, marca, color,descripcion,cantstock, importe) 
				VALUES ({$this->getCodigobarra()},{$this->getNombre()},{$this->getMarca()},{$this->getColor()},{$this->getDescripcion()},{$this->getCantstock()},{$this->getImporte()})";

        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($consultaInsertar)) {
                return true;
            } else {
                //$this->setmensajeoperacion($bd->getError());
                return false;
            }
        } else {
            //$this->setmensajeoperacion($bd->getError());
            return false;
        }
    }

    /**
     * @return bool
     */
    public function modificar()
    {
        $bd = new BaseDatos();
        $consultaModifica = "UPDATE producto SET nombre={$this->getNombre()},marca={$this->getMarca()},color={$this->getColor()}, descripcion={$this->getDescripcion()}, cantstock={$this->getCantstock()}, importe={$this->getImporte()} WHERE codigobarra={$this->getCodigobarra()}";
        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($consultaModifica)) {
                return true;
            } else {
                //$this->setmensajeoperacion($base->getError());
                return false;
            }
        } else {
            //$this->setmensajeoperacion($base->getError());
            return false;
        }
    }

    /**
     * @return bool
     */
    public function eliminar()
    {
        $bd = new BaseDatos();
        if ($bd->Iniciar()) {
            $consultaEliminar = "DELETE FROM producto WHERE codigobarra={$this->getCodigobarra()}";
            if ($bd->Ejecutar($consultaEliminar)) {
                return true;
            } else {
                //$this->setmensajeoperacion($bd->getError());
                return false;
            }
        } else {
            //$this->setmensajeoperacion($bd->getError());
            return false;
        }
    }

    public function __toString()
    {
        return "\nCodigo de barra: {$this->codigobarra}, \nNombre: {$this->nombre}, Marca: {$this->marca}, \nColor: {$this->color} Descripcion: {$this->descripcion}, \nStock disponible: {$this->cantstock} Importe: {$this->importe}";
    }

}
