<?php
// require '../vendor\madcodez\youtube-downloader\src\YTDownloader.php';

class Ytmp4 extends Controller
{

	public function index(){
    $this->view('master/header');
		$this->view('youtube/ytmp4');
    $this->view('master/footer');
	}

public function ytconvert(){
  $ytlink = $_REQUEST['yturl'];
  $yt = new YTDownloader();

  $links = $yt->getDownloadLinks($ytlink);
  
print_r($links);
  
  set_time_limit(0); 
  $file = @file_get_contents($links);
  file_put_contents('aa.webm', $file);

}


} 