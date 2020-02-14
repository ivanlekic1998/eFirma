<?php

namespace app\Controllers;
use app\Models\Klijent;


class KlijentCrudController extends Controller {



                                        // INSERT NOVOG KLIJENTA //

    public function createKlijent() {

        $klijent = new Klijent();
        $brojac = 0;
        $naziv = "";
        $vlasnik = "";
        $adresa = "";
        $PIB = "";
        $datum_partnerstva = "";
        $ziro_racun = "";
        $email = "";
        $telefon = "";
        $delatnost = "";

        if(isset($_POST['btnKlijentUnesi'])) {
            if(isset($_POST['naziv'])) { $naziv = $_POST['naziv'];} else  $brojac++;
//            $naziv = $_POST['naziv'];
            if(isset($_POST['vlasnik'])) { $vlasnik = $_POST['vlasnik']; } else  $brojac++;
//            $vlasnik = $_POST['vlasnik'];
            if(isset($_POST['adresa'])) { $adresa = $_POST['adresa']; }else  $brojac++;
//            $adresa = $_POST['adresa'];
            if(isset($_POST['PIB'])) { $PIB = $_POST['PIB']; }else  $brojac++;
//            $PIB = $_POST['PIB'];
            if(isset($_POST['datum_partnerstva'])) { $datum_partnerstva = $_POST['datum_partnerstva']; }else  $brojac++;
//            $datum_partnerstva = $_POST['datum_partnerstva'];
            if(isset($_POST['ziro_racun'])) { $ziro_racun = $_POST['ziro_racun']; }else  $brojac++;
//            $ziro_racun = $_POST['ziro_racun'];
            if(isset($_POST['email'])) { $email = $_POST['email']; }else  $brojac++;
//            $email = $_POST['email'];
            if(isset($_POST['telefon'])) { $telefon = $_POST['telefon']; }else  $brojac++;
//            $telefon = $_POST['telefon'];
            $logo_firme = ".";
            $napomena = $_POST['napomena'];
            $aktivan = 1;
            if(isset($_POST['delatnost'])) { $delatnost = $_POST['delatnost']; }else  $brojac++;
//            $delatnost = $_POST['delatnost'];

            $data = [
                $naziv, $vlasnik, $adresa, $PIB, $datum_partnerstva, $ziro_racun, $email,
                $telefon, $logo_firme, $napomena, $aktivan, $delatnost
            ];

            if($brojac == 0) {
                try {
                    $klijent->insertKlijent($data);
                    $_SESSION['dodavanjeKlijentaOk'] = "Klijent je uspešno dodat!";
                    $this->redirect("index.php?page=klijenti");
                } catch (\PDOException $ex) {
                    $this->json("Unos klijenta nije uspeo", 500);
                }
            } else {
                $_SESSION['error'] = "Nisu uneti svi podaci o klijentu. Unesite podatke o klijentu.";
                $this->redirect("index.php?page=klijent");
            }



        }
    }

                                    /////////////////////////////////////





                                       // UPDATE POSTOJECEG KLIJENTA //

    public function updateKlijent($id = NULL) {

        $klijent = new Klijent();

        if(isset($_POST['btnKlijentIzmeni'])) {

            $id = $_POST['id'];
            $naziv = $_POST['naziv'];
            $vlasnik = $_POST['vlasnik'];
            $adresa = $_POST['adresa'];
            $PIB = $_POST['PIB'];
            $datum_partnerstva = $_POST['datum_partnerstva'];
            $ziro_racun = $_POST['ziro_racun'];
            $email = $_POST['email'];
            $telefon = $_POST['telefon'];
            $logo_firme = "/";
            $napomena = $_POST['napomena'];
            $aktivan = 1;
            $delatnost = $_POST['delatnost'];

            $data = [
                $naziv, $vlasnik, $adresa,
                $PIB, $datum_partnerstva, $ziro_racun,
                $email, $telefon,
                $logo_firme, $napomena, $aktivan, $delatnost
            ];

            try {
                $klijent->updateKlijent($id, $data);
                $this->redirect("index.php?page=klijenti");

            } catch (\PDOException $ex) {
                $this->json($ex, 500);
            }

        } else {

            $data = $klijent -> findKlijent($id);
            $this -> loadView("klijent-izmeni", $data);

        }


        }

                                    /////////////////////////////////////





                                    // BRISANJE POSTOJECEG KLIJENTA //


        public function deleteKlijent($id) {

            $klijentCrudModel = new Klijent();
            try {
                $klijentCrudModel->deleteKlijent($id);
                echo "Klijent uspesno obrisan";
            } catch (\PDOException $ex) {
                $this->json("Delete nije uspeo", 500);
            }
        }

                                             /// PRETRAGA Klijenti

    public function searchKlijenti() {

        if(isset($_GET['valueSearch'])) {
            try{

                $data = "%".strtolower($_GET['valueSearch'])."%";

                $model = new Klijent();
                $podaci = $model->getSearchKlijenti($data);

                $this->json($podaci);
            } catch (\PDOException $ex) {
                $this->json($ex->getMessage(), 500);
            }
        } else {
            $this->json("Nema podataka za date pojmove", 403);
        }
    }
    }

