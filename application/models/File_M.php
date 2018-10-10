<?php
Class File_M extends CI_Model {

	function get($bucket, $key) {

		$s3Client = new Aws\S3\S3Client(['version' => 'latest', 'region' => 'us-west-2', 'credentials' => ['key' => aws_access_key_id, 'secret' => aws_secret_access_key, ], 'http' => ['connect_timeout' => 25]]);
		/*if in subfolder*/
		if (strlen($key) > 1) {
			$objects['info'] = $s3Client -> listObjects(array('Bucket' => $bucket, "Prefix" => $key, "Delimiter" => '/'), array('return_prefixes' => FALSE, ));
			/*get name and content of request*/
			for ($i = 0; $i < count($objects['info']["Contents"]); $i++) {
				$viewData['map'][$i]["key"] = $objects['info']["Contents"][$i]["Key"];
				$temp = explode('/', $objects['info']["Contents"][$i]["Key"]);
				$viewData['map'][$i]["name"] = end($temp);

			}
			/*get header information form the files*/
			for ($i = 0; $i < count($viewData['map']); $i++) {
				$result = $s3Client -> headObject(array('Bucket' => $bucket, 'Key' => $viewData['map'][$i]["key"]));
				$extension = new SplFileInfo($viewData['map'][$i]["name"]);
				$viewData['map'][$i]["type"] = $extension -> getExtension();
				$viewData['map'][$i]["Size"] = $result['ContentLength'];
				$viewData['map'][$i]["hSize"] = byte_format($result['ContentLength']);
				$viewData['map'][$i]["LastModified"] = $result['LastModified'];
				$viewData['map'][$i]["date"] = date('d. m. Y',strtotime($result['LastModified']));
			}
		} else {
			$objects['info'] = $s3Client -> listObjects(array('Bucket' => $bucket, "Delimiter" => '/'), array('return_prefixes' => FALSE, ));
			/*get name and content of request*/
			foreach ($objects['info']["Contents"] as $key => $value) {
				$viewData['map'][$key]["key"] = $objects['info']["Contents"][$key]["Key"];
				$viewData['map'][$key]["name"] = $objects['info']["Contents"][$key]["Key"];
				$viewData['map'][$key]["LastModified"] = $objects['info']["Contents"][$key]["LastModified"];
				$viewData['map'][$key]["Size"] = $objects['info']["Contents"][$key]["Size"];
				
			}
			/*get header information form the files*/
			for ($i = 0; $i < count($viewData['map']); $i++) {
				$result = $s3Client -> headObject(array('Bucket' => $bucket, 'Key' => $viewData['map'][$i]["key"]));
				$extension = new SplFileInfo($viewData['map'][$i]["name"]);
				$viewData['map'][$i]["type"] = $extension -> getExtension();
				$viewData['map'][$i]["Size"] = $result['ContentLength'];
				$viewData['map'][$i]["hSize"] = byte_format($result['ContentLength']);
				$viewData['map'][$i]["LastModified"] = $result['LastModified'];
				$viewData['map'][$i]["date"] = date('d. m. Y',strtotime($result['LastModified']));

			}
		}
		return $viewData;
	}

	function getPreview($bucket, $key) {
		$s3Client = new Aws\S3\S3Client(['version' => 'latest', 'region' => 'us-west-2', 'credentials' => ['key' => aws_access_key_id, 'secret' => aws_secret_access_key, ], 'http' => ['connect_timeout' => 25]]);
		$cmd = $s3Client -> getCommand('GetObject', ['Bucket' => $bucket, 'Key' => $key]);
		$request = $s3Client -> createPresignedRequest($cmd, '+20 minutes');
		$presignedUrl = $request -> getUri();

		return urldecode($presignedUrl);
	}

}
?>
