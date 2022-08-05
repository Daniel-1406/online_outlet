<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class facilitymodel extends CI_Model {

    function insertfacility($imagename) {

        $field["name"] = $this->input->post("name");
        $field["photo"] = $imagename;
        $field["description"] = $this->input->post("description");


        if ($this->db->insert("facility", $field)) {
            return "<span style='color:green;margin-bottom: 80px;padding-left: 20px;padding-top: 10px;font-size: 23px;'>Facility Information created successfully!</span>";
        } else {
            return "<span style='color:red;margin-bottom: 80px;padding-left: 20px;padding-top: 10px;font-size: 23px;'>Error!,Unable to create facility Information</span>";
        }
    }

}
?>
