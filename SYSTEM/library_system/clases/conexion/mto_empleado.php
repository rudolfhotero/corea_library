<?php 
require_once "clDML.php";

class mto_empleado extends clDML
{    
    public function __construct()
    {
        
    }

    public function get_empleado()
    {
        $query = "SELECT e.CODIGO_EMPLEADO, e.NOMBRE_EMPLEADO, e.APELLIDO_EMPLEADO, if (e.GENERO=0, 'MASCULINO', 'FEMENINO') AS GENERO, d.NOMBRE_DEPARTAMENTO, m.NOMBRE_MUNICIPIO, u.NOMBRE_USUARIO, r.NOMBRE_ROL, p.NOMBRE_PROFESION FROM empleado e INNER JOIN profesion p ON p.ID_PROFESION = e.ID_PROFESION INNER JOIN usuario u ON u.CODIGO_USUARIO = e.`USUARIO_CODIGO_USUARIO` INNER JOIN rol r ON r.ID_ROL = u.ROL_ID_ROL INNER JOIN departamento d On d.ID_DEPARTAMENTO = e.DEPARTAMENTO_ID_DEPARTAMENTO INNER JOIN municipio m ON m.ID_MUNICIPIO = e.MUNICIPIO_ID_MUNICIPIO";
        $conn = new clDML();
        $emp = $conn->get_list($query);
        return $emp;
    }
    public function guardar_empleado($nombre,$apellido,$genero,$cod_usuario,$unicipio,$departamento,$id_profesion,$rol)
    {
        $conn = new clDML();
        $query = "INSERT INTO EMPLEADO (NOMBRE_EMPLEADO,APELLIDO_EMPLEADO,GENERO_ID_GENERO,USUARIO_CODIGO_USUARIO,MUNICIPIO_ID_MUNICIPIO,DEPARTAMENTO_ID_DEPARTAMENTO,ID_PROFESION,ROL_ID_ROL) VALUES ('".strtoupper($nombre)."','".strtoupper($apellido)."','".strtoupper($genero)."','".strtoupper($cod_usuario)."','".strtoupper($municipio)."','".strtoupper($departamento)."','".strtoupper($id_profesion)."','".strtoupper($rol)."');";
		$result = $conn->guardar($query);
    return $result;
	}
	
    public function modificar_empleado($codigo,$nombre,$apellido,$genero,$cod_usuario,$departamento,$municipio,$direccion,$rol)
    {
        $query = "UPDATE EMPLEADO SET CODIGO_EMPLEADO = '".strtoupper($codigo)."', NOMBRE_EMPLEADO = '".strtoupper($nombre)."', APELLIDO_EMPLEADO = '".strtoupper($apellido)."', GENERO = '".strtoupper($genero)."' USUARIO_CODIGO_USUARIO = '".strtoupper($cod_usuario)."', DEPARTAMENTO_ID_DEPARTAMENTO = '".strtoupper($departamento)."', MUNICIPIO_ID_MUNICIPIO = '".strtoupper($municipio)."', DIRECCION = '".strtoupper($direccion)."', ROL_ID_ROL = '".strtoupper($rol)."' WHERE CODIGO_EMPLEADO = '".$codigo."';";
        $conn = new clDML();
        $result = $conn->guardar($query);
        if($result)
        {
            return 'El registro del empleado se modificó con éxito';
        }else{
            return 'Hubo un error';
        }   
    }

    public function eliminar_empleado($codigo)
    {
        $query = "DELETE FROM EMPLEADO WHERE CODIGO_EMPLEADO = '".$codigo."';";
        $conn = new clDML();
        $result = $conn->guardar($query);            
        return $result;
    }

    public function getEmpleadoByCod($codigo)
    {
        $query = "SELECT * FROM EMPLEADO WHERE CODIGO_EMPLEADO = '".$codigo."'";
        $conn = new clDML();
        $emp = $conn->get_list($query);
        return $emp;
    }
	
	
	 public function get_rol()
    {
        $query = "SELECT * FROM ROL";
        $conn = new clDML();
        $rol = $conn->get_list($query);
        return $rol;
    }   

    public function get_profesion()
    {
        $query = "SELECT * FROM PROFESION";
        $conn = new clDML();
        $prof = $conn->get_list($query);
        return $prof;
    }   

 public function get_municipios()
    {
        $query = "SELECT * FROM MUNICIPIO";
        $conn = new clDML();
        $muni = $conn->get_list($query);
        return $muni;
    }


    public function get_departamentos()
    {
        $query = "SELECT * FROM DEPARTAMENTO";
        $conn = new clDML();
        $depa = $conn->get_list($query);
        return $depa;
    }
     public function get_usuarios()
    {
        $query = "SELECT * FROM USUARIO";
        $conn = new clDML();
        $depa = $conn->get_list($query);
        return $depa;
    }
    }
?>
