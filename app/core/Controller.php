<?php

class Controller
{
	

	public function model($model){
	 	require_once '../app/model/'. $model . '.php';
	 	return new $model(); ## return as an object	
	}
	public function view($view, $data = []){
		
		require_once '../app/view/'. $view . '.php';
		// require_once 'footer.php';

	}
}