<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		check_login();
	}

	function index()
	{

		$data['htitle'] = APP_TITLE_LONG;
		$data['active_page'] = 'home';
		$data['main_content'] = 'home_view';
		$this->load->view('includes/template',$data);
	}
}

