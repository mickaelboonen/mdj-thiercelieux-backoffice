<?php

namespace App\Controllers;

class ErrorController extends CoreController {
    /**
     * Method to display the 404 page
     * @return void
     */
    public function err404() {

        header('HTTP/1.0 404 Not Found');
        $this->show('error/err404');
    }

    /**
     * Method to display the 403 page
     * @return void
     */
    public function err403() {

        http_response_code(403);
        $this->show('error/err403');
        exit();
    }

}