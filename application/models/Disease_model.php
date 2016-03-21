<?php
class Disease_model extends CI_Model
{
    // Function To Fetch All diseases in the system
    function show_diseases()
    {
        $query = $this->db->get('disease_table');
        $query_result = $query->result();
        return $query_result;
    }

    // This function fetches the id of a particular disease object from the database
    function get_disease_id_given_name($disease_name)
    {
        $this->db->select('disease_id');
        $this->db->from('disease_table');
        $this->db->where('disease_name', $disease_name);
        $query = $this->db->get();
        $result = $query->row()->disease_id;
        return $result;
    }


    //This function updates the contents of the data held in the disease table
    function update_disease($disease_id, $data)
    {
        $this->db->where('disease_id', $disease_id);
        $this->db->update('disease_table', $data);
    }


    /*This function adds a disease to the database*/
    function add_disease($disease = NULL)
    {
        $this->db->insert('disease_table', $disease);
        return $this->db->insert_id();
    }



    




    
    


    

    
}
?>

