<?php

namespace App\Models;

use CodeIgniter\Model;

class AptoModel extends Model
{
    function getAllAptos(){
        
        $sql = "SELECT * FROM apartamentos";
        $apartamento = $this->db->query($sql);

        return $apartamento->getResultArray();
    }

    function getApto($idUser)
    {
        $sql = "SELECT * FROM apartamentos WHERE id_usuario = {$idUser}";
        $apartamento = $this->db->query($sql);

        return $apartamento->getResultArray();
    }

    function getAptoId($id){
        $sql = "SELECT * FROM apartamentos WHERE id_apartamentos={$id}";
        $apto = $this->db->query($sql);
        return $apto->getResultArray();
    }

    function registerApto($idUser, $ciudad, $pais, $direccion, $habitaciones, $valor, $resena, $imagen)
    {
        $sql = "INSERT INTO apartamentos (id_usuario, ciudad, pais, direccion, numero_habitaciones, valor_noche, resena, imagen_destacada) VALUES ('{$idUser}','{$ciudad}', '{$pais}', '{$direccion}', '{$habitaciones}', '{$valor}', '{$resena}', '{$imagen}')";

        $this->db->query($sql);
    }

    function updateApto($idApto, $ciudad, $pais, $direccion, $habitaciones, $valor, $resena, $imagen){
        $sql = "UPDATE apartamentos SET ciudad ='{$ciudad}', pais = '{$pais}', direccion = '{$direccion}', numero_habitaciones = '{$habitaciones}', valor_noche = '{$valor}', resena = '{$resena}', imagen_destacada = '{$imagen}' WHERE id_apartamentos={$idApto}";

        $this->db->query($sql);
    }
};
