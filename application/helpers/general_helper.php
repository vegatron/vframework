<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*//
	
function objectToArray($d) {
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


//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*//

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


//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*//
//translate the student status
function translate_status($status)
{
	switch ($status)
	{
	   case 1:
			$result = 'مستجد';
		 break;

	   case 2:
		   $result = 'متخرج';
		 break;

	   case 3:
		 $result = 'منقول';
	   break;

	  case 4 :
			$result = 'مفصول';
	  break;

	  default:
			$result = 'غير محدد';
	}

	return $result;
}

//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*//
function translate_activity($active,$feminine = false)
{
	switch ($active)
	{
	   case 0:
			$result = 'غير مفعل';
		 break;
	   case 1:
			$result = 'مفعل';
		 break;
	   default:
			$result = 'غير محدد';
	}

	if ($feminine)
	{
		$result += 'ة'; // تاء مربوطة
	}

	return $result;
}


//returns xxxxxxx 
function RandNumber($e)
{
 	 for($i=0;$i<$e;$i++){
	 $rand =  $rand .  rand(0, 9);  
	 }
	 return $rand;
}