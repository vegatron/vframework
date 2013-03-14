<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


function check_login()
{
	$CI =& get_instance();
	
    if (!$CI->ion_auth->logged_in())
    {
        redirect('auth/login');
    }
    else
    {
    	//load the user, so its available in every page, that requires login ofcourse
		$CI->load->vars( array(  'user' =>  $CI->ion_auth->user()->row() ) );
    }
    
}

/************************************************************************************************************/

function get_user_id()
{
	$CI =& get_instance();
    $user = $CI->ion_auth->user()->row(); 
	return $user->id;
}

/************************************************************************************************************/

function is_admin()
{
	$CI = &get_instance();
	return $CI->general_model->user_in_group('admin');
}

/************************************************************************************************************/

function in_group($group_name)
{
	$CI = &get_instance();
	return $CI->general_model->user_in_group(strtolower( $group_name ));
}

/************************************************************************************************************/
//2013.03.10

function set_user_group($user_id,$group_id)
{
	$CI = &get_instance();


	$CI->db->where('id', $user_id);

	$CI->db->update('users', Array('group_id' => $group_id));
}

/************************************************************************************************************/

function objectToArray($d)
{
	if (is_object($d)) {
		// Gets the properties of the given object
		// with get_object_vars function
		$d = get_object_vars($d);
	}

	if (is_array($d)) {
		/*
		* Return array converted to object
		* Using __FUNCTION__ (Magic constant)
		* for recursive call
		*/
		return array_map(__FUNCTION__, $d);
	}
	else {
		// Return array
		return $d;
	}
}

/************************************************************************************************************/

function translate_activity($active,$feminine = false)
{
	switch ($active)
	{
	   case 0:
			$result = 'Inactive';
		 break;
	   case 1:
			$result = 'Active';
		 break;
	   default:
			$result = 'Unspecified';
	}

	if ($feminine)
	{
		$result += ''; // تاء مربوطة
	}

	return $result;
}

/************************************************************************************************************/

/**
 * Header redirect with delay
 *
 * @access   public
 * @param    string    the URL
 * @param    int    time in seconds to delay the redirect
 * @return    string
 */

function my_redirect($uri = '',$time=3 )
{

	if ( ! preg_match('#^https?://#i', $uri))
	{
		$uri = site_url($uri);
	}

	header("Refresh:$time;url=".$uri);

	return;
}

/************************************************************************************************************/
//returns xxxxxxx 
function RandNumber($e)
{
 	 for($i=0;$i<$e;$i++){
	 $rand =  $rand .  rand(0, 9);  
	 }
	 return $rand;
}

/************************************************************************************************************/

	/******************** FROM session helper *********************/

    function config( $field = 'id' )
    {
        $CI =& get_instance();
		$CI->load->model("general_model");
        $settings = $CI->general_model->get_settings();
        
        return $settings->$field;
    }

    /************************************************************************************************************/

    
if ( ! function_exists('vlang'))
{
    function vlang($line, $variables=array())
    {
        $CI =& get_instance();
        $line = $CI->lang->line($line);
        return @vsprintf($line, $variables) !== FALSE ? vsprintf($line, $variables) : 'vLang:error';                    
    }

}   

/************************************************************************************************************/ 