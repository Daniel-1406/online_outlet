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
            return "<span style='color:green;margin-bottom: 80px;padding-left: 20px;padding-top: 10px;font-size: 23px;'>Carousel created successfully!</span>";
        } else {
            return "<span style='color:red;margin-bottom: 80px;padding-left: 20px;padding-top: 10px;font-size: 23px;'>Error!,Unable to create carousel</span>";
        }
    }

    function displaycarousel() {
        $q = $this->db->query("select * from carousel where deleted='f' order by orientation");
        $carousel = "";
        $slide = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $res) {
                $carousel.="<figure id = 'slide-" . $res->carouselid . "'><a class = 'view' href = '#'><img src = './images/" . $res->photo . "' alt = ''></a>
            <figcaption>
            <h2>" . $res->heading . "</h2>
            <p>" . $res->description . "</p>
            <p class = 'right'><a href = '" . $res->url . "'>Continue Reading &raquo;
            </a></p>
            </figcaption>
            </figure>";
                $slide.="<li><a href='#slide-" . $res->carouselid . "'>$res->name</a></li>
";
                $content["carousel"] = $carousel;
                $content["slide"] = $slide;
            }
        }
        return $content;
    }

    function getcarosel() {

        $query = $this->db->query("select * from carousel where deleted='f'");
        $head = "<th>Topic</th><th>Photo</th><th>Heading</th><th>Description</th><th>Url</th><th>Orientation</th><th>EDIT</th><th>DELETE</th>";
        $body = "";

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_hidden = ""; //form_input('del',set_value($row->id,$row->id));
            $form_delete = anchor(base_url('index.php/welcome/deletethiscarousel/' . $row->id), form_button('button', 'Delete'));
            $form_edit = anchor(base_url('index.php/welcome/editthiscarousel/' . $row->id), form_button('button', 'Edit'));
            $form_close = form_close();
            $body.="<tr><td>" . $row->surname . "</td><td>" . $row->firstname . "</td><td>" . $row->gender . "</td><td>" . $row->regtime . "</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        return $db_content;
    }

    function viewcarosel() {
        $query = $this->db->query("select * from carousel where deleted='f' order by orientation");
        $head = "<th>Carousel name</th><th>Photo</th><th>Heading</th><th>Description</th><th>Url</th><th>Orientation</th><th>Status</th><th>EDIT</th><th>DELETE</th>";
        $body = "";

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_hidden = ""; //form_input('del',set_value($row->id,$row->id));
            $form_delete = anchor(base_url('index.php/welcome/deletethisstudent/' . $row->carouselid), form_button('button', 'Delete'));
            $form_edit = anchor(base_url('index.php/welcome/editthisstudent/' . $row->carouselid), form_button('button', 'Edit'));
            $form_close = form_close();
            $body.="<tr><td>$row->name</td><td><img height='6' src='./images/" . $row->photo . " alt=''/></td><td>" . $row->heading . "</td><td>" . $row->description . "</td><td>$row->url</td><td>$row->orientation</td><td>$row->status</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        return $db_content;
    }

}