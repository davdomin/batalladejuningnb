<?php namespace App\Controllers;

use App\Models\DatosModel;
use App\Models\UserModel;
use App\Models\ClientesModel;
use App\Models\AbonosModel;

class AdminController extends BaseController
{
		

	public function aprobarDepositos() {
		return view('backoffice/aprobardepositos');
	}
	public function aprobarUsuario() {
		return view('backoffice/aprobarusuario');
	}
	public function aprobarUnUsuario() {
		header('Content-Type: application/json');
		$session = session();
		$userModel = new UserModel($db);
		$cod_usuario = $_POST['cod_usuario'];
		$user = $userModel->getById($cod_usuario);
		$email = $user["email"];		
		$this->enviarMail("Aprobación de usuario", 'Se aprobó el su usuario', $email);
		return $userModel->aprobar($cod_usuario);
	}
	public function rechazarUnUsuario() {
		header('Content-Type: application/json');		
		$session = session();
		$userModel = new UserModel($db);
		$cod_usuario = $_POST['cod_usuario'];
		$user = $userModel->getById($cod_usuario);
		return $userModel->rechazar($cod_usuario);
	}

	public function cambiarEstadoAbono() {
		header('Content-Type: application/json');
		$session = session();
		$userModel = new UserModel($db);
		$cod_usuario = $session->get("cod_usuario");
		$cod_estado  = $_POST['cod_estado'];
		$cod_abono  = $_POST['cod_abono'];
		$abonosModel = new AbonosModel();
		$user = $userModel->getById($cod_usuario);
		$email = $user["email"];		
		$this->enviarMail("Aprobación de deposito", 'Se aprobó el su deposito', $email);
		return $abonosModel->cambiarEstado($cod_abono, $cod_estado);
	}

	public function getDepositosPendientes(){
		header('Content-Type: application/json');
		$abonosModel = new AbonosModel($db);
		$clientesModel = new ClientesModel($db);
		return json_encode($clientesModel->getDepositosEstado($abonosModel->getEstadoPendiente()));
	}
	public function getUsuariosPendientes(){
		header('Content-Type: application/json');			
		$clientesModel = new ClientesModel($db);		
		return json_encode($clientesModel->getUsuariosPendientes());
	}

	public function enviarMail($subject, $content, $to) {
		$email = \Config\Services::email();
		$email->setFrom('alertas@dacli.com', 'Alertas Dacli');
		$email->setTo($to);
		$email->setSubject($subject);
		$email->setMessage($content);
		$email->send();
	}

}
