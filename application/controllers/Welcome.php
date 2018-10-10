<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		/*Dies ist ein Konstanter Pfad bei veröffendlichung ändern*/
		//require_once FCPATH.'vendor/autoload.php';
		// use Aws\S3\S3Client;
		
		// $sharedConfig = [
    		// 'region'  => 'us-west-2',
    		// 'version' => 'latest'
//     		
		// ];
// 		
		// $sdk = new Aws\Sdk($sharedConfig);
		/*Client initialisiren*/
		$s3Client = new Aws\S3\S3Client([
    		'version'     => 'latest',
    		'region'      => 'us-west-2',
    			'credentials' => [
        			'key'    => aws_access_key_id,
        			'secret' => aws_secret_access_key,
    		],
    			'http'    => [
        			'connect_timeout' => 5
    		]
		]);
    
		/*$map2 = $s3Client->listObjects(['Bucket' => 'usr2135']);
		$map = $s3Client->getIterator('ListObjects', array('Bucket' => 'usr2135'));
		var_dump($map, $map2);
		*/
		$this->load->view('welcome_message', $map);
	}
}
