<?php

namespace App\Controllers;  
use CodeIgniter\Controller;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    public function index()
    {
        $session = session();
        echo "Hello : ".$session->get('name') ;
        echo "<br>";
       

    }
}
