<?php

class Storeinfo extends CI_Model {

    function getStoreInfo()
    {
        $qq = $this->db->get("about");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["id"] = $row->id;
            $record["name"] = $row->name;
            $record["information"] = $row->information;
            $record["address"] = $row->address;
            $record["telephone"] = $row->telephone;
            $record["twitter"] = $row->twitter;
            $record["facebook"] = $row->facebook;
            $record["instagram"] = $row->instagram;
            $record["youtube"] = $row->youtube;
            $record["googlemap"] = $row->googlemap;
            $record["email"] = $row->email;
            $record["logo"] = $row->logo;
        } else {
            $record["id"] = "";
            $record["name"] = "";
            $record["information"] = "";
            $record["address"] = "";
            $record["telephone"] = "";
            $record["twitter"] = "";
            $record["facebook"] = "";
            $record["instagram"] = "";
            $record["youtube"] = "";
            $record["googlemap"] = "";
            $record["email"] ="";
            $record["logo"] ="";
          
        }
        return $record;
    }


    function updateStoreInfo($storeInfo = array())
    {
        $this->db->where('id', $storeInfo['id']);
        if ($this->db->update("about", $storeInfo)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Store Information Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Store Information...
                </div>';
        }
    }

}

?>
