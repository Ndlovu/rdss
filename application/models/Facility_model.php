<?php
class Facility_model extends CI_Model
{

      function show_facilities()
    { //  $this->db->limit($limit, $start);
        $query = $this->db->get('facility_table');
        $query_result = $query->result();
        return $query_result;
    }
    // Function To Fetch All facilities in the system database
    function show_facility($limit, $start)
    {   $this->db->limit($limit, $start);
        $query = $this->db->get('facility_table');
        $query_result = $query->result();
        return $query_result;
    }

    // This function fetches the id of a particular facility object from the database
    function get_facility_id_given_name($facility_name)
    {
        $this->db->select('facility_id');
        $this->db->from('facility_table');
        $this->db->where('facility_name', $facility_name);
        $query = $this->db->get();
        // $result = $query->row()->facility_id;
        // return $result;
        if ($query->num_rows()>0) {
             $result = $query->row()->facility_id;
        return $result;
        }else{
            return null;
        }
    }
        
    //This function updates the contents of the data held in the facility table
    function update_facility($facility_id, $data)
    {
        $this->db->where('facility_id', $facility_id);
        $this->db->update('facility_table', $data);
    }


    /*This function adds a facility to the database*/
    function add_facility($facility = NULL)
    {
        $this->db->insert('facility_table', $facility);
        return $this->db->insert_id();
    }


   function get_facility_mfl_codes($facility_name){
        $this->db->select('mfl_code');
        $this->db->from('facility_table');
        $this->db->where('facility_name', $facility_name);
        $query = $this->db->get();
        $result = $query->row()->mfl_code;
        return $result;
        //var_dump($result);
    }


        function get_facility_id_given_code($mfl_code)
    {
        $this->db->select('facility_id');
        $this->db->from('facility_table');
        $this->db->where('mfl_code', $mfl_code);
        $query = $this->db->get();
        // $result = $query->row()->facility_id;
        // return $result;
        if ($query->num_rows()>0) {
             $result = $query->row()->facility_id;
        return $result;
        }else{
            return null;
        }
    }

     function get_facility_name_given_code($mfl_code)
    {
        $this->db->select('facility_name');
        $this->db->from('facility_table');
        $this->db->where('mfl_code', $mfl_code);
        $query = $this->db->get();
        // $result = $query->row()->facility_id;
        // return $result;
        if ($query->num_rows()>0) {
             $result = $query->row()->facility_name;
        return $result;
        }else{
            return null;
        }
    }




    

    
}
?>

