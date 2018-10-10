<?php
Class Object_M extends CI_Model {

	function renameObject($bucket, $torenameValues, $myrenameValues) {
		$lastbuckets = $this -> session -> userdata('lastbucket');
		$s3Client = new Aws\S3\S3Client(['version' => 'latest', 'region' => 'us-west-2', 'credentials' => ['key' => aws_access_key_id, 'secret' => aws_secret_access_key, ], 'http' => ['connect_timeout' => 2500]]);
		$objects = $s3Client -> getIterator('ListObjects', array('Bucket' => $bucket, 'Prefix' => $torenameValues, ), array('return_prefixes' => TRUE, ));
		$delemiter = '/';
		
		foreach ($objects as $object) {
			// Tow method for renaming in root or subfolder
			if(strlen($lastbuckets) > 1){
				//in Subfolder must the string cuted by the input values of renaming
				/*gleichnamige order werden noch komprimiert nicht gut*/
				$lengforloop = strlen($torenameValues)+1;
				$check =  substr($object['Key'], 0,$lengforloop);
				if ($check == $torenameValues.$delemiter || $check == $torenameValues) {
				$torename = $bucket . $delemiter . $object['Key'];
				if($object['Key'] == $torenameValues.$delemiter){
				$inrename = $bucket . $delemiter . $myrenameValues.$delemiter;
				}
				elseif( $object['Key'] == $torenameValues){
				$inrename = $bucket . $delemiter . $myrenameValues;	
				}
				else{
					$rest = strlen($object['Key'])-strlen($torenameValues.$delemiter);
					$attach = substr($object['Key'],-$rest);
					$inrename = $bucket . $delemiter . $myrenameValues.$delemiter.$attach;
				}
				$lange=strlen($inrename);
				if(substr($inrename,-2)=='//')
					{
						$inrename = substr($inrename,0,$lange-1);
					}
			
				$torename . '<br>' . $inrename . '<br>';
				$s3Client -> registerStreamWrapper();

				
				rename('s3://' . $torename, 's3://' . $inrename);
				}
				
			}else{
				
				$check = explode($delemiter, $object['Key']);
				
			if ($check[0] == $torenameValues) {
				$torename = $bucket . $delemiter . $object['Key'];
				$inrename = $bucket . $delemiter . $myrenameValues . strstr($object['Key'], '/');
				echo $torename . '<br>' . $inrename . '<br>';
				$s3Client -> registerStreamWrapper();

				rename('s3://' . $torename, 's3://' . $inrename);
			}
				
				
			}

		}

	}

}
?>
