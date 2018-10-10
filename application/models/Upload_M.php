<?php
Class Upload_M extends CI_Model {
/*funktion for upload data on local server*/
	function do_upload($input) {
		$config = array('upload_path' => FCPATH . "/files/", 'allowed_types' => ".flac|vmdk|dmg|xml|avi|css|js|avi|mov|m4a|m4a|gif|jpg|png|jpeg|pdf|mp3|mp4|txt|zip|doc|xlsm|xlsx|db|html|php|docx|ppt|pptx", 'max_size' => 0);
		$this -> load -> library('upload', $config);
		/*If success uploades local upload S3*/
		if ($this -> upload -> do_upload()) {
			$data = $this -> upload -> data();
			return $this -> uploads3($data);

		} else {
			/*false jsonobject muss zurück kommen*/
			$error = array('error' => $this -> upload -> display_errors());
			$uploadStatus['status'] = $error;
			return json_encode($uploadStatus);
		}
	}

	function uploads3($data) {
		$session_data = $this -> session -> userdata('logged_in');
		$lastbuckets = $this -> session -> userdata('lastbucket');
		$input = $data['file_name'];
		$maxSize = $data['file_size'];
		$delimiter = '/';
		$mybucket = "usr" . $session_data['id'] . $delimiter . $lastbuckets . $delimiter . $input . $delimiter;

		$s3Client = new Aws\S3\S3Client(['version' => 'latest', 'region' => 'us-west-2', 'credentials' => ['key' => aws_access_key_id, 'secret' => aws_secret_access_key, ], 'http' => ['connect_timeout' => 2500000]]);
		/*If in supfolder*/
		if (strlen($lastbuckets) > 1) {
			
				$key = $lastbuckets . $input;
				$bucket = "usr" . $session_data['id'];
				$put = $s3Client -> putObject(array('Bucket' => $bucket, // Defines name of Bucket
				'Key' => $key, //Defines Folder name
				'ACL' => 'public-read', 'Body' => fopen(FCPATH . '/files/' . $input, 'rb')));

			

		} else {
			
				$put = $s3Client -> putObject(array('Bucket' => "usr" . $session_data['id'], // Defines name of Bucket
				'Key' => $input, //Defines Folder name
				'ACL' => 'public-read', 'Body' => fopen(FCPATH . '/files/' . $input, 'rb')));
			

		}
		unlink(FCPATH . "/files/" . $input);
		$uploadStatus['status'] = 'good';
		return json_encode($uploadStatus);
	}

}
?>
