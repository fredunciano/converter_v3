<?php
/**
 * 
 */
class Ytmp3 extends Controller
{
	
	public function index(){

		// $yt = $this->ytconvert();
        $this->view('master/header');
		    $this->view('youtube/ytmp3');
        $this->view('master/footer');
	}

public function ytconvert(){
	
	if(isset($_REQUEST['yturl'])) {
       $id = strip_tags($_REQUEST['yturl']);
       $id = trim($id);

   	}

   	if(!empty($id)) {


       	if (strpos($id, 'youtube.com') !== FALSE){
           	$query = parse_url($id, PHP_URL_QUERY);
           	parse_str($query, $params);
           	$id = $params['v'];
       	}

       	if (strpos($id, 'youtu.be') !== FALSE){
           	$ex = explode('/',$id);
           	$id = end($ex);
       	}
      
       	$arrContextOptions=array(
           	"ssl"=>array(
           		"verify_peer"=>false,
           		"verify_peer_name"=>false,
           	),
       	);
       	$url_to_curl = 'https://www.youtube.com/oembed?url=http%3A//youtube.com/watch%3Fv%3D'.$id.'&format=json';
       	$ytresponse = file_get_contents($url_to_curl, false, stream_context_create($arrContextOptions));

       	$ytinfo = array();
       	$ytinfo = json_decode($ytresponse,true);
       	$type = $ytinfo['type'];


       	if(isset($type)){


            // FETCHING DATA FROM SERVER
         
     
           $jsonData = file_get_contents("http://api.youtube6download.top/api/?id=$id",false,stream_context_create($arrContextOptions));
           $links = json_decode($jsonData,TRUE);
           $ytinfo['download'] = $links;
           $ytinfo['id'] =$id;


       	} else {
           $error = "Error Found!";
           $ytinfo['error'] = $error;
       	}
       	echo json_encode($ytinfo);
   	}


}



} 