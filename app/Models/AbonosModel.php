<?php
namespace App\Models;

use CodeIgniter\Model;

class AbonosModel extends Model
{
    protected $table      = 'abonos';
    protected $primaryKey = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['cod_cliente','cod_datos_banco','monto','referencia', 'observaciones','fecha_deposito'];
    public function __construct(){
        parent::__construct();        
    }
    function getEstadoPendiente() {
        return 14;
    }

}