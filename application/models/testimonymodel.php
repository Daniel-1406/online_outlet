<?php

class Testimonymodel extends CI_Model {

    function gettestimonies(){

        $query = $this->db->query("select * from testimonies where deleted='f'");
        $head = "<th>Name</th><th>Testimony</th>th>picture</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_hidden = "";
            $form_delete2 = "<a class='btn btn-danger btn-sm' href='deletethistestimony/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_edit2 = "<a class='btn btn-info btn-sm' href='editthistestimony/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_close = form_close();
            $body.="<tr><td>" . $row->name . "</td><td>" . $row->testimony . "</td><td>" . $row->photo. "</td><td>" . $form_open . "" . $form_edit2 . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete2 . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["testimony_count"]=$x;
        return $db_content;

    }

    function uploadtestimony($imagename) {

        $field["name"] = $this->input->post("name");
        $field["photo"] = $imagename;
        $field["testimony"] = $this->input->post("testimony");


        if ($this->db->insert("testimonies", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Testimony Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Uploading Testimony ...
                </div>';
        }
    }
    function viewtestimonies() {
        $query = $this->db->query("select * from testimonies where deleted='f' ");
        $head = "<th>Name</th><th>Testimony</th><th>Photo</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='editthistestimony/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethistestimony/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>" . $row->name . "</td><td>" . $row->testimony . "</td><td><img style='width:100%;' height='150px' src='" . base_url() . "/images/" . $row->photo . "' alt=$row->name /></td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["testimonycount"] = $x;
        return $db_content;
    }

    function deletetestimony($id) {
        if ($this->db->query("update testimonies set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Testimony Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Testimony, Try Again ...
                </div>';
        }
    }

    function edittestimony($id) {
        $query = $this->db->query("select * from testimonies where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["name"] = $row->name;
            $db_content["testimony"] = $row->testimony;
            $db_content["photo"] = $row->photo;
            $db_content["id"] = $id;
        }



        return $db_content;
    }
    function updatetestimony($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("testimonies", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Testimony Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Testimony...
                </div>';
        }
    }


}

?>
