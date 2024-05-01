<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('value_exists'))
{
    function value_exists($table,$col,$value,$id='',$id_value='')
    {
        $CI	=&	get_instance();
		$CI->load->database();
        $rowcount=0;
        
        if($id=='' && $id_value==''){
        $CI->db->select($col);
        $CI->db->from($table);
        $CI->db->where($col,$value);
		$CI->db->where('user_id',$CI->session->userdata('user_id'));
        $query=$CI->db->get();
        $rowcount = $query->num_rows();
        }else{
        $CI->db->select($col);
        $CI->db->from($table);
        $CI->db->where($col,$value);
		$CI->db->where('user_id',$CI->session->userdata('user_id'));
        $CI->db->where_not_in($id,$id_value);    
        $query=$CI->db->get();
        $rowcount = $query->num_rows();
        
        }
            
        if($rowcount>0){
        return true;
        }else{
        return false;
        }
        
    }  

        function value_exists2($table,$col,$value,$type,$type_value,$id='',$id_value='')
    {
        $CI =&  get_instance();
        $CI->load->database();
        $rowcount=0;
        
        if($id=='' && $id_value==''){
        $CI->db->select($col);
        $CI->db->from($table);
        $CI->db->where($col,$value);
		$CI->db->where('user_id',$CI->session->userdata('user_id'));
        $CI->db->where($type,$type_value); 
        $query=$CI->db->get();
        $rowcount = $query->num_rows();
        }else{
        $CI->db->select($col);
        $CI->db->from($table);
        $CI->db->where($col,$value);
        $CI->db->where($type,$type_value); 
		$CI->db->where('user_id',$CI->session->userdata('user_id'));
        $CI->db->where_not_in($id,$id_value);    
        $query=$CI->db->get();
        $rowcount = $query->num_rows();
        
        }
            
        if($rowcount>0){
        return true;
        }else{
        return false;
        }
        
    } 


}