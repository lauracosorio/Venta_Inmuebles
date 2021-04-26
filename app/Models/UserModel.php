<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    function getUser($email)
    {

        $sql = "SELECT * FROM usuarios WHERE email ='$email'";
        $user = $this->db->query($sql);

        // echo($user);
        return $user->getResultArray();
    }
};
