<?php
namespace App\Models;

use CodeIgniter\Model;

class AbonosModel extends Model
{
    protected $table      = 'abonos';
    protected $primaryKey = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['cod_cliente','cod_datos_banco','cod_datos_estado','monto','referencia', 'observaciones','fecha_deposito'];
    public function __construct(){
        parent::__construct();        
    }
    function getEstadoPendiente() {
        return 14;
    }
    function cambiarEstado($id, $nuevoEstado) { 
        $data = [
          'cod_datos_estado' => $nuevoEstado,
        ];
        return $this->update($id, $data);
    }

    public function getTotalAbonos()
    {        
        $sql ="SELECT CAST(SUM(monto) as double) as monto FROM abonos WHERE cod_datos_estado IN (15,18)";
        $result = $this->db->query($sql);
        return  $result->getResult()[0]->monto;
    }
    
    public function getHijos($codCliente) {
        $sql ="SELECT  id, cod_cliente,nombre,fecha_nac,sexo FROM clientes_hijos WHERE cod_cliente = $codCliente";
        $result = $this->db->query($sql);
        return  $result->getResult();
    }


}