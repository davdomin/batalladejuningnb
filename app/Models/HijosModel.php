<?php
namespace App\Models;

use CodeIgniter\Model;

class HijosModel extends Model
{
    protected $table      = 'clientes_hijos';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id','cod_cliente', 'nombre', 'fecha_nac', 'cod_datos_sexo', 'deleted'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function updateData($data, $id){
        if ( $this->where('id',$id)->update($table,$data))
            return  $this->where('id ',$id)->first();

        return false;
    }
    public function deleteSoft($id){
        return $this->where('id',$id)->update($table,array('deleted' => 1));
    }
}
