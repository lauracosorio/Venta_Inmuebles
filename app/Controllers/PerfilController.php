<?php

namespace App\Controllers;

use App\Models\AptoModel;
use App\Models\UserModel;

class PerfilController extends BaseController
{
	public function profile()
	{
		$userModel = new UserModel();

		$session = session();
		$email = $session->get('email');

        if($session->get('email') != "" || $session->get('email') != null){
            $userData = $userModel->getUser($email);

            echo view('layouts/header', array('user' => $userData));
            echo view('perfil');
            echo view('layouts/footer');
        }else{
            echo view('layouts/header');
			echo "<h1 class=' mt-5 text-center text-danger'>404 </h1>";
			echo "<h1 class='text-center text-danger'>PAGE NOT FOUND </h1>";
			echo view('layouts/footer');
        }
		
	}

    public function updateProfile(){
        $request = \Config\Services::request();
        $aptoModel = new AptoModel();
        $userModel = new UserModel();

        $session = session();

        $name = $request->getPost('name');
        $pais = $request->getPost('country');
        $ciudad = $request->getPost('city');
        $email = $request->getPost('email');
        $password = $request->getPost('password');
        $imagen = $request->getPost('imagen');
        $biografia = $request->getPost('biografia');
        $id = $session->get('id');
        $rol = $session->get('rol');

        $user = $userModel->updateUser($id, $name, $pais, $ciudad, $email, $password,$rol, $imagen, $biografia);

        $userData = $userModel->getUser($email);

        echo '<div class="alert alert-success m-0" role="alert">Datos actualizados con éxito</div>';
        echo view('layouts/header', array('user' => $userData));
		echo view('perfil', array('user' => $userData));
		echo view('layouts/footer');
    }
}