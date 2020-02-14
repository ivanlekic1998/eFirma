<?php

namespace app\Controllers;
use app\Models\Prodaja;


class ProdajaCrudController extends Controller {



                           // INSERT NOVE PRODAJE //

    public function createProdaja() {

        $prodaja = new Prodaja();

        if(isset($_POST['btnProdajaUnesi'])) {
            $id_usluga = $_POST['usluga'];
            $id_klijent = $_POST['klijent'];
            $cena = $_POST['cena'];
            $opis_prodaje = $_POST['opis'];
            $datum_usluge = $_POST['datum'];

            $data = [
                $id_usluga, $id_klijent, $cena, $opis_prodaje, $datum_usluge
            ];

            try {
                $prodaja->insertProdaja($data);
                $this->redirect("index.php?page=prodaje");
            } catch (\PDOException $ex) {
                $this->json("Unos prodaje nije uspeo", 500);
            }

        }
    }

                       /////////////////////////////////////
    ///
    ///
    ///
    /// PRETRAGA PRODAJE

    public function searchProdaje() {

        if(isset($_GET['valueSearch'])) {
           try{

               $data = "%".strtolower($_GET['valueSearch'])."%";

               $model = new Prodaja();
               $podaci = $model->getSearchProdaje($data);

               $this->json($podaci);
           } catch (\PDOException $ex) {
               $this->json($ex->getMessage(), 500);
           }
        } else {
            $this->json("Nema podataka za date pojmove", 403);
        }
    }

}