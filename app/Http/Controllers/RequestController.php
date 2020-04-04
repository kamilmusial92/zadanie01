<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Backend\Interfaces\BackendRepositoryInterface;

class RequestController extends Controller
{

	 public function __construct(BackendRepositoryInterface $bR)
    {

        $this->bR=$bR;
        
    }

    public function request()
    {
		
		for($i=1;$i<=10;$i++) 
		{

		 $response = Http::get('https://swapi.co/api/people/?page='.$i);
		 
		 if($response->status()==200)
		 $this->bR->CreatePerson($response);

		}

    }

    public function response($name)
    {
    	return $this->bR->getPerson($name);

    }
}
