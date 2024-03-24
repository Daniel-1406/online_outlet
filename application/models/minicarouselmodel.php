<?php

class Minicarouselmodel extends CI_Model {

    function uploadcarousel($imagename) {

        $field["text"] = $this->input->post("text");
        $field["numbering"] = $this->input->post("numbering");
        $field["photo"] = $imagename;
        $field["label"] = $this->input->post("label");

        if ($this->db->insert("mini_carousel", $field)) {
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

    function viewminicarousel() {
        $query = $this->db->query("select * from mini_carousel where deleted='f'");
        $head = "<th>Text</th><th>Label</th><th>Numbering</th><th>Photo</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;
        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='editthisminicarousel/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethisminicarousel/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->text</td><td>$row->label</td><td>$row->numbering</td><td><img style='width:100%;' height='150px' src='" . base_url() . "/images/" . $row->photo. "' alt=$row->text /></td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["minicarousel_count"] = $x;
        return $db_content;
    }
    function deleteminicarousel($id) {
        if ($this->db->query("update mini_carousel set deleted='t' where id=$id")) {
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

    function editminicarousel($id) {
        $query = $this->db->query("select * from mini_carousel where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["text"] = $row->text;
            $db_content["label"] = $row->label;
            $db_content["numbering"] = $row->numbering;
            $db_content["photo"] = $row->photo;
            $db_content["id"] = $id;
        }



        return $db_content;
    }

    function updateminicarousel($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("mini_carousel", $name)) {
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



}

?>
