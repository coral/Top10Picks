<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Startcoral extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct()
	{
	    parent::__construct();
	}
	
	public function index()
	{
		$ext['js'] = array('http://code.jquery.com/jquery-1.9.1.min.js','http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js', '/js/app.js');
		$ext['css'] = array('http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css', '/css/my.css');
		$this->load->view('header',$ext);
		$this->load->view('index');
		$this->load->view('search');
		$this->load->view('footer');
	}
	
	public function search($lat,$long,$activity,$station)
	{
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
