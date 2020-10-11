<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ClientesModel;

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
		$user = $userModel->where('deleted', 0)->where('email',$usuario)->where('clave',$password)->where('deleted','0')->where('aprobado','1')->first();
		if ($user) {
			$session->set(['cod_usuario' => $user["id"]]);
		}
		header('Content-Type: application/json');
	    return json_encode($user);
	}
	public function subirFoto() {
		$session = session();
		$userModel = new UserModel($db);
		$cod_usuario = $session->get("cod_usuario");
		$clientesModel = new ClientesModel($db);
		$cliente  =  $clientesModel->getByUser($cod_usuario);
		$data = [
			'cod_usuario'  => $cod_usuario,
			'foto_guardada' => '../upload/users/'. $cliente['foto']

		  ];		
  
		return view('backoffice/subir_foto', $data);
	}

	public function ponerFoto()
    {
        $config['upload_path'] = './upload/users/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;

		//$this->load->library('upload', $config);
		$this->load->library('upload');
        if (!$this->upload->do_upload('foto')) { #Aquí me refiero a "foto", el nombre que pusimos en FormData
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            echo json_encode(true);
        }
	}
	public function upload() {
		$session = session();
		$file = $this->request->getFile('file');
		$newName = $file->getRandomName();
		
		if (!$file->move('./upload/users', $newName)) 
			return  false;

		$cod_usuario = $session->get("cod_usuario");
		$userModel = new UserModel($db);
		$clientesModel = new ClientesModel($db);
		$cliente  =  $clientesModel->getByUser($cod_usuario);
		$clientesModel->updatePhoto($cliente["id"], $newName);
		return $newName;
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
		$cod_usuario = $_POST['cod_usuario'];
		$userModel = new UserModel($db);
		header('Content-Type: application/json');
		$opciones = $userModel->getOpciones($cod_padre,$cod_usuario);
		return json_encode($opciones);	
	}
	public function crear()	{	
		return view('backoffice/users');
	}
	//--------------------------------------------------------------------
}
