<?php

namespace app\Controllers;
use app\Models\Klijent;

class NoviKlijentController extends Controller {

    function loadNoviKlijentPage() {

        $this->loadView('noviKlijent');

    }
}