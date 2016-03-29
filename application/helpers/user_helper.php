<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function is_logged_in()
{
    $CI = &get_instance ();
    $user_data = $CI->session->all_userdata ();
    return isset ($user_data ['user_id']);
}


function sub_counties_in_county($county_id){
    $CI = get_instance();
    $CI->db->where('parent_id', $county_id);
    $sub_county =$CI->db->get('sub_county_table');
    return $sub_county->result();
   


}
?>