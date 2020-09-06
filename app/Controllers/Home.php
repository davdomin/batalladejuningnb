<?php namespace App\Controllers;

use App\Models\DatosModel;
use App\Models\AbonosModel;

class Home extends BaseController
{
	public function index()	{
		$session = session();
		$abonosModel = new AbonosModel();
		$data = array(
    		'total_acumulado' => $abonosModel->getTotalAbonos(),
		);	

		$vista = "backoffice/login";				
		if ($session->has("cod_usuario"))

			$vista ="backoffice/menu";

		return view($vista,$data);

	}

	public function getDataSource() {
		header('Content-Type: application/json');
		$cod_clasificacion  = $_POST['cod_clasificacion'];		
		$datosModel = new DatosModel($db);
		return json_encode($datosModel->getDatos($cod_clasificacion));
	}

}
