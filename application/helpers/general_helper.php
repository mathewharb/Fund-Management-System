<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('timezone_list'))
{

 function timezone_list() {
  $zones_array = array();
  $timestamp = time();
  foreach(timezone_identifiers_list() as $key => $zone) {
    date_default_timezone_set($zone);
    $zones_array[$key]['ZONE'] = $zone;
    $zones_array[$key]['GMT'] = 'UTC/GMT ' . date('P', $timestamp);
  }
  return $zones_array;
}

}	

if ( ! function_exists('get_current_setting'))
{

 function get_current_setting($setting) {
   $CI =&	get_instance();
	 $CI->load->database();
   $CI->db->select('value');
   $CI->db->from('settings');
   $CI->db->where('settings',$setting);
   $query=$CI->db->get();
   $result=$query->row();
   return $result->value;
}

}

if ( ! function_exists('decimalPlace'))
{

function decimalPlace($number){
 return number_format((float)$number, 2);
}

}

if ( ! function_exists('getOld'))
{

function getOld($id,$id_value,$table){  
$CI =&  get_instance();
$CI->load->database();
$CI->db->select('*');
$CI->db->from($table);
$CI->db->where($id,$id_value);
$query=$CI->db->get();
$result=$query->row(); 
return $result;
}

}

if ( ! function_exists('checkPermission'))
{

function checkPermission($type){  
$CI =&  get_instance();  
if (!isset($_SERVER['HTTP_REFERER']) && $CI->session->userdata('user_type')==$type){ 
echo "<h2>Sorry, You have No Permission To Access This Page !</h2>";
echo "<a href=".site_url('Admin/dashboard').">Go Dashboard</a>";
exit;
}

}

}


  





