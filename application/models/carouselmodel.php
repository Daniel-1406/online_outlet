<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Carouselmodel extends CI_Model {

    function insertcarousel($imagename) {

        $field["name"] = $this->input->post("name");
        $field["photo"] = $imagename;
        $field["heading"] = $this->input->post("heading");
        $field["description"] = $this->input->post("description");
        $field["url"] = $this->input->post("url");
        $field["orientation"] = $this->input->post("orientation");
        $field["status"] = $this->input->post("status");

        if ($this->db->insert("carousel", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Carousel Created Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Creating Carousel ...
                </div>';
        }
    }

    function displaycarousel() {
        $q = $this->db->query("select * from carousel where deleted='f' order by orientation");
        $carousel = "";
        $slide = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $res) {
                $majorcolor = $this->welcomemodel->getmajorcolor();
                $carousel.="<figure id = 'slide-" . $res->carouselid . "'><a class = 'view' href = '#'><img src = './images/" . $res->photo . "' alt = '' style='width:960px; height:350px;'></a>
            <figcaption>
            <h2>" . $res->heading . "</h2>
            <p>" . $res->description . "</p>
            <p class = 'right'><a href = '" . $res->url . "'>Continue Reading &raquo;
            </a></p>
            </figcaption>
            </figure>";
                $slide.="<li><a href='#slide-$res->carouselid' style='background-color:$majorcolor;' >$res->name</a></li>
";
                $content["carousel"] = $carousel;
                $content["slide"] = $slide;
            }
        }
        return $content;
    }

    function viewcarosel() {
        $query = $this->db->query("select * from carousel where deleted='f' order by orientation");
        $head = "<th>Carousel name</th><th>Photo</th><th>Heading</th><th>Description</th><th>Url</th><th>Orientation</th><th>Status</th><th>EDIT</th><th>DELETE</th>";
        $body = "";

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            //$form_hidden = ""; //form_input('del',set_value($row->id,$row->id));
            //$form_delete1 = anchor(base_url('index.php/welcome/deletethisstudent/' . $row->carouselid), form_button('button', 'Delete'));
            $form_edit = "<a class='btn btn-info btn-sm' href='editthiscarousel/$row->carouselid'><i class='fas fa-pencil-alt'></i>Edit </a>";
            //$form_edit1 = anchor(base_url('index.php/welcome/editthisstudent/' . $row->carouselid), form_button('button', 'Edit'));
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethiscarousel/$row->carouselid'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->name</td><td><img width='150px' height='150px' src='" . base_url() . "/images/" . $row->photo . "' alt='' /></td><td>" . $row->heading . "</td><td>" . $row->description . "</td><td>$row->url</td><td>$row->orientation</td><td>$row->status</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        return $db_content;
    }

    function deletecarousel($id) {
        if ($this->db->query("update carousel set deleted='t' where carouselid=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Facility Information Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting facility information ...
                </div>';
        }
    }

    function editcarousel($id) {
        $query = $this->db->query("select * from carousel where carouselid=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["name"] = $row->name;
            $db_content["photo"] = $row->photo;
            $db_content["heading"] = $row->heading;
            $db_content["description"] = $row->description;
            $db_content["url"] = $row->url;
            $db_content["orientation"] = $row->orientation;
            $db_content["status"] = $row->status;
            $db_content["carouselid"] = $id;
        }



        return $db_content;
    }

    function updatecarousel($name = array()) {
        $this->db->where('carouselid', $name['carouselid']);
        if ($this->db->update("carousel", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Carousel Information Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Carousel information ...
                </div>';
        }
    }

}