<?php


namespace app\Controllers;
use app\Models\Klijent;
use app\Models\Prodaja;
use app\Models\Usluga;
require 'vendor/autoload.php';
use Dompdf\Dompdf;



class InitialPagesController extends Controller {


    // INICIJALNO UCITAVANJE HOME STRANICE

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


    // INICIJALNO UCITAVANJE PRODAJA STRANICE

    function loadProdajePage() {

        $klijentModel = new Prodaja();

        $data = $klijentModel->getDataForProdajePage();

        $this->loadView('prodaje', $data);
    }


    // INICIJALNO UCITAVANJE KLIJENTI STRANICE

    function loadKlijentPage() {

        $klijentModel = new Klijent();

        $data = $klijentModel->getAllClients();

        $this->loadView('klijenti', $data);
    }

    // INICIJALNO UCITAVANJE DODAVANJE KLIJENTA STRANICE

    function loadNoviKlijentPage() {

        $this->loadView('klijent');

    }

    // INICIJALNO UCITAVANJE DODAVANJE KLIJENTA STRANICE

    function loadLoginPage() {

        require_once("app/Views/login.php");

    }


    // INICIJALNO UCITAVANJE DODAVANJE PRODAJE STRANICE

    function loadNovaProdajaPage() {

        $klijentModel = new Klijent();
        $uslugaModel = new Usluga();
        $allClients = $klijentModel->getAllClients();
        $allServices = $uslugaModel->getAllServices();
        $data = ["sviKlijenti" => $allClients, "sveUsluge" => $allServices];



        $this->loadView('prodaja', $data);

    }


    // INICIJALNO UCITAVANJE PROFILA ZADATOG KLIJENTA

    function loadKlijentProfilePage($id) {

        $klijentModel = new Klijent();
        $prodajaModel = new Prodaja();

        $client = $klijentModel->findKlijent($id);
        $sales = $prodajaModel->getDataForClientProfilePage($id);

        $data = ["klijentInfo" => $client, "prodaje" => $sales];



        $this->loadView('klijent-profile', $data);

    }


    // GENERISANJE PDF FAKTURE ZA DATU PRODAJU

    function generatePdf($id) {


        $prodajaModel = new Prodaja();
        $data = $prodajaModel->getDataForPdfDocument($id);
//        $this->loadPdfDocument('faktura', $data);
        $html = "";
        foreach ($data as $podatak) {
            $html .= "Cena je: <h1>{$podatak->cena}</h1>, treba odraditi kompletan template fakture // Nisam imao vremena";
        }
        $document = new Dompdf();
        $document->loadHtml($html);
        $document->setPaper('A4', 'portrait');
        $document->render();
        $document->stream("Faktura.pdf", array("Attachment" => 0));


    }



}