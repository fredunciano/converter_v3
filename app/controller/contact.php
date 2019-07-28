<?php

class Contact extends Controller
{
	public function index(){
		$pagename = 'this is contact Page';
  
		$this->view('home/contact');
	}
	
}