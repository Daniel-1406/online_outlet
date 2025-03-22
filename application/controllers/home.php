<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        $data = $this->storeinfo->getstoreinfo();
        $data["menu"] = $this->menumodel->getmainmenufordisplay();
        $data["allTags"] = $this->usermodel->fetchAllTagsForProduct();
        $data["mainCategoriesDisplay"]= $this->usermodel->getcategoriesforhomedisplay();
        $data["classDisplay"]= $this->usermodel->getClassForDisplay();
        $data["newStockProducts"]= $this->usermodel->getnewStock();
        $data["featuredProducts"]= $this->usermodel->fetchFeaturedProducts();
        $data["cart"]= $this->usermodel->fetchThisUserCart();
       $this->load->view('display/index',$data);
    }
    public function loaddefaultpage() {
        $data = $this->storeinfo->getstoreinfo();
        $data["menu"] = $this->menumodel->getmainmenufordisplay();
        $data["allTags"] = $this->usermodel->fetchAllTagsForProduct();
        $data["mainCategoriesDisplay"]= $this->usermodel->getcategoriesforhomedisplay();
        $data["classDisplay"]= $this->usermodel->getClassForDisplay();
        $data["newStockProducts"]= $this->usermodel->getnewStock();
        $data["featuredProducts"]= $this->usermodel->fetchFeaturedProducts();
        $data["cart"]= $this->usermodel->fetchThisUserCart();
       $this->load->view('display/error404',$data);
    }

    public function registeruser(){
        $this->form_validation->set_rules("register-fullname", "Full Name", "required|trim|min_length[3]");
        $this->form_validation->set_rules("register-username", "Username", "required|trim|min_length[3]");
        $this->form_validation->set_rules("register-email", "Email", "required|trim|min_length[3]");
        $this->form_validation->set_rules("register-password", "Password", "required|trim|min_length[4]");
        if ($this->form_validation->run() == FALSE) {
            $data = $this->storeinfo->getstoreinfo();
            $data["menu"] = $this->menumodel->getmainmenufordisplay();
            $data["cart"]= $this->usermodel->fetchThisUserCart();
            $this->load->view('display/signin',$data);
        }else{
            $userdetail["fullname"] = $this->input->post("register-fullname");
            $userdetail["username"] = $this->input->post("register-username");
            $userdetail["email"] = $this->input->post("register-email");
            $userdetail["password"] = md5($this->input->post("register-password"));
            
            if(!$this->usermodel->registeruser($userdetail)){
                $data = $this->storeinfo->getstoreinfo();
                $data["feedback"] = "Error Registering User, Try Again ...";
                $data["menu"] = $this->menumodel->getmainmenufordisplay();
                $data["cart"]= $this->usermodel->fetchThisUserCart();
                $this->load->view('display/signin',$data);
            }else{
                $data = $this->storeinfo->getstoreinfo();
                $data["cart"]= $this->usermodel->fetchThisUserCart();
                $data["menu"] = $this->menumodel->getmainmenufordisplay();
                $this->myaccount();
    
            }
           
        }

    }

   

    public function loginuser() {
        if (!$this->usermodel->userlogin()) {
            $data = array();
            $data = $this->storeinfo->getstoreinfo();
            $data["cart"]= $this->usermodel->fetchThisUserCart();
            $data["menu"] = $this->menumodel->getmainmenufordisplay();
            $data["mainCategoriesDisplay"]= $this->usermodel->getcategoriesforhomedisplay();
            $data["loginfeedback"] = "Wrong Username or Password";
            $this->load->view("display/signin", $data);
        } else {
            $this->myaccount();
        }
    }

    public function myaccount() {
        if ($this->session->userdata("user") == "")
        redirect("home/registeruser");
        $data = $this->storeinfo->getstoreinfo();
        $userCredentials = $this->usermodel->getusercredentials();
        $data["mainCategoriesDisplay"]= $this->usermodel->getcategoriesforhomedisplay();
        $data["fullname"] = $userCredentials["fullname"];
        $data["userid"] = $userCredentials["userid"];
        $data["username"] = $userCredentials["username"];
        $data["email"] = $userCredentials["email"];
        $data["menu"] = $this->menumodel->getmainmenufordisplay();
        $data["cart"]= $this->usermodel->fetchThisUserCart();
       $this->load->view('display/myaccount',$data);
    }
    public function signin() {
        $data = $this->storeinfo->getstoreinfo();
        $data["menu"] = $this->menumodel->getmainmenufordisplay();
        $data["mainCategoriesDisplay"]= $this->usermodel->getcategoriesforhomedisplay();
        $data["cart"]= $this->usermodel->fetchThisUserCart();
       $this->load->view('display/signin',$data);
    }

    public function cart() {
        if ($this->session->userdata("user") == "")
        redirect("home/registeruser");
        $data = $this->storeinfo->getstoreinfo();
        $data["menu"] = $this->menumodel->getmainmenufordisplay();
        $data["cart"]= $this->usermodel->fetchThisUserCart();
        $data["mainCategoriesDisplay"]= $this->usermodel->getcategoriesforhomedisplay();
       $this->load->view('display/cart',$data);
    }
    public function addtocart() {
        if ($this->session->userdata("user") == "")
        redirect("home/registeruser");
        $data = $this->storeinfo->getstoreinfo();
        $data["menu"] = $this->menumodel->getmainmenufordisplay();
        $data["mainCategoriesDisplay"]= $this->usermodel->getcategoriesforhomedisplay();
        $data["cartFeedback"]= $this->usermodel->addToCart();
        $data["cart"]= $this->usermodel->fetchThisUserCart();
       $this->load->view('display/cart',$data);
    }
    public function deletethiscartproduct() {
        if ($this->session->userdata("user") == "")
        redirect("home/registeruser");
        
        if(!$this->usermodel->deleteThisCartProduct($this->uri->segment(3))){
            $data["feedback"] = "Product Deleted From Cart";
            $this->cart();
        }else{
            $data["feedback"] = "Unable To Delete Product From Cart";
            $this->cart();
        }
    }
   

    public function wishlist() {
        $data = $this->storeinfo->getstoreinfo();
        $data["menu"] = $this->menumodel->getmainmenufordisplay();
        $data["mainCategoriesDisplay"]= $this->usermodel->getcategoriesforhomedisplay();
        $data["cart"]= $this->usermodel->fetchThisUserCart();
       $this->load->view('display/wishlist',$data);
    }

    public function searchlist() {

        $data = $this->storeinfo->getstoreinfo();
        $data["searchedProducts"] = $this->usermodel->fetchCatgProducts($this->uri->segment(3));
        $data["menu"] = $this->menumodel->getmainmenufordisplay();
        $data["mainCategoriesDisplay"]= $this->usermodel->getcategoriesforhomedisplay();
        $data["classDisplay"]= $this->usermodel->getClassForDisplay();
        $data["cart"]= $this->usermodel->fetchThisUserCart();
       $this->load->view('display/searchlist',$data);
    }

    public function checkout() {
        $data = $this->storeinfo->getstoreinfo();
        $data["menu"] = $this->menumodel->getmainmenufordisplay();
        $data["mainCategoriesDisplay"]= $this->usermodel->getcategoriesforhomedisplay();
        $data["cart"]= $this->usermodel->fetchThisUserCart();
       $this->load->view('display/cheeckout',$data);
    }
    public function product() {
        $data = $this->storeinfo->getstoreinfo();
        $data["menu"] = $this->menumodel->getmainmenufordisplay();
        $data["mainCategoriesDisplay"]= $this->usermodel->getcategoriesforhomedisplay();
        $data["classDisplay"]= $this->usermodel->getClassForDisplay();
        $data["cart"]= $this->usermodel->fetchThisUserCart();
        $data["singleProduct"]= $this->usermodel->fetchSingleProduct($this->uri->segment(3));
       $this->load->view('display/product',$data);
    }

    public function logoutuser() {
        $this->session->unset_userdata("user");
        $this->signin();
       // redirect("home/registeruser");
    }

    
}