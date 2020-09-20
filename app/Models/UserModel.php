<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['name', 'email','clave', 'cod_perfil'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    

    public function getOpciones($cod_padre)
    {        
        $sql ="SELECT t.id,t.nombre,t.controller,t.metodo,t.cod_padre,
                exists(select 1 from menu t1 where t1.cod_padre = t.id) tiene_hijos
                FROM menu t WHERE cod_padre = $cod_padre AND t.deleted = 0";                
        $result = $this->db->query($sql);        
        return  $result->getResult();
    }

    public function getPerfiles() {
        $sql ="SELECT id,nombre FROM perfiles";                
        $result = $this->db->query($sql);        
        return  $result->getResult();
    }

    public function getById($id) {
        return $this->where('id',$id)->first();

    }
}