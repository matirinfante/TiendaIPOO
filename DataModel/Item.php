<?php
require "BaseDatos.php";

class Item
{
    private int $codigobarra;
    private int $cantidad;
    private int $codigo;
    private float $importe;

    /**
     * Item constructor.
     */
    public function __construct($codigobarra, $cantidad, $codigo, $importe)
    {
        $this->codigobarra = $codigobarra;
        $this->cantidad = $cantidad;
        $this->codigo = $codigo;
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
     * @return int
     */
    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    /**
     * @param int $cantidad
     */
    public function setCantidad(int $cantidad): void
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return int
     */
    public function getCodigo(): int
    {
        return $this->codigo;
    }

    /**
     * @param int $codigo
     */
    public function setCodigo(int $codigo): void
    {
        $this->codigo = $codigo;
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
     * Recupera los datos de una item por codigo
     * @param int $codigo
     * @return true en caso de encontrar los datos, false en caso contrario
     */
    public function buscar($codigo)
    {
        $bd = new BaseDatos();
        $consultaItem = "Select * from item where codigo = {$codigo}";
        $exitoso = false;
        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($consultaItem)) {
                if ($resultado = $bd->Registro()) {
                    $this->setCodigo($codigo);
                    $this->setCantidad($resultado['cantidad']);
                    $this->setCodigobarra($resultado['codigobarra']);
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
        $arregloItem = array();
        $bd = new BaseDatos();
        $consultaItem = "Select * from item";
        if ($condicion != "") {
            $consultaItem .= " where {$condicion}";
        }
        $consultaItem .= " order by codigo ";
        if ($bd->Iniciar()) {
            if ($bd->Ejecutar($consultaItem)) {
                while ($resultado = $bd->Registro()) {

                    $codigobarra = $resultado['codigobarra'];
                    $cantidad = $resultado['cantidad'];
                    $codigo = $resultado['codigo'];
                    $importe = $resultado['importe'];

                    $itemTemp = new Item();
                    $itemTemp->cargar($codigobarra, $cantidad, $codigo, $importe);
                    array_push($arregloItem, $itemTemp);
                }

            } else {
                //$this->setmensajeoperacion($bd->getError());
                return false;
            }
        } else {
            //$this->setmensajeoperacion($base->getError());
            return false;
        }
        return $arregloItem;
    }

    /**
     * @return bool
     */
    public function insertar()
    {
        $bd = new BaseDatos();
        $consultaInsertar = "INSERT INTO item(codigobarra, cantidad, codigo,  importe) 
				VALUES ({$this->codigobarra},{$this->cantidad},{$this->codigo},{$this->importe})";

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
        $consultaModifica = "UPDATE item SET codigobarra={$this->codigobarra},cantidad={$this->cantidad},importe={$this->importe} WHERE codigo={$this->codigo}";
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
            $consultaEliminar = "DELETE FROM item WHERE codigo={$this->codigo}";
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
        return "\nCodigo: {$this->codigo}, Codigo de barra: {$this->codigobarra}, Cantidad: {$this->cantidad}, Importe: {$this->importe}";
    }

    /**
     * @param $codigobarra
     * @param $cantidad
     * @param $codigo
     * @param $importe
     */
    private function cargar($codigobarra, $cantidad, $codigo, $importe)
    {
        $this->__construct($codigobarra, $codigo, $codigo, $importe);
    }
}
