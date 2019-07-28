<?php
/**
 * 
 */
class Home extends Controller
{
	// protected $user;
	// public function __construct(){
	// 	$this->user = $this->model('User');
	// }
	// public function index($name = ''){
	// 	##referring to controller.php model() function 
	// 	$user = $this->model('User');  
	// 	$user->name = $name;

	// 	## home/index = home folder and index.php in view
	// 	$this->view('home/index', ['name' => $user->name]);    
	// }
	public function create($username = '', $email= ''){
		User::create([
			'name'=> $username,
			'email'	=> $email
		]);
	}
	public function index(){
		$str = 'index of home';
		$username = 'Uncianojhei';
		$this->view('master/header');
		$this->view('home/index',['str' => $str, 'username' => $username]);
		$this->view('master/footer');
	}


} 