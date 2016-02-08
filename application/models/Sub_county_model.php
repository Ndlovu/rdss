<?php
class Sub_county_model extends CI_Model
{

    //Function To Fetch Selected Sub-county Record
    function show_sub_county_id($data)
    {
        $this->db->select('*');
        $this->db->from('sub_county_table');
        $this->db->where('sub_county_id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

// Function To Fetch All Sub-ounties Record
    function show_sub_counties()
    {
        $this->db->order_by('sub_county_name', 'asc');
        $query = $this->db->get('sub_county_table');
        $query_result = $query->result();
        return $query_result;
    }

    function update_sub_counties_id1($id, $data)
    {
        $this->db->where('sub_county_id', $id);
        $this->db->update('sub_county_table', $data);
    }

   


  

}
