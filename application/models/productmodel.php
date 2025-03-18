<?php

class Productmodel extends CI_Model {

    function uploadproduct($imagename) {

        $field["pr_name"] = $this->input->post("pr_name");
        $field["photo"] = $imagename;
        $field["pr_info"] = $this->input->post("pr_info");
        $field["pr_sell_price"] = $this->input->post("pr_sell_price");
        $field["pr_slash_price"] = $this->input->post("pr_slash_price");
        $field["pr_desc"] = $this->input->post("pr_desc");
        $field["main_category"] = $this->input->post("main_category");
        $field["class_category"] = $this->input->post("class_category");
        $checkedValues = $this->input->post("tags");

        $field["tag_category"] = json_encode($checkedValues);


        if ($this->db->insert("products", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Product Item Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Uploading Product Item ...
                </div>';
        }
    }
    function getmaincategories() {
        $q = $this->db->query("select * from product_categories where cat_orientation='Main' and deleted='f'");
        $maincategories = "<option value='None'>None</option>";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $maincategories.="<option value='" . $r->id . "'>" . $r->cat_name . "</option>";
            }
        }
        return $maincategories;
    }
    function getclasscategories() {
        $q = $this->db->query("select * from product_categories where cat_orientation='Class' and deleted='f'");
        $maincategories = "<option value='None'>None</option>";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $maincategories.="<option value='" . $r->id . "'>" . $r->cat_name . "</option>";
            }
        }
        return $maincategories;
    }
    function gettags() {
        $q = $this->db->query("select * from product_categories where cat_orientation='Tag' and deleted='f'");
        $tags="";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $tags.="<div class='custom-control custom-checkbox'>
                                                <input class='custom-control-input' name='tags[]' type='checkbox' id='".$r->cat_name."' value='".$r->id."'>
                                                <label for='".$r->cat_name."' class='custom-control-label'>".$r->cat_name."</label>
                                            </div>";
            }
        }
        return $tags;
    }
   
    function viewproduct() {
        $query = $this->db->query("select * from products where deleted='f' ");
        $head = "<th>N/A</th><th>PRODUCT NAME</th><th>PHOTO</th><th>INFORMATION</th><th>SELLING PRICE</th><th>EDIT</th><th>DELETE</th>";
        $body = "";

        if($query->num_rows() > 0 ){
            $x=1;
            foreach ($query->result() as $row) {
                $form_open = form_open('welcome/delete');
                $form_edit = "<a class='btn btn-info btn-sm' href='editthisproduct/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
                $form_delete = "<a class='btn btn-danger btn-sm' href='deletethisproduct/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
                $form_close = form_close();
                $body.="<tr><td>$x</td><td>$row->pr_name</td><td><img style='width:100%;' height='150px' src='" . base_url() . "/images/" . $row->photo . "' alt=$row->pr_name /></td><td>" . $row->pr_info . "</td><td>" . $row->pr_sell_price . "</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
            $x++;
            }
            $db_content["head"] = $head;
            $db_content["body"] = $body;
            $db_content["productCount"] = $x;

        }

        
        return $db_content;
    }
    

    function deleteproduct($id) {
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
    
    function editproduct($id) {
        $query = $this->db->query("select * from products where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["pr_name"] = $row->pr_name;
            $db_content["photo"] = $row->photo;
            $db_content["pr_info"] = $row->pr_info;
            $db_content["pr_sell_price"] = $row->pr_sell_price;
            $db_content["pr_slash_price"] = $row->pr_slash_price;
            $db_content["pr_desc"] = $row->pr_desc;
            $db_content["main_category"] = $row->main_category;
            $db_content["class_category"] = $row->class_category;
            $db_content["tag_category"] = $row->tag_category;
            $db_content["id"] = $id;
            $db_content["tags"]= "";



            $tags_string = $db_content["tag_category"];
            $tags_string = trim($tags_string, '[]');
            $tags_string = str_replace('"', '', $tags_string);
            $tags_array = explode(',', $tags_string);
            $tags_array = array_map('trim', $tags_array);
            $arraycount = count($tags_array);

            $alltagsQuery = $this->db->query("select * from product_categories where cat_orientation='Tag' and deleted='f'");

            if ($alltagsQuery->num_rows() > 0) {
               
                foreach ($alltagsQuery->result() as $r) {
                    for($i=0; $i < $arraycount ; $i++){
                        if($tags_array[$i] != $r->id && $i == $arraycount-1){
                            $db_content["tags"].="<div class='custom-control custom-checkbox'>
                            <input class='custom-control-input' name='tags[]' type='checkbox' id='".$r->cat_name."' value='".$r->id."'>
                            <label for='".$r->cat_name."' class='custom-control-label'>".$r->cat_name."</label>
                        </div>";
                        }elseif($tags_array[$i] == $r->id){
                            $db_content["tags"].="<div class='custom-control custom-checkbox'>
                            <input class='custom-control-input' name='tags[]' type='checkbox' id='".$r->cat_name."' value='".$r->id."' checked>
                            <label for='".$r->cat_name."' class='custom-control-label'>".$r->cat_name."</label>
                        </div>";
                        break;
                        }
                        

                    }

                   
                }
            }
        }



        return $db_content;
    }

    function maincategoryforupdate() {
        $q = $this->db->query("select * from product_categories where cat_orientation='Main' and deleted='f'");
        $maincategory = array();
        //$maincategory["Main"]="Main";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $maincategory[$r->id] = $r->cat_name;
            }
        }
        return $maincategory;
    }
    function classcategoryforupdate() {
        $q = $this->db->query("select * from product_categories where cat_orientation='Class' and deleted='f'");
        $classcategory = array();
        $classcategory["None"]="None";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $classcategory[$r->id] = $r->cat_name;
            }
        }
        return $classcategory;
    }

    
    

    function updateproduct($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("products", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Product Item Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Product Item...
                </div>';
        }
    }
    

    



}

?>
