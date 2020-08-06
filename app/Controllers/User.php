<?php namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
	public function index()
	{

		return view('backoffice/login');
	}
	public function sesion() {
		
		$userModel = new UserModel($db);
		$usuario  = $_POST['usuario'];
		$password = $_POST['password'];
		$user = $userModel->where('deleted', 0)->where('email',$usuario)->where('password',$password)
                  ->first();
		header('Content-Type: application/json');
	    echo json_encode($user);
	}
	
	public function getOpcionesMenu()
	{
		$userModel = new UserModel($db);
		header('Content-Type: application/json');
		return json_encode($userModel->getOpciones());
	
	}
	//--------------------------------------------------------------------
}
