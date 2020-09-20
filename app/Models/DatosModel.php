<?php
namespace App\Models;

use CodeIgniter\Model;

class DatosModel extends Model
{
    protected $table      = 'datos';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['cod_clasificacion', 'nombre'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    

    public function getDatos($cod_clasificacion) {
        
        $sql ="SELECT * FROM datos WHERE cod_clasificacion = $cod_clasificacion";
        $result = $this->db->query($sql);        
        return  $result->getResult();
    }
    public function getDatosByKey($key) {        
        $sql ="SELECT datos.nombre FROM datos INNER JOIN clasificacion ON datos.cod_clasificacion = clasificacion.id WHERE  key_value = '$key'";
        $result = $this->db->query($sql);        
        return  $result->getResult();
    }
}