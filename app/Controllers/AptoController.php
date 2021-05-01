<?php

namespace App\Controllers;

use App\Models\AptoModel;
use App\Models\UserModel;

class AptoController extends BaseController
{
    public function getApto()
    {
        $request = \Config\Services::request();
        $aptoModel = new AptoModel();
        $userModel = new UserModel();

        $session = session();
        $email = $session->get('email');
        $userData = $userModel->getUser($email);
        $idUser = $userData[0]['id_usuario'];

        $aptoData = $aptoModel->getApto($idUser);

        return redirect()->to('host_view');
    }

    public function registerApto()
    {
        $request = \Config\Services::request();
        $aptoModel = new AptoModel();
        $userModel = new UserModel();

        $session = session();


        //Recibir datos del form
        $ciudad = $request->getPost('ciudad');
        $pais = $request->getPost('pais');
        $direccion = $request->getPost('direccion');
        $habitaciones = $request->getPost('habitaciones');
        $valor = $request->getPost('valor');
        $resena = $request->getPost('resena');
        $imagen = $request->getPost('imagen');
        $email = $session->get('email');
        $userData = $userModel->getUser($email);
        $idUser = $session->get('id');
        $aptoData = $aptoModel->getApto($idUser);

        if (strlen($ciudad) < 4 || strlen($pais) < 4 || strlen($direccion) < 10 || $habitaciones === '0'  || $ciudad === null  || $pais === null  || $direccion === null  || $habitaciones === null || $valor === null) {
            echo '<div class="alert alert-danger m-0" role="alert">No se pudo realizar el registro del apartamento</div>';
            echo view('layouts/header', array('user' => $userData));
            echo view('host_view', array('aparments' => $aptoData));
            echo view('layouts/footer');
        } else {
            // echo "Registrando Apartamento" . $idUser . $ciudad . $pais . $direccion . $habitaciones . $valor . $resena . $imagen;
            $aptoModel->registerApto($idUser, $ciudad, $pais, $direccion, $habitaciones, $valor, $resena, $imagen);
            $userData = $userModel->getUser($email);
            $idUser = $session->get('id');
            $aptoData = $aptoModel->getApto($idUser);
            // echo view('/host_view', array('user' => $userData));
            echo view('layouts/header', array('user' => $userData));
            echo view('host_view', array('aparments' => $aptoData));
            echo view('layouts/footer');
        }
    }

    public function updateApto()
    {
        $request = \Config\Services::request();
        $aptoModel = new AptoModel();
        $userModel = new UserModel();

        $ciudad = $request->getPost('ciudad');
        $pais = $request->getPost('pais');
        $direccion = $request->getPost('direccion');
        $habitaciones = $request->getPost('habitaciones');
        $valor = $request->getPost('valor');
        $resena = $request->getPost('resena');
        $imagen = $request->getPost('imagen');

        $session = session();
        $email = $session->get('email');
        $userData = $userModel->getUser($email);
        $idUser = $session->get('id');
        $aptoData = $aptoModel->getUserApto($idUser);
        $idApto = $request->getGet('id');
        $aptoInfo = $aptoModel->getApto($idApto);

       // $aptoModel->updateApto($idApto, $ciudad, $pais, $direccion, $habitaciones, $valor, $resena, $imagen);

        echo $aptoInfo;
        echo view('layouts/header', array('user' => $userData));
        echo view('host_view', array(
            'aparments' => $aptoData,
            'aptoInfo' => $aptoInfo
        ));
        echo view('layouts/footer');

        // $session = session();
        // $email = $session->get('email');
        // $userData = $userModel->getUser($email);
        // $idUser = $session->get('id');
        // $aptoData = $aptoModel->getApto($idUser);
        // $idApto = $request->getGet('id');
        // $aptoInfo = $aptoModel->getAptoId($idApto);

        // echo view('layouts/header', array('user' => $userData));
        // echo view('host_view', array(
        //     'aparments' => $aptoData,
        //     'aptoInfo' => $aptoInfo
        // ));
        // echo view('layouts/footer');
    }

    public function update()
    {
        $request = \Config\Services::request();
        $aptoModel = new AptoModel();
        $userModel = new UserModel();

        $ciudad = $request->getPost('ciudad');
        $pais = $request->getPost('pais');
        $direccion = $request->getPost('direccion');
        $habitaciones = $request->getPost('habitaciones');
        $valor = $request->getPost('valor');
        $resena = $request->getPost('resena');
        $imagen = $request->getPost('imagen');

        $session = session();
        $email = $session->get('email');
        $userData = $userModel->getUser($email);
        $idUser = $session->get('id');
        $aptoData = $aptoModel->getUserApto($idUser);
        $idApto = $request->getGet('id');
        $aptoInfo = $aptoModel->getApto($idApto);

        $aptoModel->updateApto($idApto, $ciudad, $pais, $direccion, $habitaciones, $valor, $resena, $imagen);

        echo view('layouts/header', array('user' => $userData));
        echo view('host_view', array(
            'aparments' => $aptoData,
            'aptoInfo' => $aptoInfo
        ));
        echo view('layouts/footer');
        // return redirect()->to('host_view');
    }
}
