<?php

class Quicklinkmodel extends CI_Model {

    function uploadquicklink($val) {
        if ($this->db->insert("quicklinks", $val)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Parish Information Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Couldn\'t Upload Parish Information ...
                </div>';
        }
    }

    function viewquicklinks() {
        $query = $this->db->query("select * from quicklinks where deleted='f' ");
        $head = "<th>Parish</th><th>Address</th><th>Phone</th><th>Pastor In Charge</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='editthisquicklink/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethisquicklink/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>" . $row->parish . "</td><td>" . $row->address . "</td><td>" . $row->phone . "</td><td>" . $row->pic . "</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }   
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["quicklink_count"] = $x;
        return $db_content;
    }

    function deletequicklink($id) {
        if ($this->db->query("update quicklinks set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Parish Information Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Parish Information, Try Again ...
                </div>';
        }
    }

    function editquicklink($id) {
        $query = $this->db->query("select * from quicklinks where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["parish"] = $row->parish;
            $db_content["address"] = $row->address;
            $db_content["phone"] = $row->phone;
            $db_content["pic"] = $row->pic;
            $db_content["id"] = $id;
        }



        return $db_content;
    }

    function updatequicklink($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("quicklinks", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Parish Information Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Parsh Information...
                </div>';
        }
    }



}

?>
