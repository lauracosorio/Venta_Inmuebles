<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    function getUser($email)
    {
        //consulta para traer usuario por correo
        $sql = "SELECT * FROM usuarios WHERE email ='{$email}'";
        $user = $this->db->query($sql);

        return $user->getResultArray();
    }

    function registerUser($name, $country, $city, $email, $password, $rol)
    {
        //consulta para registrar usuario
        $sql = "INSERT INTO usuarios(nombre_completo, pais, ciudad, email, contrasena, rol) VALUES ('{$name}', '{$country}', '{$city}', '{$email}', SHA('{$password}'), '{$rol}')";

        $this->db->query($sql);
    }

    function updateUser($id, $name, $country, $city, $email, $password, $rol, $imagen, $biografia)
    {
        $sql = "UPDATE usuarios SET nombre_completo='{$name}',pais='{$country}',ciudad='{$city}',email='{$email}',contrasena='{$password}',rol='{$rol}',foto_perfil='{$imagen}',biografia='{$biografia}'WHERE id_usuario='{$id}'";
        
        $this->db->query($sql);
    }
};
