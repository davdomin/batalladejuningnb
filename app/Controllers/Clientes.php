<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ClientesModel;
use App\Models\AbonosModel;

class Clientes extends BaseController
{
	public function crear()
	{
		return view('backoffice/crear_clientes');
	}
	public function depositar()
	{
		$session = session();
		$cod_usuario = $session->get("cod_usuario");
		$userModel = new UserModel($db);
		$clientesModel = new ClientesModel();

		$user = $userModel->getById($cod_usuario);
    	$cliente  =  $clientesModel->getByUser($cod_usuario);
		$data = array(
    		'nombre_usuario' => $user['name'],
    		'cod_usuario' => $cod_usuario,
    		'cod_cliente' =>$cliente["id"],
		);		
		return view('depositar',$data);
	}

	public function misdepositos()	{
		return view('mis_depositos');
	}
	
	public function getDepositos()	{
		header('Content-Type: application/json');
		$session = session();
		$userModel = new UserModel($db);
		$clientesModel = new ClientesModel();
		$cod_usuario = $session->get("cod_usuario");				
		$cliente  =  $clientesModel->getByUser($cod_usuario);
		$cod_cliente  = $cliente["id"];

		$clientesModel = new ClientesModel($db);		
		return json_encode($clientesModel->getMisDepositos($cod_cliente));
	}

	public function guardar_deposito()	{
		header('Content-Type: application/json');
		$abonosModel = new AbonosModel();
		$cod_cliente  = $_POST['cod_cliente'];
		$cod_banco  = $_POST['cod_banco'];
		$monto = $_POST['monto'];
		$referencia = $_POST['referencia'];
		$observaciones = $_POST['observaciones'];
		$fecha_deposito = $_POST['fecha_deposito'];
		

		$data = [
		  'cod_cliente' => $cod_cliente,
		  'cod_datos_banco' => $cod_banco,
          'monto' => $monto,
		  'referencia' => $referencia,
		  'observaciones' => $observaciones,
		  'fecha_deposito' =>  date("Y-m-d", strtotime($fecha_deposito)),
		];

		return json_encode($abonosModel->insert($data));
		
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
