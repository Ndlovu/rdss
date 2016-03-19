<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function is_logged_in()
{
    $CI = &get_instance ();
    $user_data = $CI->session->all_userdata ();
    return isset ($user_data ['user_id']);
}

/*function sub_county_in_county($county_id){
	$CI = &get_instance();
	$CI->db->where('county_id',$county_id);
	$query = $CI ->db->get('sub_county_table');
	$result = $query ->result();
	return $result;


}*/


/*// Function To Fetch All Sub-ounties Record
    function show_sub_counties()
    {
        $this->db->order_by('sub_county_name', 'asc');
        $query = $this->db->get('sub_county_table');
        $query_result = $query->result();
        return $query_result;
    }*/

/* function get_name_given_id($county_id)
{
        $this->db->select('county_name');
        $this->db->from('alerts_table');
        $this->db->where('county_id', $county_id);
        $query = $this->db->get();
        $result = $query->row()->disease_id;
        return $result;
    }*/



  /*  //function that retrieves county name given the county id
    function get_county_name_given_county_id($county_id){
        $CI = &get_instance();
        $CI->db->select('county_name');
        $CI->db->from('county_table');
        $CI->db->where('county_id', $county_id);
        $query = $CI->db->get();
        $result = $query->row()->county_name;
        return $result;
    }
*/

// Function To Fetch All Sub-ounties Record
    function show_sub_counties()
    {
    	$CI = &get_instance();
        $CI->db->order_by('sub_county_name', 'asc');
        $query = $CI->db->get('sub_county_table');
        $query_result = $query->result();
        return $query_result;
    }

   function sub_county_in_county($county_id){
   		$CI = &get_instance();
     	$CI->db->select('*');
        $CI->db->from('sub_county_table');
        $CI->db->where('county_id', $county_id);
        $query = $CI->db->get();
        $result = $query->result();
        return $result;

 }
