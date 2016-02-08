<?php
class County_model extends CI_Model
{

    //Function To Fetch Selected County Record
    function show_county_id($data)
    {
        $this->db->select('*');
        $this->db->from('county_table');
        $this->db->where('county_id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

// Function To Fetch All Counties Record
    function show_counties()
    {
        $this->db->order_by('county_name', 'asc');
        $query = $this->db->get('county_table');
        $query_result = $query->result();
        return $query_result;
    }

    function update_counties_id1($id, $data)
    {
        $this->db->where('county_id', $id);
        $this->db->update('county_table', $data);
    }

   


  

}
