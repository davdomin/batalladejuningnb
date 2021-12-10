<?php namespace App\Controllers;

use App\Models\DatosModel;
use App\Models\AbonosModel;
use App\Models\ClientesModel;

class Home extends BaseController
{
	public function index()	{
		$session = session();
		$abonosModel = new AbonosModel();		
		$id_login = $session->get("cod_usuario") ?  $session->get("cod_usuario") :-1;
		$clientesModel = new ClientesModel($db);
		$cliente  =  $clientesModel->getByUser($id_login);
		$cod_cliente  = $cliente["id"];
		$saldo = $clientesModel->getSaldoPorCliente($cod_cliente);
		$bloqueado = $clientesModel->getSaldoBloqueadoPorCliente($cod_cliente);
		$data = array(
			'id_login' => $id_login,
			'total_acumulado' => $abonosModel->getTotalAbonos()	,
			'foto_guardada' => '../upload/users/'. $cliente['foto'],
			'nombre' => $cliente['nombres'],
			'apellidos' => $cliente['apellidos'],
			'saldo_actual'   => $saldo,
			'bloqueado'=> $bloqueado
			
		);
		return view('backoffice/menu',$data);
	}
	public function session() {
		return view('session');
	}
	public function getDataSource() {
		header('Content-Type: application/json');
		$cod_clasificacion  = $_GET['cod_clasificacion'];
		$prefix  = $_GET['prefix'];
		$datosModel = new DatosModel($db);
		return json_encode($datosModel->getDatos($cod_clasificacion, $prefix));
	}

	public function getValuesByKey() {
		header('Content-Type: application/json');
		$key  = $_GET['key'];
		$datosModel = new DatosModel($db);
		return json_encode($datosModel->getDatosByKey($key));

	}

}
