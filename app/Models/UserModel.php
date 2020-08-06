<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'email'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    

    public function getOpciones()
    {
        		$sql ="with recursive cte (id, nombre, destino, cod_padre) as (
					select     id,
							   nombre,
                               destino,
							   cod_padre
					from       menu
					where      cod_padre =0
					union all
					select     p.id,
							   p.nombre,
                               p.destino,
							   p.cod_padre
					from       menu p
					inner join cte
							on p.cod_padre = cte.id
				  )
				  select * from cte;";

        $result = $this->db->query($sql);        
        return  $result->getResult();
    }
}