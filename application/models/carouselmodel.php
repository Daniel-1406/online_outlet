<?php

class Carouselmodel extends CI_Model {

    function uploadcarousel($imagename) {

        $field["header"] = $this->input->post("header");
        $field["photo"] = $imagename;
        $field["text"] = $this->input->post("text");


        if ($this->db->insert("carousels", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Carousel Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Uploading Carousel ...
                </div>';
        }
    }
    function uploadleader($imagename) {

        $field["name"] = $this->input->post("name");
        $field["photo"] = $imagename;
        $field["position"] = $this->input->post("position");


        if ($this->db->insert("leaders", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Leader Information Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Uploading Leader Information ...
                </div>';
        }
    }

    function viewcarousel() {
        $query = $this->db->query("select * from carousels where deleted='f' ");
        $head = "<th>Photo</th><th>Text</th><th>Header</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='editthiscarousel/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethiscarousel/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td><img style='width:100%;' height='150px' src='" . base_url() . "/images/" . $row->photo . "' alt=$row->header /></td><td>" . $row->text . "</td><td>" . $row->header . "</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["carouselcount"] = $x;
        return $db_content;
    }
    function viewleaders() {
        $query = $this->db->query("select * from leaders where deleted='f' ");
        $head = "<th>Photo</th><th>Full Name</th><th>Position</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='editthisleader/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethisleader/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td><img style='width:100%;' height='150px' src='" . base_url() . "/images/" . $row->photo . "' alt=$row->name /></td><td>" . $row->name . "</td><td>" . $row->position . "</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["carouselcount"] = $x;
        return $db_content;
    }

    function deletecarousel($id) {
        if ($this->db->query("update carousels set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Carousel Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Carousel, Try Again ...
                </div>';
        }
    }
    function deleteleader($id) {
        if ($this->db->query("update leaders set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Leader Information Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Leader Information, Try Again ...
                </div>';
        }
    }

    function editcarousel($id) {
        $query = $this->db->query("select * from carousels where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["photo"] = $row->photo;
            $db_content["text"] = $row->text;
            $db_content["header"] = $row->header;
            $db_content["id"] = $id;
        }



        return $db_content;
    }
    
    function editleader($id) {
        $query = $this->db->query("select * from leaders where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["photo"] = $row->photo;
            $db_content["name"] = $row->name;
            $db_content["position"] = $row->position;
            $db_content["id"] = $id;
        }



        return $db_content;
    }


    function updatecarousel($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("carousels", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Carousel Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Carousel...
                </div>';
        }
    }
    function updateleader($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("leaders", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Leader Information Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Leader Information...
                </div>';
        }
    }


    



}

?>
