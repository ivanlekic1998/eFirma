<?php

namespace app\Controllers;
use app\Models\Klijent;


class KlijentiController extends Controller {

    function loadKlijentPage() {

        $klijentModel = new Klijent();

        $data = $klijentModel->getAllClients();

        $this->loadView('klijenti', $data);
    }
}