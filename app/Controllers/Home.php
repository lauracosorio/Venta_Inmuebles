<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\AlertError;
use CodeIgniter\HTTP\Request;

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

			if ($userData[0]['rol'] === 1) {
				return view('host_view');
			} else {
				return view('guest_view');
			}
		} else {
			echo '<div class="alert alert-danger" role="alert">Correo y/o constraseña invalidos</div>';
			return view('home');
		}
	}
}
