<?php
namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model
{
    protected $table      = 'clientes';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $allowedFields = ['cedula','cod_usuario','nombres','apellidos', 'direccion','telefono','cod_datos_sexo', 'cod_datos_grupo'];

   public function __construct(){
        parent::__construct();        
    }
    public function getByUser($cod_usuario) {        
        $cliente = $this->where('id',$cod_usuario)->first();
        return $cliente;
    }

    public function getMisDepositos($cod_cliente)
    {
        
        $sql ="SELECT a.monto, a.referencia, a.observaciones, a.fecha_deposito, estado.nombre AS estado, banco.nombre AS banco FROM abonos a INNER JOIN datos estado ON a.cod_datos_estado = estado.id 
            INNER JOIN datos banco ON a.cod_datos_banco = banco.id  WHERE cod_cliente = $cod_cliente";
            
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
                INNER JOIN datos banco ON a.cod_datos_banco = banco.id  WHERE a.cod_datos_estado =$cod_estado";
            
        $result = $this->db->query($sql);        
        return  $result->getResult();
    }
    

}