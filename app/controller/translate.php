<?php

class Translate extends Controller
{

	public function index(){

		$this->view('home/translate');
	}
	public function sample(){
		$text="我的名字是阿丹，我来自菲律宾";
		$api = 'AIzaSyBHrgSDtByNjrwGdOWtUUxlmoxI1OcL9u0';
		$curl =  "https://translation.googleapis.com/language/translate/v2?target=tl&key=AIzaSyBHrgSDtByNjrwGdOWtUUxlmoxI1OcL9u0&q=".$text;



	$jsonData = file_get_contents($curl);
	print_r($jsonData);
	}
}