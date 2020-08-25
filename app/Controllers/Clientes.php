<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ClientesModel;


class Clientes extends BaseController
{
	public function crear()
	{
		return view('backoffice/crear_clientes');
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
		
		$nombreCompleto = $nombre .' '.$apellido;
		$data = [
		  'name' => $nombreCompleto,
		  'clave' =>$password,
          'email'    => $email
		];
		$cod_usuario = $userModel->insert($data);
		if ($cod_usuario != 0) return false;
		$data = [
		  'cedula' => $cedula,
		  'nombres' => $nombre,
          'apellidos' => $apellido,
		  'direccion' => $direccion,
		  'telefono' => $telefono,
		  'cod_usuario' => $cod_usuario
		];		
		return json_encode($clientesModel->insert($data));		
	}


}
