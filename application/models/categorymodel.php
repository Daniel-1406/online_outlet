<?php

class Categorymodel extends CI_Model {



    
    function uploadcategory() {
        if($this->input->post("child_orientation")=="none" || $this->input->post("child_orientation")==""){
            $orientation=$this->input->post("orientation");

        }else{
            $orientation=$this->input->post("child_orientation");

        }
        $data["cat_name"] = $this->input->post("cat_name");
        $data["cat_orientation"] = $this->input->post("orientation");
        $data["child_orientation"] = $orientation;
        
        if ($this->db->insert("product_categories", $data)) {
            return '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Category Item Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Uploading Cateory Item ...
                </div>';
        }
    }
    function viewcategories() {
        $q = $this->db->query("select * from product_categories where deleted='f'");
        $head = "<th>N/A</th><th>CATEGORY NAME</th><th>CATEGORY ORIENTATION</th><th>CHILD ORIENTATION</th><th>EDIT</th><th>DELETE</th>";

        $body = "";
        $cat_orienation= "";
        $table["head"] = "";
        $table["body"] = "";
        if ($q->num_rows() > 0) {
            $x=1;
            foreach ($q->result() as $res) {
                $form_open = form_open('welcome/delete');
                $form_delete = "<a class='btn btn-danger btn-sm' href='deletethiscategory/$res->id'><i class='fas fa-trash'> </i>Delete</a>";
                $form_edit = "<a class='btn btn-info btn-sm' href='editthiscategory/$res->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
                $form_close = form_close();

                if($res->child_orientation == 'Main' || 
                    $res->child_orientation == 'Class' ||
                    $res->child_orientation == 'Tag' || 
                    $res->child_orientation == 'Child'){
                        if($res->child_orientation == 'Main' || 
                        $res->child_orientation == 'Child'){
                            $childOrientation = $res->child_orientation." Category";

                        }else{
                            $childOrientation = $res->child_orientation;

                        }


                   
                }else{
                    $q2 = $this->db->query("select cat_name from product_categories where id = $res->child_orientation and deleted='f' limit 1");
                    if($q2->num_rows() > 0){
                        foreach($q2->result() as $orn){
                            $childOrientation = $orn->cat_name;

                        }
                    }else{
                        $childOrientation = "";
                    }

                }
                if($res->cat_orientation == 'Main'){
                    $cat_orienation = 'Main Category';
                }elseif($res->cat_orientation == 'Child'){
                    $cat_orienation = 'Child Category';

                }else{
                    $cat_orienation = $res->cat_orientation;
                }

                $body.="<tr><td>$x</td><td>$res->cat_name</td><td>$cat_orienation</td><td>$childOrientation</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td   ><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
                $x++;

            }
            $table["head"] = $head;
            $table["body"] = $body;
            $table["menu_count"] = $x;
        }
        return $table;
    }
    function getmaincategoryforupdate() {
        $q = $this->db->query("select * from product_categories where cat_orientation='Main' and deleted='f'");
        $maincategory = array();
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $maincategory[$r->id] = $r->cat_name;
            }
        }
        return $maincategory;
    }

    function getmaincategory() {
        $q = $this->db->query("select * from product_categories where cat_orientation='Main' and deleted='f'");
        //question here
        $maincategory = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $maincategory.="<option value='" . $r->id . "'>" . $r->cat_name . "</option>";
            }
        }
        return $maincategory;
    }

    function editcategory($id) {
        $query = $this->db->query("select * from product_categories where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["cat_name"] = $row->cat_name;
            $db_content["cat_orientation"] = $row->cat_orientation;
            $db_content["child_orientation"] = $row->child_orientation;
            $db_content["id"] = $id;
        }



        return $db_content;
    }
    function updatecategory($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("product_categories", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Category Item Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Category Item...
                </div>';
        }
    }
    function deletecategory($id) {
        if ($this->db->query("update product_categories set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Category Item Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Category Item, Try Again ...
                </div>';
        }
    }

}

?>
