<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    function getUser($email)
    {

        $sql = "SELECT * FROM usuarios WHERE email ='{$email}'";
        $user = $this->db->query($sql);

        return $user->getResultArray();
    }

    function registerUser($name, $country, $city, $email, $password, $rol)
    {
        $sql = "INSERT INTO usuarios(nombre_completo, pais, ciudad, email, contrasena, rol) VALUES ('{$name}', '{$country}', '{$city}', '{$email}', '{$password}', '{$rol}')";

        $this->db->query($sql);
    }
};
