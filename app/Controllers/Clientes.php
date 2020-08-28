<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ClientesModel;


class Clientes extends BaseController
{
	public function crear()
	{
		return view('backoffice/crear_clientes');
	}
	public function depositar()
	{
		$session = session();
		$data = array(
    		'cod_usuario' => $session->get("cod_usuario"),
		);		
		return view('depositar',$data);
	}

	public function guardar_deposito()	{

	}
	
	public function guardar()	{
		header('Content-Type: application/json');
		$userModel = new UserModel($db);
		$clientesModel = new ClientesModel($db);
		
		$cedula  = $_POST['cedula'];
		$email  = $_POST['email'];
		$password = $_POST['password'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$cod_sexo = $_POST['cod_sexo'];
		$cod_grupo = $_POST['cod_grupo'];
		
		
		$nombreCompleto = $nombre .' '.$apellido;
		$data = [
		  'name' => $nombreCompleto,
		  'clave' =>$password,
          'email'    => $email
		];
		$cod_usuario = $userModel->insert($data);
		if ($cod_usuario == 0) return false;
		$data = [
		  'cedula' => $cedula,
		  'nombres' => $nombre,
          'apellidos' => $apellido,
		  'direccion' => $direccion,
		  'telefono' => $telefono,
		  'cod_usuario' => $cod_usuario,
		  'cod_datos_sexo' => $cod_sexo,
		  'cod_datos_grupo' => $cod_grupo,
		];		
		return json_encode($clientesModel->insert($data));		
	}
}
