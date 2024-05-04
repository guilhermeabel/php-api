<?php

namespace App\Controllers;

use mysqli;

class TestController extends BaseController {

	public function index() {
		try {
			$ola = "Ola Mundo!";


			for ($i=1 ; $i<11 ; $i++){

						  echo $ola;

						  if($i%2 == 0){

										 echo "<br>";

						   }

						   else{

										  echo " - ";

						   }

			  }


		} catch (\Throwable $e) {
			echo 'catched exception: ' . $e->getMessage() . '<br>';
		}
	}
	
}


