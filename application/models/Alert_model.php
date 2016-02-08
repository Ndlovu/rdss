<?php
class Alert_model extends CI_Model
{
// Function To Fetch All diseases in the system
    function show_alerts()
    {
        $query = $this->db->get('alerts_table');
        $query_result = $query->result();
        return $query_result;
    }


//This function updates the contents of the data held in the disease table
    function update_alert($alert_id, $data)
    {
        $this->db->where('alert_id', $alert_id);
        $this->db->update('alerts_table', $data);
    }


    /*This function adds a commodity to the database*/
    function add_alert($alert = NULL)
    {
        $this->db->insert('alerts_table', $alert);
        return $this->db->insert_id();
    }



    




    
    


    

    
}
?>

