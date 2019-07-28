<?php

class Convertppt extends Controller
{

	public function index(){
		$this->view('master/header');
		$this->view('file_converter/convert_ppt');
    	$this->view('master/footer');
	}

	public function uploadfile(){
		print_r($_FILES);
		$inputFileTmp = $_FILES['upload_file']['tmp_name'];
	    $inputFileType = $_FILES['upload_file']['type'];
	    $inputFileName = $_FILES['upload_file']['name'];

		$target_dir = "uploads/";
		$data = '';
		if($_FILES['upload_file']['size'] > 0){
			if($inputFileType == 'application/vnd.openxmlformats-officedocument.presentationml.presentation'){
				move_uploaded_file($inputFileTmp,$target_dir.$inputFileName);
				$data = '/'.$target_dir.$inputFileName;
				$this->sendjob($data);
			}else{
				echo "Please choose powerpoint file only";
				die();
			}
		}else{
			echo "File is Corrupted";
			die();
		}
		
		

	}

	function sendjob(){
		$file_pointer = "uploads/samplepptx.pptx";
		if (file_exists($file_pointer))  
{ 
    echo "The file $file_pointer exists"; 
} 
else 
{ 
    echo "The file $file_pointer does 
                             not exists"; 
} 
		

		$endpoint = "https://sandbox.zamzar.com/v1/jobs";
$apiKey = "e71957575fc586431cfa9c439522014271a4edb6";
$file_pointer = "uploads/samplepptx.pptx";
$targetFormat = "png";

$postData = array(
  "source_file" => $file_pointer,
  "target_format" => $targetFormat
);

$ch = curl_init(); // Init curl
curl_setopt($ch, CURLOPT_URL, $endpoint); // API endpoint
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string
curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ":"); // Set the API key as the basic auth username
$body = curl_exec($ch);
curl_close($ch);

$response = json_decode($body, true);

echo "Response:\n---------\n";
print_r($response);
	}

	public function convert(){

		$jobID = sendjob();
		$endpoint = "https://sandbox.zamzar.com/v1/jobs/$jobID";
		$apiKey = "d8d838692fceb7124eb9062ea4cbcdb6c13a3344";

		$ch = curl_init(); // Init curl
		curl_setopt($ch, CURLOPT_URL, $endpoint); // API endpoint
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as a string 
		curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ":"); // Set the API key as the basic auth username
		$body = curl_exec($ch);
		curl_close($ch);

		$job = json_decode($body, true);

		$target_files = $job['target_files'];

		$cc= 0;
		foreach ($target_files as $key => $value) {

			$fileID = $value['id'];
			$localFilename = "Converted".$cc.".jpeg";
			$endpoint = "https://sandbox.zamzar.com/v1/files/$fileID/content";
			$apiKey = "d8d838692fceb7124eb9062ea4cbcdb6c13a3344";

			$ch = curl_init(); // Init curl
			curl_setopt($ch, CURLOPT_URL, $endpoint); // API endpoint
			curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ":"); // Set the API key as the basic auth username
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

			$fh = fopen($localFilename, "wb");
			curl_setopt($ch, CURLOPT_FILE, $fh);

			$body = curl_exec($ch);
			curl_close($ch);

			echo "File downloaded\n";
			$cc++;		
		}
	}

	

} 

