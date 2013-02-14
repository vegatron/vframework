<?php

class General_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
	
	public function get_user_cats($user_id)
	{	
	$user_id = (int) $user_id;
	
		$sQuery ='SELECT c.id 
							FROM
							tm_categories c, tm_services s
							WHERE
							c.service_id = s.id
							AND
							s.user_id=' . $user_id;

		$query = $this->db->query( $sQuery );
		return $query->result_array();
		
	}
	
	
	public function user_in_group( $group )
	{
		if(empty( $group) )
		{
		
			show_error('specify group!!! ');
		}

		
		
			$query = $this->db->query('SELECT id FROM groups WHERE name = ? LIMIT 1', array( $group ));

			if ($query->num_rows() == 0)
			{
				show_error( 'error: group does not exist');
			}

			$result = $query->row_array();
			
			$group_id = $result['id'];
			
			$user_id = $this->session->userdata('user_id');
		
		//1st lets get the course ID
			$query = $this->db->query('SELECT group_id FROM users WHERE id = ? LIMIT 1', array( $user_id ));

			if ($query->num_rows() == 0)
			{
				show_error( 'error: user group_id does not exist');
			}

			$result = $query->row_array();
			
			$user_group_id = $result['group_id']; 
			
			if ( $user_group_id != $group_id )
			{
				return false;
			}	
			else
			{

				return true;
			}			
			
	
	}
	
	////
	
	public function get_groups()
	{
	
		$query = $this->db->get('groups');

		$i = 0;
		foreach ($query->result() as $row)
		{
			$result[$i]['id'] 		= $row->id;
			$result[$i]['name'] 	= $row->name;
			$result[$i]['description'] 	= $row->description;
			$i++;
		}
		
		return $result;
	}
	
	////
	
   public function get_group_description ($group_id)
	{

		$query = $this->db->get_where('groups', array('id' => $group_id), 1);

		$row = $query->row();

		if ($query->num_rows() == 1)
		{
			$result = $query->row_array();
			if (!empty($result['description'] ) )
			{
				return $result['description'];
			}
		}
		
		return '-';//group_id is unset ( 0 )  or group doesnt exist
	}


}