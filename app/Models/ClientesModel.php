<?php
namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model
{
    protected $table      = 'clientes';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $allowedFields = [
        'cedula','cod_usuario','nombres','apellidos', 'direccion','telefono','cod_datos_sexo', 
        'cod_datos_grupo', 'cod_datos_jerarquia','cod_datos_lugar_nac', 'fecha_nac','telefono_fijo',
        'cod_datos_cargo', 'cod_datos_grado', 'especialidad', 'unidad', 'fecha_asc', 'estatura',
        'peso', 'cod_datos_camisa',  'cod_datos_pantalon',  'cod_datos_calzado', 'cod_datos_gorra',
        'cod_datos_estado_civil', 'conyuge', 'padre', 'madre', 'direccion_emergencia', 'foto'


    ];

   public function __construct(){
        parent::__construct();
    }
    public function updatePhoto($id, $foto) {
        return $this->where('id',$id)->update($table, array('foto' => $foto));
    }
    public function getByUser($cod_usuario) {
        $cliente = $this->where('cod_usuario',$cod_usuario)->first();
        return $cliente;
    }

    public function getAll() {
        $sql="SELECT id,cedula,nombres,apellidos, CONCAT(nombres,' ',apellidos) as nombrecompleto FROM clientes";
        $query= $this->db->query($sql);
        return $query->getResult();
    }

    public function getMisDepositos($cod_cliente)
    {
        
        $sql ="SELECT a.monto, a.referencia, a.observaciones, a.fecha_deposito, estado.nombre AS estado, banco.nombre AS banco FROM abonos a INNER JOIN datos estado ON a.cod_datos_estado = estado.id 
            LEFT JOIN datos banco ON a.cod_datos_banco = banco.id  
            WHERE cod_cliente = $cod_cliente 
            ORDER BY
             a.id DESC
            ";
            
        $result = $this->db->query($sql);        
        return  $result->getResult();
    }

    public function getDepositosEstado($cod_estado)
    {
        
        $sql ="SELECT  a.id as cod_abono, u.name AS cliente, a.monto, a.referencia, a.observaciones, a.fecha_deposito, estado.nombre AS estado, banco.nombre AS banco 
                FROM abonos a 
                INNER JOIN clientes c ON c.id = a.cod_cliente
                INNER JOIN users u ON u.id = c.cod_usuario
                INNER JOIN datos estado ON a.cod_datos_estado = estado.id 
                INNER JOIN datos banco ON a.cod_datos_banco = banco.id  WHERE a.cod_datos_estado = $cod_estado
                ORDER BY a.id DESC
                ";
            
        $result = $this->db->query($sql);        
        return  $result->getResult();
    }
    public function getUsuariosPendientes() {
        $sql ="SELECT u.id AS cod_usuario,c.cedula as cedula ,u.name AS usuario FROM users u INNER JOIN  clientes c ON c.cod_usuario = u.id  WHERE u.aprobado = 0 AND u.deleted=0";        
        $result = $this->db->query($sql);        
        return  $result->getResult();
    }


    public function getSaldoPorCliente($cod_cliente)
    {        
        $sql ="SELECT CAST(IFNULL(SUM(monto),0) as double) as monto FROM abonos WHERE cod_datos_estado IN (15,18) AND cod_cliente = $cod_cliente";            
        $result = $this->db->query($sql);   
        return  $result->getResult()[0]->monto;
    }    
    

    public function getSaldoBloqueadoPorCliente($cod_cliente)
    {        
        $sql ="SELECT CAST(IFNULL(SUM(monto),0) as double) as monto FROM abonos WHERE cod_datos_estado IN (14) AND cod_cliente = $cod_cliente";            
        $result = $this->db->query($sql);
        return  $result->getResult()[0]->monto;
    }    


    public function getHijos($codCliente) {
        $sql ="SELECT 
                ch.id, 
                cod_cliente,
                ch.nombre,
                fecha_nac,	
                cod_datos_sexo, 
                sx.nombre as nom_sexo 
            FROM clientes_hijos ch
                LEFT JOIN datos sx ON ch.cod_datos_sexo = sx.id 
            WHERE ch.deleted=0 AND ch.cod_cliente = $codCliente";            
        $result = $this->db->query($sql);
        return  $result->getResult();
    }
}