<?php
//importa la clase conexión y el modelo para usarlos
require_once 'conexion.php';
require_once '../../model/Productos.php';




class DAOProducto
{

    private $conexion;

    /* -------------------------------------------------------------------------- */
    private function conectar()
    {
        try {
            $this->conexion = Conexion::conectar();
        } catch (Exception $e) {
            die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
        }
    }

    /* -------------------------------------------------------------------------- */
    public function obtenerTodos()
    {
        try {
            $this->conectar();

            $lista = array();
            //Se arma la sentencia sql para seleccionar todos los registros de la base de datos
            $sentenciaSQL = $this->conexion->prepare("SELECT idProducto,producto,talla,precio,categoria,temporada FROM productos");

            //Se ejecuta la sentencia sql, retorna un cursor con todos los elementos
            $sentenciaSQL->execute();

            //$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_OBJ);
            
            /*Se recorre el cursor para obtener los datos*/
            foreach ($resultado as $fila) {
                $obj = new Producto();
                $obj->idProducto = $fila->idproducto;
                $obj->producto = $fila->producto;
                $obj->talla = $fila->talla;
                $obj->precio = $fila->precio;
                $obj->categoria = $fila->categoria;
                $obj->temporada = $fila->temporada;

                //Agrega el objeto al arreglo, no necesitamos indicar un índice, usa el próximo válido
                $lista[] = $obj;
            }

            return $lista;
        } catch (PDOException $e) {
            return null;
        } finally {
            Conexion::desconectar();
        }
    }

    /* -------------------------------------------------------------------------- */
    public function obtenerUno($id)
    {
        try {
            $this->conectar();

            //Almacenará el registro obtenido de la BD
            $obj = null;

            $sentenciaSQL = $this->conexion->prepare("SELECT idProducto,producto,talla,precio,categoria,temporada FROM productos WHERE idProducto=?");
            //Se ejecuta la sentencia sql con los parametros dentro del arreglo 
            $sentenciaSQL->execute([$id]);

            /*Obtiene los datos*/
            $fila = $sentenciaSQL->fetch(PDO::FETCH_OBJ);

            $obj = new Producto();
            
            $obj->idProducto = $fila->idproducto;
            $obj->producto = $fila->producto;
            $obj->talla = $fila->talla;
            $obj->precio = $fila->precio;
            $obj->categoria = $fila->categoria;
            $obj->temporada = $fila->temporada;

            return $obj;
        } catch (Exception $e) {
            return null;
        } finally {
            Conexion::desconectar();
        }
    }

    /* -------------------------------------------------------------------------- */
    public function eliminar($id)
    {
        try {
            $this->conectar();

            $sentenciaSQL = $this->conexion->prepare("DELETE FROM productos WHERE idProducto = ?");
            $resultado = $sentenciaSQL->execute(array($id));
            return $resultado;
        } catch (PDOException $e) {
            //Si quieres acceder expecíficamente al numero de error
            //se puede consultar la propiedad errorInfo
            return false;
        } finally {
            Conexion::desconectar();
        }
    }

    /* -------------------------------------------------------------------------- */
    public function editar(Producto $obj)
    {
        try {
            $sql = "UPDATE productos SET 
                    producto = ?, 
                    talla = ?,
                    precio = ?,
                    categoria = ?,
                    temporada = ?
                    WHERE idProducto = ?";

            $this->conectar();

            $sentenciaSQL = $this->conexion->prepare($sql);
            $sentenciaSQL->execute(
                array(
                    $obj->producto,
                    $obj->talla,
                    $obj->precio,
                    $obj->categoria,
                    $obj->temporada,
                    $obj->idProducto
                )
            );
            return true;
        } catch (PDOException $e) {
            return false;
        } finally {
            Conexion::desconectar();
        }
    }
    
    /* -------------------------------------------------------------------------- */
    public function agregar(Producto $obj)
    {
        $clave = 0;
        try {
            $sql = "INSERT INTO Productos (producto, talla, precio, categoria, temporada)
                    VALUES (:producto, :talla, :precio, :categoria, :temporada);";

            $this->conectar();
            $this->conexion->prepare($sql)
                ->execute(array(
                    ':producto' => $obj->producto,
                    ':talla' => $obj->talla,
                    ':precio' => $obj->precio,
                    ':categoria' => $obj->categoria,
                    ':temporada' => $obj->temporada
                ));

            $clave = $this->conexion->lastInsertId();
            return $clave;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return $clave;
        } finally {

            Conexion::desconectar();
        }
    }
}
