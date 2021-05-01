<?php

namespace App\Controllers;

use App\Models\AptoModel;
use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		$aptoModel = new AptoModel();
		$aptoData = $aptoModel->getAllAptos();
		echo view('index', array('aparments' => $aptoData));
		echo view('layouts/footer');
	}

	public function signIn()
	{
		$request = \Config\Services::request();
		//instanciando el modelo del usuarioy del apto
		$userModel = new UserModel();
		$aptoModel = new AptoModel();

		// trayendo datos del formulario
		$email = $request->getPost('email');
		$password = $request->getPost('password');

		//Encriptar contraseña
		$sha = sha1($password);

		//inicializando sesión
		$session = session();

		//trayendo datos del modelo
		$userData = $userModel->getUser($email);

		//Comparar contraseña del input con la BD
		$hash =  password_hash($sha, CRYPT_BLOWFISH);

		if (password_verify($userData[0]['contrasena'], $hash)) {

			if ($userData[0]['rol'] === '1') {
				$newData = [
					'email' => $email,
					'rol' => $userData[0]['rol'],
					'id' => $userData[0]['id_usuario'],
					'nombre' => $userData[0]['nombre_completo'],
					'logged_in' => TRUE
				];
				$session->set($newData);
				$idUser = $session->get('id');
				$aptoData = $aptoModel->getApto($idUser);
				// var_dump($aptoData);
				echo view('layouts/header', array('user' => $userData));
				echo view('host_view', array('aparments' => $aptoData));
				echo view('layouts/footer');
			} else if ($userData[0]['rol'] === '2') {

				$newData = [
					'email' => $email,
					'rol' => $userData[0]['rol'],
					'id' => $userData[0]['id_usuario'],
					'nombre' => $userData[0]['nombre_completo'],
					'logged_in' => TRUE
				];
				$session->set($newData);

				echo view('layouts/header', array('user' => $userData));
				echo view('host_view');
				echo view('layouts/footer');
			}
		} else {
			echo '<div class="alert alert-danger" role="alert">Correo y/o constraseña invalidos</div>';
			return view('index');
		}
	}

	public function signUp()
	{
		$request = \Config\Services::request();
		$userModel = new UserModel();

		//Recibir datos del form
		$name = $request->getPost('name');
		$country = $request->getPost('country');
		$city = $request->getPost('city');
		$email = $request->getPost('email');
		$password = $request->getPost('password');
		$rol = $request->getPost('rol');


		if (strlen($name) < 6 || strlen($country) < 4 || strlen($city) < 4 || strlen($password) < 6 || $rol === 'Rol') {
			echo '<div class="alert alert-danger" role="alert">No se pudo realizar el registro del usuario</div>';
			return view('home');
		} else {
			$userModel->registerUser($name, $country, $city, $email, $password, $rol);
			$userData = $userModel->getUser($email);

			$session = session();
			$newData = [
				'email' => $email,
				'rol' => $userData[0]['rol'],
				'id' => $userData[0]['id_usuario'],
				'nombre' => $userData[0]['nombre_completo'],
				'logged_in' => TRUE
			];
			$session->set($newData);

			echo view('layouts/header', array('user' => $userData));
			echo view('host_view');
			echo view('layouts/footer');

			if ($rol === '1') {
				return view('host_view', array('user' => $userData));
			} else if ($rol === '2') {
				return view('guest_view', array('user' => $userData));
			}
		}
	}

	public function signOut()
	{
		
		$session = session();
		$newData = [
			'logged_in' => FALSE
		];
		$session->set($newData);
		$session->destroy();

		$aptoModel = new AptoModel();
		$aptoData = $aptoModel->getAllAptos();
		echo view('index', array('aparments' => $aptoData));
		echo view('layouts/footer');
	}

	public function host_view()
	{
		$request = \Config\Services::request();
		//instanciando el modelo del usuarioy del apto
		$userModel = new UserModel();
		$aptoModel = new AptoModel();

		//inicializando sesión
		$session = session();
		$email = $session->get('email');

		if($session->get('email') != "" || $session->get('email') != null){
			//trayendo datos del modelo
		$userData = $userModel->getUser($email);

		$idUser = $session->get('id');
		$aptoData = $aptoModel->getApto($idUser);
		// var_dump($aptoData);
		echo view('layouts/header', array('user' => $userData));
		echo view('host_view', array('aparments' => $aptoData));
		echo view('layouts/footer');
		}
		else{
			echo view('layouts/header');
			echo "<h1 class=' mt-5 text-center text-danger'>404 </h1>";
			echo "<h1 class='text-center text-danger'>PAGE NOT FOUND </h1>";
			echo view('layouts/footer');
		}
		
	}
}
