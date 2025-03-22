<?php

class Usermodel extends CI_Model {

    function registeruser($userdetail) {
        
        
        if ($this->db->insert("users", $userdetail)) {
            $this->session->set_userdata("user", $userdetail["username"]);
            return $userdetail["username"];
            
        } else {
            return false;
        }
    }

    function userlogin() {
        $q = $this->db->where("username", $this->input->post("login-username"))->where("password", md5($this->input->post("login-password")))->get("users");
        if ($q->num_rows() > 0) {
            foreach($q->result() as $row){
                $this->session->set_userdata("user", $row->username);
                return $row->username;
            }
            
        } else {
            return false;
        }
    }

    function getusercredentials(){
        $username = $this->session->userdata("user");
        $query = $this->db->query("select * from users where username='$username'");
        if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $data["fullname"] = $row->fullname;
                $data["userid"] = $row->id;
                $data["username"] = $row->username;
                $data["email"] = $row->email;
                return $data;
            }
        }

    }
    function fetchSingleProduct($id){
        $username = $this->session->userdata("user");
        $query = $this->db->query("select * from products where id='$id' limit 1");
        if($query->num_rows() > 0){
            return $query;
        }else{
            return false;
        }

    }
    function getcategoriesforhomedisplay() {
        $q = $this->db->query("select * from product_categories where cat_orientation='Main' and deleted='f'");
        if ($q->num_rows() > 0) {
            return $q;
           
        }else{
            return false;
        }
    }
    function fetchFeaturedProducts() {
        $q = $this->db->query("select * from products where main_category='21' and deleted='f'");
        if ($q->num_rows() > 0) {
            return $q;
           
        }else{
            return false;
        }
    }
    function getClassForDisplay() {
        $q = $this->db->query("select * from product_categories where cat_orientation='Class' and deleted='f'");
        if ($q->num_rows() > 0) {
            return $q;
           
        }else{
            return false;
        }
    }
    function fetchCatgProducts($id) {
        if($id== "" || $id == null){
            return false;

        }else{
            $q = $this->db->query("select * from products where main_category=$id and deleted='f' order by id desc");
            if ($q->num_rows() > 0) {
                return $q;
               
            }else{
                return false;
            }
        }
       
    }
    function getnewStock() {
        $q = $this->db->query("select * from products where deleted='f' order by id desc");
        if ($q->num_rows() > 0) {
            return $q;
           
        }else{
            return false;
        }
    }
    function fetchAllTagsForProduct() {
        $alltagsQuery = $this->db->query("select * from product_categories where cat_orientation='Tag' and deleted='f'");
        if ($alltagsQuery->num_rows() > 0) {
            return $alltagsQuery;
           
        }else{
            return false;
        }
    }
    function addToCart(){
        //product id to be inputed
        $data["product_id"] = $this->uri->segment(3);

        //determinant of add or product quantity update
        $resultkey = false;

        //Id of cart in which it's quantity is to be updated
        $updateQtyId;

        //current quantity of product to be updates
        $currentQty ;

        //check if quantity is selected
        if($this->input->post("qty") == NULL){
            $data["qty"] = 1;
        }else{
            $data["qty"] = $this->input->post("qty");
        }

        //get user's username
        $username = $this->session->userdata("user");

        $userQuery = $this->db->query("select * from users where username='$username'");
        if($userQuery->num_rows() > 0){
            foreach($userQuery->result() as $row){
            //get user id
            $data["user_id"] = $row->id;
                    
            }

            $user_id = $data["user_id"];
            $product_id = $data["product_id"];

            //get all product_id present in cart that is unique to the user
            $allProductIdQuery = $this->db->query("select * from cart where user_id='$user_id'");

            if($allProductIdQuery->num_rows() > 0){
                foreach($allProductIdQuery->result() as $row){
                    //if the product_id is found, break the loop and set the result key to true
                    if($row->product_id == $product_id){
                        $resultkey = true;
                        $updateQtyId = $row->id;
                        $currentQty = $row->qty;
                        break;

                    }
                    
                }

            }

            if(!$resultkey){
                if ($this->db->insert("cart", $data)){
                    return "Product added to cart";
        
                }else{
                        return false;
                }

            }else{
                $currentQty++;
                if ($this->db->query("update cart set qty=$currentQty where id=$updateQtyId")) {
                    return true;

                }else{
                    return false;
                }

                
            }
       
        }else{
            return false;

        }

    }
    function fetchThisUserCart(){
        $username = $this->session->userdata("user");
        if($this->session->userdata("user") == ""){
            return false;
        }else{
            
        $userQuery = $this->db->query("select * from users where username='$username'");
        $user_id = 0;
        if($userQuery->num_rows() > 0){
            foreach($userQuery->result() as $row){
                $user_id = $row->id;
                
            }
        }

        $query = $this->db->query("select * from cart where user_id=$user_id and deleted='f' order by id desc");
        if($query->num_rows() > 0){
            return $query;
        }else{
            return false;
        }
        }
        
    }
    function deleteThisCartProduct($id){
        $username = $this->session->userdata("user");
        if($this->session->userdata("user") == ""){
            return false;
        }else{
            
        if (!$this->db->query("update cart set deleted='t' where id=$id")){
            return false;
        }
    }
}

    function fetchThisProductCatg($id){
        if($id == "None"){
            return false;
        }else{
            $q = $this->db->query("select * from product_categories where id=$id and deleted='f' limit 1");
            $category = "";
            if ($q->num_rows() > 0) {
                foreach($q->result() as $catg){
                    $category = $catg->cat_name;
    
                }
                return $category;
               
            }else{
                return "";
            }
        }
       
    }


}