<?php namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
	public function index()
	{

		return view('backoffice/login');
	}
	public function sesion() {
		$session = session();
		$userModel = new UserModel($db);
		$usuario  = $_POST['usuario'];
		$password = $_POST['password'];
		$user = $userModel->where('deleted', 0)->where('email',$usuario)->where('password',$password)
                  ->first();
		if ($user) {
			$session->cod_usuario = $user->id;
		}
		header('Content-Type: application/json');
	    echo json_encode($user);
	}
	public function guardar()	{
		$userModel = new UserModel($db);
		$email  = $_POST['email'];
		$password = $_POST['password'];
		$nombre = $_POST['nombre'];
		$data = [
		  'name' => $nombre,
		  'password' =>$password,
          'email'    => $email
		];
		header('Content-Type: application/json');
		return json_encode($userModel->insert($data));
		
	}
	
	public function getOpcionesMenu()
	{
		$cod_padre  = $_POST['cod_padre'];
		$userModel = new UserModel($db);
		header('Content-Type: application/json');
		$opciones = $userModel->getOpciones($cod_padre);		
		return json_encode($opciones);
	
	}
	public function crear()	{
		return view('backoffice/users');
	}
	//--------------------------------------------------------------------
}
