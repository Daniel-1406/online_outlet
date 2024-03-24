<?php

class Footerbackg extends CI_Model {

    function updatefooterbg($data)
    {
        $this->db->query("truncate footer_bg");
        $this->db->insert("footer_bg", $data);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Footer Background Updated Successfully ...
                </div>';
    }

function getfooterbg()
    {
        $qq = $this->db->get("footer_bg");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["photo"] = $row->photo;
           
        } else {
            $record["photo"] = "";
           
        }
        return $record;
    }

}

?>
