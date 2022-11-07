<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class facilitymodel extends CI_Model {

    function insertfacility($imagename) {

        $field["name"] = $this->input->post("name");
        $field["photo"] = $imagename;
        $field["description"] = $this->input->post("description");


        if ($this->db->insert("facility", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Facility Information Inserted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Inserting information ...
                </div>';
        }
    }

    

    function viewfacility() {
        $query = $this->db->query("select * from facility where deleted='f' ");
        $head = "<th>Facility name</th><th>Photo</th><th>Description</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='editthisfacility/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethisfacility/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->name</td><td><img style='width:100%;' height='150px' src='" . base_url() . "/images/" . $row->photo . "' alt=$row->name /></td><td>" . $row->description . "</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["facilityno"] = $x;
        return $db_content;
    }

    function deletefacility($id) {
        if ($this->db->query("update facility set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Facility Information Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error deleting information, Try again...
                </div>';
        }
    }
    function updatefacility($imagename) {

        $field["name"] = $this->input->post("name");
        $field["photo"] = $imagename;
        $field["description"] = $this->input->post("description");
        $field["id"] = $this->input->post("id");


        if ($this->db->replace("facility", $field, $field["id"])) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Facility Information Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating facility information ...
                </div>';
        }
    }

    function editfacility($id) {
        $query = $this->db->query("select * from facility where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["name"] = $row->name;
            $db_content["photo"] = $row->photo;
            $db_content["description"] = $row->description;
            $db_content["id"] = $id;
        }



        return $db_content;
    }
    function getfacilities(){
        $query=$this->db->query("select * from facility where deleted='f' limit 7");
        $data="";
        foreach($query->result() as $row){
            $data.="<li class='clear'><a href='index.php/academics/openwholefacility/$row->id'><img src='./images/$row->photo' style='width:80px; height:80px;' alt=''>$row->name</a></li>";
        }
        return $data;
    }

    function getwholefacility($id){
        $query=$this->db->query("select * from facility where id=$id");
        $data="";
        foreach($query->result() as $row){
            $data.="<h1>$row->name</h1>
            <img class='imgl borderedbox' style='height:200px; width:100%; padding:5px 10px 5px 10px;' src='" . base_url() . "/images/" . $row->photo . "' alt=''>
          <p>$row->description</p>
         ";

        }
        return $data;

    }
    function getotherfacilities($id){
        $query=$this->db->query("select * from facility where deleted='f' and not id=$id");
        $data="";
        foreach($query->result() as $row){
            $data.=" <li><a href='$row->id'>$row->name</a></li>";
        }
        return $data;
    }

}

?>
