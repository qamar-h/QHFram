<?php 

namespace App\Controller;

use Core\Controller\BaseController;

class HomeController extends BaseController
{

    public function index()
    {
        echo '<h1>Ma page d\'accueil</h1>';
    }

}