<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['name', 'email','clave', 'cod_perfil','aprobado','deleted'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
    public function getLogin($cedula, $password)
    {
		$sql ="SELECT u.* FROM users u INNER JOIN clientes c ON u.id= c.cod_usuario WHERE c.cedula='$cedula' AND u.clave='$password'";
		//	echo $sql; die();
        $result = $this->db->query($sql);
        return $result->getResult()[0];
    }
    public function getOpciones($cod_padre, $cod_usuario)
    {        
        $sql ="SELECT  
                    t.id,t.nombre,t.controller,t.metodo,t.cod_padre,
                exists(select 1 from menu t1 where t1.cod_padre = t.id) tiene_hijos
                    FROM menu t 
                    INNER JOIN perfil_menu pm ON t.id = pm.cod_menu
                    INNER JOIN users u ON u.cod_perfil = pm.cod_perfil	
                WHERE t.deleted = 0 AND t.cod_padre = $cod_padre  AND u.id   =  $cod_usuario";

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
    public function aprobar($id) {
        $data = [
            'aprobado' => 1,
          ];
          return $this->update($id, $data);

    }
    public function rechazar($id) {
        $data = [
            'deleted' => 1,
          ];
          return $this->update($id, $data);

    }
}