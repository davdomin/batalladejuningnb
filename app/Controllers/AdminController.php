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
	public function cambiarEstadoAbono() {
		header('Content-Type: application/json');
		$cod_estado  = $_POST['cod_estado'];
		$cod_abono  = $_POST['cod_abono'];
		$abonosModel = new AbonosModel();
		return $abonosModel->cambiarEstado($cod_abono, $cod_estado);
	}

	public function getDepositosPendientes(){
		header('Content-Type: application/json');
		$abonosModel = new AbonosModel($db);
		$clientesModel = new ClientesModel($db);
		return json_encode($clientesModel->getDepositosEstado($abonosModel->getEstadoPendiente()));
	}


}
