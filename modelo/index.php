<?php
class Modelo{
	private $Modelo;
	private $db;
    private $registros = [];
    public function __construct(){
        $this->Modelo = array();
        $this->registros = [];
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=dbtren', "root", "");
            //echo "Conexión exitosa";
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
    }

	public function insertar($tabla, $columnas, $valores) {
		$consulta = "INSERT INTO $tabla ($columnas) VALUES ($valores)";
		echo "<br>$consulta<br>";
		$resultado = $this->db->query($consulta);
		return $resultado ? true : false;
	}

	public function mostrar($tabla, $condicion) {
		$consulta = "SELECT * FROM $tabla WHERE $condicion;";
		$resultado = $this->db->query($consulta);
		return $resultado->fetchAll(PDO::FETCH_ASSOC);
	}


	public function actualizar($tabla,$data,$condicion){
		$consulta="update ".$tabla." set ".$data." where ".$condicion.";";
		echo $consulta;
		$resultado=$this->db->query($consulta);
		if($resultado){
		return true; }
		else {return false;}
	}
	
	public function eliminar($tabla,$condicion){
		$consulta="delete from ".$tabla." where ".$condicion.";";
		//echo $consulta;
		$resultado=$this->db->query($consulta);
		if($resultado){
		return true; }
		else {return false;}
	}
	public function getLastId() {
    return $this->db->lastInsertId();
	}

    public function consulta($sql) {
        $resultado = $this->db->query($sql);
        $datos = array();

        if ($resultado) {
            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
        }

        return $datos;
    }


}
?>