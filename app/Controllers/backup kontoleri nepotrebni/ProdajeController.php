<?php

namespace app\Controllers;
use app\Models\Prodaja;


class ProdajeController extends Controller {

    function loadProdajePage() {

        $klijentModel = new Prodaja();

        $data = $klijentModel->getDataForProdajePage();

        $this->loadView('prodaje', $data);
    }
}