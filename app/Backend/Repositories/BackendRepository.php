<?php
namespace App\Backend\Repositories;


use App\Backend\Interfaces\BackendRepositoryInterface;
use App\Person;

class BackendRepository implements BackendRepositoryInterface {

 	public function CreatePerson($data)
	{
	 
	 foreach($data['results'] as $person)
	 	{
	 		
	 		$checkperson=$this->getPersonExist($person['name']);
	 		
	 		if(!$checkperson)
			{
	 			Person::create(['name'=>$person['name'],'mass'=>$person['mass'],'height'=>$person['height'],'gender'=>$person['gender'],'birth_year'=>$person['birth_year']]);
	 		}
	 	}
	}

	public function getPersonExist($name)
	{
		return $person=Person::where('name',$name)->exists();

	}

	public function getPerson($name)
	{

		$person=Person::where('name',$name)->first();
		if($person)
		{
			return response()->json($person);
		}
		else{
			return response()->json(['message'=>'Invalid name']);
		}
	}

}
