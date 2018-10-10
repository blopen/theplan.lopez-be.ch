<?php
Class Profile_M extends CI_Model {
	/*funktion for upload data on local server*/
	function do_upload($input) {
		$config = array('upload_path' => "./usrimg/", 'allowed_types' => "gif|jpg|png|jpeg|pdf", 'overwrite' => TRUE, 'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		'max_height' => "2400", 'max_width' => "4024");
		$this -> load -> library('upload', $config);

		if ($this -> upload -> do_upload($input)) {
			$data = array('upload_data' => $this -> upload -> data());
			foreach ($data as $dataElement)/* aus dem 3-Dimensionalen $data wird ein 2-Dimensionaler $dataElement */
			{
				if ($dataElement['file_name'] != "") {/* wenn "Hauptdarsteller" nicht Nichts ist... */

					$session_data = $this -> session -> userdata('logged_in');
					$lastbuckets = $this -> session -> userdata('lastbucket');
					$this -> load -> model('User_M');
					echo $this -> User_M -> updateUserImage($dataElement['file_name'], $session_data['id']);

				}
			}
		} else {
			echo $this -> upload -> display_errors();

		}
	}

}
?>
