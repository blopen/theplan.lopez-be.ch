<?php
Class Download_M extends CI_Model {

	function download($bucket, $folder) {
		/*Instanz s3client for download*/
		$s3Client = new Aws\S3\S3Client(['version' => 'latest', 'region' => 'us-west-2', 'credentials' => ['key' => aws_access_key_id, 'secret' => aws_secret_access_key, ], 'http' => ['connect_timeout' => 2500]]);
		$url = $s3Client -> getObjectUrl($bucket, $folder);
		$basename = basename($url);
		$filename = $url;

		/*get file Information*/
		
		if(exif_imagetype($filename)>0){
		$mime = ($mime = getimagesize($filename)) ? $mime['mime'] : $mime;
		// $size = filesize($filename);
		$fp = fopen($filename, "rb");
		}else{
			$mime = ($mime = filesize($filename)) ? $mime['mime'] : $mime;
		$fp = fopen($filename, "rb");
		}
		
		/*Ohne das works
		$size = filesize($filename);
		var_dump($mime);
		die;
		if (!($mime && $fp)) {
		Error.
		return;
		}*/
		
		/*set download header information*/
		header("Content-type: " . $mime);
		header("Content-Disposition: attachment; filename=" . $basename);
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		fpassthru($fp);
		
		/*NOTE: Possible header injection via $basename
		header("Content-Length: " . $size);
		readfile($fp);
		var_dump($url);
		if($url != NULL){*/

	}

}
?>
