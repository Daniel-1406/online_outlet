<?php

class Exhortationmodel extends CI_Model {

    function viewexhortations(){

        $query = $this->db->query("select * from exhortations where deleted='f'");
        $head = "<th>Title</th><th>Author</th><th>Date</th><th>Summary</th><th>Overlay Photo</th><th>Information</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_hidden = "";
            $form_delete2 = "<a class='btn btn-danger btn-sm' href='deletethisexhortation/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_edit2 = "<a class='btn btn-info btn-sm' href='editthisexhortation/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_close = form_close();
            $body.="<tr><td>$row->title</td><td>$row->author</td><td>$row->date</td><td>$row->summary</td><td><img style='width:100%;' height='150px' src='" . base_url() . "/images/" . $row->photo. "' alt=$row->title /><td>$row->info</td><td>" . $form_open . "" . $form_edit2 . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete2 . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["exhortation_count"]=$x;
        return $db_content;

    }

    function updateexhortation($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("exhortations", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Exhortation Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Exhortation...
                </div>';
        }
    }


    function editexhortation($id) {
        $query = $this->db->query("select * from exhortations where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["title"] = $row->title;
            $db_content["summary"] = $row->summary;
            $db_content["date"] = $row->date;
            $db_content["info"] = $row->info;
            $db_content["photo"] = $row->photo;
            $db_content["author"] = $row->author;
            $db_content["id"] = $id;
        }



        return $db_content;
    }

    function deleteexhortation($id) {
        if ($this->db->query("update exhortations set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Exhortation Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Exhortation, Try Again ...
                </div>';
        }
    }

    function updatexhortation($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("exhortation", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Exhortation Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Exhortation...
                </div>';
        }
    }
   





}

?>
