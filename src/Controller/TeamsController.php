<?php

namespace App\Controller;

use Core\Component\Controller\BaseController;

class TeamsController extends BaseController
{

    public function index()
    {
        $params = [
            'title' => 'Masterclass',
            'description' => 'Développeur php éthique  .'
        ];

        $this->renderFromTemplate('teams/index');
    }

}