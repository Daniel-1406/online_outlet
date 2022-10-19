<?php

class gallerymodel extends CI_Model {

    function insert($imagename) {

        $field["title"] = $this->input->post("title");
        $field["photo"] = $imagename;
        $field["numbering"] = $this->input->post("numbering");


        if ($this->db->insert("gallery", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Photo Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Uploading photo information ...
                </div>';
        }
    }

    function viewgallery() {
        $query = $this->db->query("select * from gallery where deleted='f' ");
        $head = "<th>Photo</th><th>Title</th><th>Order Number</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' onclick='' href='editthisgallery/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethisgallery/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td><img style='width:100%;' height='150px' src='" . base_url() . "/images/" . $row->photo . "' alt=$row->title /></td><td>$row->title</td><td>" . $row->numbering . "</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["photosno"] = $x;
        return $db_content;
    }

    function deletegallery($id) {
        if ($this->db->query("update gallery set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Photo Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting photo, Try Again ...
                </div>';
        }
    }

    function editgallery($id) {
        $query = $this->db->query("select * from gallery where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["title"] = $row->title;
            $db_content["photo"] = $row->photo;
            $db_content["numbering"] = $row->numbering;
            $db_content["id"] = $id;
        }



        return $db_content;
    }

    function getitems() {
        $query = $this->db->query("select * from gallery where deleted='f' order by numbering");
        $photos = "";
        $x = 1;
        foreach ($query->result() as $row) {
            if ($x % 4 == 0) {
                $photos.="<li class='one_quarter first'><a class='nlb' data-lightbox-gallery='gallery1' href='../../images/$row->photo' title='$row->title'><img class='borderedbox' src = '../../images/" . $row->photo . "' alt='$row->title '></a></li>";
            } else {
                $photos.="<li class='one_quarter'><a class='nlb' data-lightbox-gallery='gallery1' href='../../images/$row->photo' title='$row->title'><img class='borderedbox' src='../../images/$row->photo' alt='$row->title '></a></li>";
            }

            $x++;
        }
        return $photos;
    }

}

?>
