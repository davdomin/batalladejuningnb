<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ClientesModel;
use App\Models\AbonosModel;

class Clientes extends BaseController
{
	public function getAll() {
		header('Content-Type: application/json');
		$clientesModel = new ClientesModel();
		return json_encode($clientesModel->getAll());
	}


	public function crear()	{
		return view('backoffice/crear_clientes');
	}
	
	public function actualizar()	{
		return view('backoffice/actualizar-datos');
	}

	public function depositar() {
		$session = session();
		$cod_usuario = $session->get("cod_usuario");
		$userModel = new UserModel($db);
		$clientesModel = new ClientesModel();

		$user = $userModel->getById($cod_usuario);
		$cliente  =  $clientesModel->getByUser($cod_usuario);
    	
		$data = array(
			'nombre_usuario' => $user['name'],
    		'cod_usuario' => $cod_usuario,
    		'cod_cliente' => $cliente["id"],
    		
		);		
		return view('depositar',$data);
	}

	public function getSaldo() {
		header('Content-Type: application/json');
		$clientesModel = new ClientesModel();		
		$cod_cliente  = $_GET['cod_cliente'];
		$saldo = $clientesModel->getSaldoPorCliente($cod_cliente);
		$data = array(
			'saldo' => $saldo
		);
		return json_encode($data);

	}

	public function retirar() {
		$session = session();
		$cod_usuario = $session->get("cod_usuario");
		$userModel = new UserModel($db);
		$clientesModel = new ClientesModel();

		$user = $userModel->getById($cod_usuario);
    	$cliente  =  $clientesModel->getByUser($cod_usuario);
    	
		$data = array(
    		'nombre_usuario' => $user['name'],
    		'cod_usuario' 	 => $cod_usuario,
    		'cod_cliente' 	 => $cliente["id"],
    		'saldo' => $saldo
		);

		return view('retirar',$data);
	}

	public function misdepositos()	{
		$session = session();
		$clientesModel = new ClientesModel();
		$cod_usuario = $session->get("cod_usuario");				

		$cliente  =  $clientesModel->getByUser($cod_usuario);
		$cod_cliente  = $cliente["id"];
		$saldo = $clientesModel->getSaldoPorCliente($cod_cliente);
		$bloqueado = $clientesModel->getSaldoBloqueadoPorCliente($cod_cliente);
		$data = array(
    		'saldo_actual'    => $saldo,
    		'saldo_bloqueado' => $bloqueado,
		);
		
		return view('mis_depositos', $data);
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
		$this->enviarMail("Deposito", 'Se hizo un deposito');
		return json_encode($abonosModel->insert($data));
		
	}
	
	public function guardar_retiro()	{
		header('Content-Type: application/json');
		$abonosModel = new AbonosModel();
		$cod_cliente  = $_POST['cod_cliente'];
		$cod_banco  = 0;
		$monto = $_POST['monto'];
		$referencia = 'retiro';
		$observaciones = $_POST['observaciones'];
		$fecha_deposito = date("Y/m/d");
		
		if ($monto == 0) return;
		if ($cod_cliente == 0) return;

		$data = [
		  'cod_cliente' => $cod_cliente,
		  'cod_datos_banco' => $cod_banco,
          'monto' => abs($monto) * -1,
		  'referencia' => $referencia,
		  'observaciones' => $observaciones,
		  'fecha_deposito' =>  date("Y-m-d", strtotime($fecha_deposito)),
		  'cod_datos_estado' => 18
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

	public function enviarMail($subject, $content) {
		$email = \Config\Services::email();
		$email->setFrom('alertas@dacli.com', 'Alertas Dacli');
		$email->setTo('marioantequera@gmail.com');
		$email->setSubject($subject);
		$email->setMessage($content);
		$email->send();
	}
}
