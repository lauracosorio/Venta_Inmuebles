<?php

namespace App\Controllers;

use App\Models\AptoModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;

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
        $dir_google_maps =$request->getPost('ubicacion');
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
            $aptoModel->registerApto($idUser, $ciudad, $pais, $direccion, $dir_google_maps, $habitaciones, $valor, $resena, $imagen);
            $userData = $userModel->getUser($email);
            $idUser = $session->get('id');
            $aptoData = $aptoModel->getApto($idUser);
            
            echo view('layouts/header', array('user' => $userData));
            echo view('host_view', array('aparments' => $aptoData));
            echo view('layouts/footer');
        }
    }

    public function updateApto()
    {
        $request = \Config\Services::request();
        $aptoModel = new AptoModel();

        $ciudad = $request->getPost('ciudad');
        $pais = $request->getPost('pais');
        $direccion = $request->getPost('direccion');
        $dir_google_maps = $request->getPost('ubicacion');
        $habitaciones = $request->getPost('habitaciones');
        $valor = $request->getPost('valor');
        $resena = $request->getPost('resena');
        $imagen = $request->getPost('imagen');
        $idApto = $request->getGet('id');

       $aptoModel->updateApto($idApto, $ciudad, $pais, $direccion, $dir_google_maps, $habitaciones, $valor, $resena, $imagen);

       return redirect()->to('host_view');
    }

    public function deleteApto()
    {
        $request = \Config\Services::request();
        $aptoModel = new AptoModel();

        $idApto = $request->getGet('id');

       $aptoModel->deleteApto($idApto);
       return redirect()->to('host_view');
    }


}
