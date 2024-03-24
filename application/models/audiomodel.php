<?php

class Audiomodel extends CI_Model {

    function uploadaudio($audioname) {

        $field["title"] = $this->input->post("title");
        $field["audioname"] = $audioname;


        if ($this->db->insert("audio", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Audio Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Uploading Video ...
                </div>';
        }
    }
    function viewaudio() {
        $query = $this->db->query("select * from audio where deleted='f' ");
        $head = "<th>Title</th><th>Audio</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='editthisaudio/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethisaudio/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->title</td><td><audio controls muted>
            <source src='" . base_url() . "/images/" . $row->audioname . "' type='audio/mpeg'>
          Your browser does not support the audio element.
          </audio></td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["audiocount"] = $x;
        return $db_content;
    }
    function deleteaudio($id) {
        if ($this->db->query("update audio set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Audio Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Audio, Try Again ...
                </div>';
        }
    }

    function editaudio($id) {
        $query = $this->db->query("select * from audio where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["title"] = $row->title;
            $db_content["audioname"] = $row->audioname;
            $db_content["id"] = $id;
        }



        return $db_content;
    }


    function updateaudio($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("audio", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Audio Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Audio...
                </div>';
        }
    }



}

?>
