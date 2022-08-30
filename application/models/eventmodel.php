<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Eventmodel extends CI_Model {

    function insertevent($imagename) {

        $field["name"] = $this->input->post("name");
        $field["photo"] = $imagename;
        $field["description"] = $this->input->post("description");
        $field["date"] = $this->input->post("date");


        if ($this->db->insert("event", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Event Information Inserted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Inserting event information,Try again!
                </div>';
        }
    }

    function viewevent() {
        $query = $this->db->query("select * from event where deleted='f' order by date");
        $head = "<th>Name</th><th>Photo</th><th>Date</th><th>Description</th><th>Edit</th><th>Delete</th>";
        $body = "";

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            //$form_hidden = ""; //form_input('del',set_value($row->id,$row->id));
            //$form_delete1 = anchor(base_url('index.php/welcome/deletethisstudent/' . $row->carouselid), form_button('button', 'Delete'));
            $form_edit = "<a class='btn btn-info btn-sm' href='editthisevent/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            //$form_edit1 = anchor(base_url('index.php/welcome/editthisstudent/' . $row->carouselid), form_button('button', 'Edit'));
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethisevent/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->name</td><td><img width='150px' height='150px' src='" . base_url() . "/images/" . $row->photo . "' alt='$row->name' /></td><td>" . $row->date . "</td><td>" . $row->description . "</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        return $db_content;
    }

    function deleteevent($id) {
        if ($this->db->query("update event set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Event Information Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error deleting event information,Try again!
                </div>';
        }
    }

    function editevent($id) {
        $query = $this->db->query("select * from event where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["name"] = $row->name;
            $db_content["photo"] = $row->photo;
            $db_content["date"] = $row->date;
            $db_content["description"] = $row->description;
            $db_content["id"] = $id;
        }
        return $db_content;
    }

    function updateevent($imagename) {

        $field["name"] = $this->input->post("name");
        $field["photo"] = $imagename;
        $field["description"] = $this->input->post("description");
        $field["date"] = $this->input->post("date");
        $field["id"] = $this->input->post("id");


        if ($this->db->replace("event", $field, $field["id"])) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Event Information Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating event information ...
                </div>';
        }
    }

}

?>
