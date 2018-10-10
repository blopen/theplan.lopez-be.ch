<?php
Class Folder_M extends CI_Model {

	function get($bucket, $key) {

		$s3Client = new Aws\S3\S3Client(['version' => 'latest', 'region' => 'us-west-2', 'credentials' => ['key' => aws_access_key_id, 'secret' => aws_secret_access_key, ], 'http' => ['connect_timeout' => 25]]);
		/*if in subfolder*/
		if (strlen($key) > 1) {
			$objects['info'] = $s3Client -> listObjects(array('Bucket' => $bucket, "Prefix" => $key, "Delimiter" => "/"), array('return_prefixes' => FALSE, ));
			if ($objects['info']["CommonPrefixes"][0]["Prefix"] == NULL) {
				return;
			} else {

				foreach ($objects['info']["CommonPrefixes"] as $key => $value) {

					$viewData['map'][$key]["key"] = $objects['info']["CommonPrefixes"][$key]["Prefix"];
					$ding = explode('/', $objects['info']["CommonPrefixes"][$key]["Prefix"]);
					$num = count($ding);
					$viewData['map'][$key]["name"] = $ding[$num - 2];
				}
				/*get header information form the files*/
				for ($i = 0; $i < count($viewData['map']); $i++) {
					$result = $s3Client -> headObject(array('Bucket' => $bucket, 'Key' => $viewData['map'][$i]["key"]));
					$viewData['map'][$i]["type"] = "folder";
					$viewData['map'][$i]["Size"] = $result['ContentLength'];
					$viewData['map'][$i]["hSize"] = byte_format($result['ContentLength']);
					$viewData['map'][$i]["LastModified"] = $result['LastModified'];
					$viewData['map'][$i]["date"] = date('d. m. Y',strtotime($result['LastModified']));
				}
			}
		} else {
			$objects['info'] = $s3Client -> listObjects(array('Bucket' => $bucket, "Delimiter" => '/'), array('return_prefixes' => FALSE, ));

			if ($objects['info']["CommonPrefixes"][0]["Prefix"] == NULL) {
				return;
			} else {

				foreach ($objects['info']["CommonPrefixes"] as $key => $value) {

					$viewData['map'][$key]["key"] = $objects['info']["CommonPrefixes"][$key]["Prefix"];
					$viewData['map'][$key]["name"] = implode('', explode('/', $objects['info']["CommonPrefixes"][$key]["Prefix"]));

				}
				/*get header information form the files*/
				for ($i = 0; $i < count($viewData['map']); $i++) {
					$result = $s3Client -> headObject(array('Bucket' => $bucket, 'Key' => $viewData['map'][$i]["key"]));
					$viewData['map'][$i]["type"] = "folder";
					$viewData['map'][$i]["Size"] = $result['ContentLength'];
					$viewData['map'][$i]["hSize"] = byte_format($result['ContentLength']);
					$viewData['map'][$i]["LastModified"] = $result['LastModified'];
					$viewData['map'][$i]["date"] = date('d. m. Y',strtotime($result['LastModified']));
				}

			}

		}
		/*isntanzing empty folder for Json*/
		if(empty($viewData['map'])){
					unset($viewData['map']);
					$viewData['map'][0]["name"] = '';
					$viewData['map'][0]["type"] = "folder";
					$viewData['map'][0]["Size"] = '';
					$viewData['map'][0]["LastModified"] ='';
					$viewData['map'][0]["date"] = '';
		}							
		return $viewData;
	}

	function make($bucket, $key, $body) {
		$s3Client = new Aws\S3\S3Client(['version' => 'latest', 'region' => 'us-west-2', 'credentials' => ['key' => aws_access_key_id, 'secret' => aws_secret_access_key, ], 'http' => ['connect_timeout' => 25]]);

		$put = $s3Client -> putObject(array('Bucket' => $bucket, // Defines name of Bucket
		'Key' => $key, //Defines Folder name
		'Body' => $body));

	}

	function delete($bucket, $key) {
		$s3Client = new Aws\S3\S3Client(['version' => 'latest', 'region' => 'us-west-2', 'credentials' => ['key' => aws_access_key_id, 'secret' => aws_secret_access_key, ], 'http' => ['connect_timeout' => 25]]);

		$s3Client -> deleteMatchingObjects($bucket, $key);
		
		
		

	}

}
?>
