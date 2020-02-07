<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaraFacade;

class LaraFacadesController extends Controller
{
    public function laraFacadesView(){
        //define your age
        $age = 25;
        //call facade class LaraFacade
        return LaraFacade::checkForVotingAccess($age);
    }
}
