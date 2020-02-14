<?php

require_once "app\Config\setup.php";
use app\Controllers\InitialPagesController;
use app\Controllers\KlijentCrudController;
use app\Controllers\LoginController;
use app\Controllers\ProdajaCrudController;
use app\Controllers\MailSenderController;




// Objekti kontrolera

$initialPage = new InitialPagesController();
$klijentCRUD = new KlijentCrudController();
$prodajaCRUD = new ProdajaCrudController();
$emails = new MailSenderController();
$login = new LoginController();

if(isset($_SESSION['korisnik'])) {

if(isset($_GET["page"])) {

    if(isset($_GET['action'])) {

        switch($_GET['action']) {

            case "izmeni" :
                $klijentCRUD->updateKlijent($_GET['id']);
                exit;
                break;

            case "obrisi" :
                $klijentCRUD->deleteKlijent($_GET['id']);
                exit;
                break;
            case "klijentProfile" :
                $initialPage->loadKlijentProfilePage($_GET['id']);
                exit;
                break;
            case "generatePdf" :
                $initialPage->generatePdf($_GET['id']);
                exit;
                break;
            case "sendEmail" :
                $emails->sendClientSaleReport($_GET['id']);
                exit;
                break;
        }
    }

    switch ($_GET['page']) {

        case "home" :

            $initialPage->loadHomePage();
            exit;
            break;

        case "prodaje" :

            $initialPage->loadProdajePage();
            exit;
            break;
        case "prodaja" :

            $initialPage->loadNovaProdajaPage();
            exit;
            break;
        case "prodaja/dodaj" :

            $prodajaCRUD->createProdaja();
            exit;
            break;
        case "klijenti" :

            $initialPage->loadKlijentPage();
            exit;
            break;

        case "klijent" :

            $initialPage->loadNoviKlijentPage();
            exit;
            break;

        case "klijent/dodaj" :

            $klijentCRUD->createKlijent();
            exit;
            break;

        case "klijent/izmeni" :

            $klijentCRUD->updateKlijent();
            break;

        case "login/validate" :
            $login->checkUserInfo();
            break;

        case "searchProdaje" :
            $prodajaCRUD->searchProdaje();
            exit;
            break;

        case "searchKlijenti" :
            $klijentCRUD->searchKlijenti();
            exit;
            break;

        case "logout" :
            $login->logout();
            exit;
            break;
    }
}

}
if(isset($_SESSION['korisnik'])) {
    $initialPage->loadHomePage();
} else
{
    include('app/Views/login.php');
}

if($_GET['page'] == 'login/validate') {
     $login->checkUserInfo();
}