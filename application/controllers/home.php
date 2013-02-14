<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
		
		$this->load->model('general_model');

		//this will pass the $active_tab var to all the functions, no need to declare it at every function
		$this->load->vars( array(	'active_tab'=>'#home' ,
									'footer_data' => '',
									'user' =>  $this->ion_auth->user()->row()
									) );

	}

	function index()
	{

	
		$data['htitle'] = APP_TITLE_LONG;
		$data['active_page'] = 'home';
		$data['main_content'] = 'home_view';
		$this->load->view('includes/template',$data);
	}
}

