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

	public function getDepositosPendientes()	{
		header('Content-Type: application/json');
		$abonosModel = new AbonosModel($db);
		$clientesModel = new ClientesModel($db);
		return json_encode($clientesModel->getDepositosEstado($abonosModel->getEstadoPendiente()));
	}


}
