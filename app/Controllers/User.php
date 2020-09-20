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
		$user = $userModel->where('deleted', 0)->where('email',$usuario)->where('clave',$password)->first();
		if ($user) {
			$session->set(['cod_usuario' => $user["id"]]);
		}
		header('Content-Type: application/json');
	    return json_encode($user);
	}
	public function cerrarSesion() {
		$session = session();
		$login_path = env('index_url');
		$data = [
			'login_path' => $login_path
		];
		$session->set(['cod_usuario' => -1]);
		return view('backoffice/cerrar_sesion', $data);		
	}
	public function guardar()	{
		$userModel = new UserModel($db);
		$email  = $_POST['email'];
		$password = $_POST['password'];
		$nombre = $_POST['nombre'];
		$data = [
		  'name'  => $nombre,
		  'clave' => $password,
          'email' => $email
		];		
		header('Content-Type: application/json');
		return json_encode($userModel->insert($data));		
	}
	public function getPerfiles() {
		$userModel = new UserModel($db);		
		return json_encode($userModel->getPerfiles());
	}
	
	public function getOpcionesMenu()
	{
		$cod_padre = $_POST['cod_padre'];
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
