<?php namespace App\Controllers;

use App\Models\DatosModel;

class Home extends BaseController
{
	public function index()	{
		$session = session();
		$vista = "backoffice/menu";				
		if ($session->has("cod_usuario"))
			$vista ="backoffice/login";

		return view($vista);

	}

	public function getDataSource() {
		header('Content-Type: application/json');
		$cod_clasificacion  = $_POST['cod_clasificacion'];		
		$datosModel = new DatosModel($db);
		return json_encode($datosModel->getDatos($cod_clasificacion));
	}

}
