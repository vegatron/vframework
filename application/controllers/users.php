<?php

class Users extends CI_Controller
{

	//constructor
	function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
		
		$user = $this->ion_auth->user()->row();
		$user->group_description = $this->general_model->get_group_description($user->group_id);

		//$this->load->model('operations_model');
		$this->load->vars( array('active_tab'=>'#users' ,
															'footer_data' => '',
															'user' =>  $user
															) );
	}

	/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/

	//users's index page
	function index()
	{
		if ( !$this->general_model->user_in_group('admin') )
		{
			show_error('You dont have permission to access this page.',403);
		}

		$this->load->library('grocery_CRUD');
		$crud = new grocery_CRUD();

		$crud->set_table('users');
		$crud->set_subject('Users');
		
		$crud->columns('first_name','last_name','username','group_desc','phone','active');
		$crud->fields('first_name','last_name','username','phone','active');

		$crud->add_action('view', $this->config->item('base_url').'images/view.png', 'users/view');
		
		if ( $this->general_model->user_in_group('admin') )
		{
			$crud->add_action('edit', $this->config->item('base_url').'images/edit.png', 'users/edit');
			$crud->add_action('delete', $this->config->item('base_url').'images/delete.png', 'users/delete');
		}
		
		$crud->callback_column('group_desc',array($this,'_callback_get_groupdesc'));
			
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		
		$data = objectToArray ($crud->render() );
		
		$data['htitle'] = 'Users';
		$data['active_page'] = 'users';
		$data['main_content'] = 'grid_view';
		$this->load->view('includes/template',$data);
	}
	
	/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/
	
	public function _callback_get_groupdesc($value, $row)
	{
		$user =  $this->ion_auth->user( $row->id )->row();
		return $this->general_model->get_group_description($user->group_id);
	}

	/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/

	function view($uid = 0)
	{

		$current_user_id = $this->session->userdata('user_id');
		
		if (empty ($uid ))
		{
			show_error( 'invalid user id' );
		}

		if ( !$this->general_model->user_in_group('admin') )
		{

			if ($uid != $current_user_id )
			{
				show_error('You dont have permission to access this page.',403);
			}
		}

		$this->load->model('general_model');
		
		$user =  $this->ion_auth->user( $uid )->row();
		$user->group_description = $this->general_model->get_group_description($user->group_id);
		$data =objectToArray($user);

		$data['active_title'] = translate_activity($user->active);

		$data['htitle'] = 'View user profile';
		$data['active_page'] = 'view_user';
		$data['main_content'] = 'users/view_user';

		$this->load->library('parser');
		$this->parser->parse('includes/template', $data);
	}

	/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/

	function add()
	{
		if ( !$this->general_model->user_in_group('admin') )
		{
			show_error('You dont have permission to access this page.',403);
		}
		
		$data['groups'] = $this->general_model->get_groups();
		
		$data['htitle'] = 'Add new user';
		$data['active_page'] = 'add_user';
		$data['main_content'] = 'users/add_user';
		$this->load->view('includes/template',$data);
	}

	/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/

	function edit($uid = 0)
	{
		$current_user_id = $this->session->userdata('user_id');
		
		if (empty($uid))
		{
			$uid = (int) $this->input->post('uid');
			
			if ( empty( $uid) )
			{
				show_error( 'Error' );
			}
		}
		
		if ( !$this->general_model->user_in_group('admin') )
		{
			if ($uid != $current_user_id)
			{
				show_error('You dont have permission to access this page.',403);
			}
		}

		//lets check if the user exists in the db
		$query = $this->db->query('SELECT username FROM users WHERE id = ?', Array($uid) );
		if ($query->num_rows() == 0)
		{
			show_error('المستخدم غير موجود!!!');
		}


		
		$data['user'] =  $this->ion_auth_model->user($uid)->row();

		$data['groups'] = $this->general_model->get_groups();
		
		$data['htitle'] = 'Edit user profile';
		$data['active_page'] = 'edit_user';
		$data['main_content'] = 'users/edit_user';
		$this->load->view('includes/template',$data);
	}

	/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/

	function delete($uid = 0)
	{
		if (empty( $uid) )
		{
			show_error('Error deleting user account');
		}

		if ( !$this->general_model->user_in_group('admin') )
		{
			show_error('You dont have permission to access this page.',403);
		}

		$query = $this->db->get_where('users',Array('id' => $uid),1);

		if ($query->num_rows() == 0)
		{
			show_error(' The user account doesnt exist in the database');
		}

		
		$data = $this->ion_auth->user($uid)->row_array();;

		$data['message'] = 'Are you sure that you want to delete the user: <strong>'. $data['first_name'] .' '.$data['last_name'].'</strong>';

		$data['action'] = 'users/save/delete_user';
		$data['return_url'] = 'users';

		$data['htitle'] = 'Delete user';
		$data['active_page'] = 'delete_user';
		$data['main_content'] = 'users/delete_user';
		$this->load->view('includes/template',$data);
	}

	/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/

	function my_account()
	{

		
		$data['htitle'] = 'My profile';
		$data['active_page'] = 'my_account';
		$data['main_content'] = 'users/my_account';
		$this->load->view('includes/template',$data);
	}

	/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/

	function change_password ()
	{

		$new_pass = $this->input->post('password');
		// confirm_new_pass : vega: confirm it here,and confirm it in the javascript for better security
		$new_pass_confirm = $this->input->post('password_confirm');

		if (empty($new_pass) OR ($new_pass != $new_pass_confirm))
		{
			show_error('An error occured while changing password');

		}

		$current_user_id =  $this->session->userdata('user_id');

		$data = array(
					'password' => $new_pass
					 );


		if ($this->ion_auth->update( $current_user_id, $data))//success
		{
			$data['message'] = 'Password changed successfully';
		}
		else
		{
			$data['message'] = 'Error! the password hasnt changed';
		}

		$data['htitle'] = 'change password';
		$data['active_page'] = 'settings_changePass';
		$data['main_content'] = 'message_view';
		$this->load->view('includes/template',$data);

		$this->load->helper('general');
		my_redirect('users/my_account' ,3);
	}

	/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*/

	function save()
	{
		$this->load->library('form_validation');
		$mode = $this->input->post('mode');

		switch ($mode)
		{
			case 'add_user':

				if ( !$this->general_model->user_in_group('admin') )
				{
					show_error('You dont have permission to access this page.',403);
				}

				if ($this->form_validation->run('users') == FALSE)
				{
					show_error('Error in the entered data:<br /><span style="color:#FF0000">'. validation_errors().'</span><hr />'
								.'Go back and edit the data');
				}
				else
				{//lets add the user

					$username		= $this->input->post('username');
					$password		= $this->input->post('password');
					$email 			= $this->input->post('email');
					$group_id		= $this->input->post('group_id');

					$additional_data = array(
											'first_name' 	=> $this->input->post('first_name'),
											'last_name' 	=> $this->input->post('last_name'),
											'phone'			=> $this->input->post('phone'),
											);


					if ( $this->ion_auth->register($username, $password, $email, $additional_data, $group_id) )//success
					{
						$data['message'] = 'User account added successfully';
					}
					else
					{
						$data['message'] = 'Error! failed to add user';
					}

					$data['htitle'] = 'Add new user';
					$data['active_page'] = 'add_user';
					$data['main_content'] = 'message_view';
					$this->load->view('includes/template',$data);

					$this->load->helper('general');
					my_redirect('users/' ,3);
				}

				break;

		//	*	*	*	*	*	*	*	*	*	*	*	*	*	*	*	*	*	*	*	*

			case 'edit_user':

				$uid = $this->input->post('uid');

			//if the logged user is the adming use the posted uid, else use the logged user's id
				if ( !$this->general_model->user_in_group('admin') )
				{
					$uid = $this->session->userdata('user_id'); // so he will be only able to edit himself only
					$current_group_id = $this->session->userdata('group_id'); // so he will be only able to edit himself only
				}

				$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[50]|alpha_numeric');
				//$this->form_validation->set_rules('password', 'كلمة المرور' , 'required|min_length[5]|max_length[50]');
				$this->form_validation->set_error_delimiters('<div class="warning ui-corner-all">', '</div>');

				if ($this->form_validation->run() == FALSE)
				{
					//call the edit function in this controller
					$this->edit( $uid );//reload the add user page
				}
				else
				{//lets add the user

					$user_data = array(
										'first_name' 	=> $this->input->post('first_name'),
										'last_name' 	=> $this->input->post('last_name'),
										'phone'			=> $this->input->post('phone'),
										'email'			=> $this->input->post('email'),
										'username'			=> $this->input->post('username'),
										'group_id'			=> $this->input->post('group_id')
										);
					$password = $this->input->post('password');

					//if password is posted change it

					if (!empty($password) and strlen($password) >= 5)
					{

						$user_data['password'] = $password;
					}

			//if the logged user is the not the admin set the group to the default
				if ( !$this->general_model->user_in_group('admin') )
				{
					$user_data['group_id'] = $current_group_id;
				}

					if ( $this->ion_auth->update($uid, $user_data) )//success
					{
						$data['message'] = 'User profile updated successfully';
					}
					else
					{
						$data['message'] = 'Error! couldnt update user profile';
					}

					$data['htitle'] = 'Edit user profile';
					$data['active_page'] = 'edit_user';
					$data['main_content'] = 'message_view';
					$this->load->view('includes/template',$data);

					$this->load->helper('general');
					my_redirect('users/view/'.$uid ,3);
				}

				break;

		//	*	*	*	*	*	*	*	*	*	*	*	*	*	*	*	*	*	*	*	*

			case 'delete':
				$uid = (int) $this->input->post('uid');

				if (empty ($uid ))
				{
					show_error( 'Error' );
				}

				if ( !$this->general_model->user_in_group('admin') )
				{
					$current_user_id = $this->session->userdata('user_id');
					if ( $uid != $current_user_id )
					{
						show_error('You dont have permission to access this page.',403);
					}
				}

				$this->ion_auth->delete_user($uid);

				$data['message'] = 'User account has been deleted';

				$data['htitle'] = 'Delete user';
				$data['active_page'] = 'delete_user';
				$data['main_content'] = 'message_view';
				$this->load->view('includes/template',$data);

				$this->load->helper('general');

				my_redirect('users',3);
				break;
		}
	}


}
