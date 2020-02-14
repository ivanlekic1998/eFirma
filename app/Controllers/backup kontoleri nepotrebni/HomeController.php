<?php

namespace app\Controllers;
use app\Models\Klijent;
use app\Models\Prodaja;


class HomeController extends Controller {

    public function loadHomePage() {

        $klijentModel = new Klijent();
        $prodajaModel = new Prodaja();

        $poslednjiPetKlijenti = $klijentModel->getFirstFiveClients();
        $poslednjiPetProdaja = $prodajaModel->getFirstFiveSales();

        $this->loadView('home', [
            "poslednjihPetKlijenata" => $poslednjiPetKlijenti,
            "poslednjihPetProdaja" => $poslednjiPetProdaja
        ]);
    }
}