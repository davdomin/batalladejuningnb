<?php
namespace App\Models;

use CodeIgniter\Model;

class AbonosModel extends Model
{
    protected $table      = 'abonos';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['cod_cliente','cod_datos_banco','monto','referencia', 'observaciones'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}