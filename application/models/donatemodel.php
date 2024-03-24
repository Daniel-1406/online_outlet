<?php

class Donatemodel extends CI_Model {

    function getdonateitems()
    {
        $qq = $this->db->get("donate");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["photo"] = $row->photo;
            $record["heading"] = $row->heading;
            $record["information"] = $row->information;
            $record["button_info"] = $row->button_info;
           
        } else {
            $record["photo"] = "";
            $record["heading"] = "";
            $record["information"] = "";
            $record["button_info"] = "";
           
        }
        return $record;
    }
    function updatedonateitems($data)
    {
        $this->db->query("truncate donate");
        $this->db->insert("donate", $data);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Donate Items Updated Successfully ...
                </div>';
    }
   
   


}

?>
