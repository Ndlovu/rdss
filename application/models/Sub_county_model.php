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
    function show_sub_county($limit, $start)
    {
        $this->db->order_by('sub_county_name', 'asc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('sub_county_table');

        $query_result = $query->result();
        return $query_result;
    }

      function show_sub_counties()
    {
        $this->db->order_by('sub_county_name', 'asc');
       // $this->db->limit($limit, $start);
        $query = $this->db->get('sub_county_table');

        $query_result = $query->result();
        return $query_result;
    }

    function update_sub_counties_id1($id, $data)
    {
        $this->db->where('sub_county_id', $id);
        $this->db->update('sub_county_table', $data);
    }
   
    

    function get_sub_county_id_given_name($sub_county_name)
    {
        $this->db->select('sub_county_id');
        $this->db->from('sub_county_table');
        $this->db->where('sub_county_name', $sub_county_name);
        $query = $this->db->get();
        if ($query->num_rows()>0) {
            $result = $query->row()->sub_county_id;
        return $result;
            
        }else{
            return null;
        }
        
    }

   
    function show_sub_county_by_county_id($county_id)
    {
        $this->db->select('*');
        $this->db->from('sub_county_table');
        $this->db->where('parent_id', $county_id);
        $query = $this->db->get();
        $query_result = $query->result();
        return $query_result;
     
    }

  

}
