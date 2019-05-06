<?php

class Main extends db {

  
    public function avtorization($login, $password) {
        $query = "SELECT * FROM admin WHERE login= '" . $login . "' AND password= '" . $password . "'";
        $result = $this->query($query)->all();
        $userLogin = '';
        $password = '';
        $user = $result;
        foreach ($result as $user) {
            $userLogin = $user['login'];
            $password = $user['password'];
        }

        if ($password == $password && $userLogin == $login) {
            session_start();
            $_SESSION['admin'] = $user;
            return true;
        } else {
            return false;
        }
    }

}
