<?php

namespace app\Controllers;

class Controller {

    protected function loadView($view, $data = null) {
        require_once 'app/Views/header.php';
        require_once 'app/Views/' . $view . '.php';
        require_once 'app/Views/footer.php';
    }

    protected function  loadPdfDocument($view, $data = null) {
        require_once 'app/Views/' . $view . '.php';
    }

    protected  function  redirect($page) {
        header('Location:' . $page);
    }

    protected function json($data = null, $statusCode = 200) {
        header("content-type: application/json");
        http_response_code($statusCode);
        echo json_encode($data);
    }

}