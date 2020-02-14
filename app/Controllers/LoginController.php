<?php

namespace app\Controllers;
use app\Controllers\Controller;
use app\Models\Klijent;

class LoginController extends Controller {

    function checkUserInfo() {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $klijent = new Klijent();

            $userData = $klijent->checkUserData($username, $password);

            if($userData) {
                $_SESSION['korisnik'] = $userData;
                $this->redirect("index.php?page=home");
            } else {
                $_SESSION['error'] = "Kombinacija korisničkog imena i passworda nije tačna. Proverite kredencijale.";
                $this->redirect("index.php?page=login.php");
            }

    }
    function logout() {
        session_destroy();
        $this->redirect("index.php");
    }
}