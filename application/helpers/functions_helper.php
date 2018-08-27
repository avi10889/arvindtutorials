<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/////check logged admin//////
function chk_logged_admin()
{
	if(isset($_SESSION['gn_admin_uid']) && !empty($_SESSION['gn_admin_uid'])) return true;
	else 
	{
		redirect(ADMINCP.'/login');
		die();
	}
}

function print_r_custom ($val)
{
	echo '<pre>';
	print_r($val);
	echo '</pre>';
}

function get_alphabet($no,$casing = 'lower')
{
	$alpha = '';
	$array_az = array(0=>'',1=>'a',2=>'b',3=>'c',4=>'d',5=>'e',6=>'f',7=>'g',8=>'h',9=>'i',10=>'j',11=>'k',12=>'l',13=>'m',14=>'n',15=>'o',16=>'p',17=>'q',18=>'r',19=>'s',20=>'t',21=>'u',22=>'v',23=>'w',24=>'x',25=>'y',26=>'z');
	return ($casing=='upper') ? strtoupper($array_az[$no]): $array_az[$no];
}

// Function to get the client ip address
    function get_client_ip_server()
    {
        $ipaddress = '';
        if($_SERVER)
        {
            if(isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $ipaddress = 'UNKNOWN';

            return $ipaddress;
        }
        else
        {
            if (!empty(getenv('HTTP_CLIENT_IP')))
                $ipaddress = getenv('HTTP_CLIENT_IP');
            else if(!empty(getenv('HTTP_X_FORWARDED_FOR')))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            else if(!empty(getenv('HTTP_X_FORWARDED')))
                $ipaddress = getenv('HTTP_X_FORWARDED');
            else if(!empty(getenv('HTTP_FORWARDED_FOR')))
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            else if(!empty(getenv('HTTP_FORWARDED')))
                $ipaddress = getenv('HTTP_FORWARDED');
            else if(!empty(getenv('REMOTE_ADDR')))
                $ipaddress = getenv('REMOTE_ADDR');
            else
                $ipaddress = 'UNKNOWN';

            return $ipaddress;
        }

    }
    
   function get_user_agent()
    {
    $CI =& get_instance();
     $CI->load->library('user_agent'); // load library 
    	//$this->load->library('user_agent');

        if ($CI->agent->is_browser())
        {
            $agent = $CI->agent->browser().' '.$CI->agent->version();
        }
        elseif ($CI->agent->is_robot())
        {
            $agent = $CI->agent->robot();
        }
        elseif ($CI->agent->is_mobile())
        {
            $agent = $CI->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        //echo $agent;

        //echo $this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)
        return array(
            'browser' => $agent,
            'platform'  => $CI->agent->platform()
        );
    }
    
?>