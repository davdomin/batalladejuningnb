<?php namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
	public function index()
	{

		return view('backoffice/login');
	}
	public function sesion() {
		header('Content-Type: application/json');
		$userModel = new UserModel($db);
		$usuario  = $_POST['usuario'];
		$password = $_POST['password'];
		$user = $userModel->where('deleted', 0)->where('email',$usuario)->where('password',$password)
                  ->first();
				  
		 echo json_encode( $user);
	}
	//--------------------------------------------------------------------
}
