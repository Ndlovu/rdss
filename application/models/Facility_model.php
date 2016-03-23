<?php
class Facility_model extends CI_Model
{
    // Function To Fetch All facilities in the system database
    function show_facilities($limit, $start)
    {   $this->db->limit($limit, $start);
        $query = $this->db->get('facility_table');
        $query_result = $query->result();
        return $query_result;
    }


     



     /* $sql ="SELECT facility_id as fid, (SELECT parent_id FROM facility_table WHERE facility_id = fid) as sub_id, (SELECT parent_id FROM sub_county_table WHERE sub_county_id = sub_id) as cid,(SELECT county_name FROM county_table WHERE county_id = cid) as c_name FROM alerts_table";*/

    /*  function get_department_list($limit, $start)
    {
        $sql = 'select var_dept_name, var_emp_name from tbl_dept, tbl_emp where tbl_dept.int_hod = tbl_emp.int_id order by var_dept_name limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }*/     



    // This function fetches the id of a particular facility object from the database
    function get_facility_id_given_name($facility_name)
    {
        $this->db->select('facility_id');
        $this->db->from('facility_table');
        $this->db->where('facility_name', $facility_name);
        $query = $this->db->get();
        $result = $query->row()->facility_id;
        return $result;
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



    

    
}
?>

