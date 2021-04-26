<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		return view('home');
	}

	public function guest_view()
	{
		return view('guest_view');
	}

	public function host_view()
	{
		return view('host_view');
	}

	public function getUser()
	{
		$request = \Config\Services::request();
		$userModel = new UserModel();
		$email = $request->getPost('email');
		$password = $request->getPost('password');

		$userData = $userModel->getUser($email);
		$hash =  password_hash($password, CRYPT_BLOWFISH);
		
		if (password_verify($userData[0]['contrasena'], $hash)) {
			if ($userData[0]['rol'] === '1') {
				return view('host_view', array('user' => $userData));
			} else if ($userData[0]['rol'] === '2') {
				return view('guest_view', array('user' => $userData));
			}
		} else {
			echo '<div class="alert alert-danger" role="alert">Correo y/o constraseña invalidos</div>';
			return view('home');
		}
	}

	public function registerUser()
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
			// echo "Registrando Usuario" . $name . $country . $city . $email . $password . $rol;
			$userModel->registerUser($name, $country, $city, $email, $password, $rol);
			$userData = $userModel->getUser($email);
			// echo $userData;
			if ($rol === '1') {
				return view('host_view', array('user' => $userData));
			} else if ($rol === '2') {
				return view('guest_view', array('user' => $userData));
			}
		}
	}
}
