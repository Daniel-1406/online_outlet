<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        $storeInfo = $info=$this->storeinfo->getStoreInfo();
        $data["name"] = $storeInfo["name"];
        $data["logo"] = $storeInfo["logo"];
        $this->load->view('login', $data);
    }
    
    public function login() {
        $val = $this->admin->adminlogin();
        if ($val == "wrong") {
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $data["val"] = "<span style='color:red'>Wrong Username or password!</span>";
            $this->load->view("login", $data);
        } else {
            $this->opendashboard();
        }
    }
    public function opendashboard(){
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
        $data=array();
        
        $menu=$this->admin->countmenu();
        $storeInfo = $info=$this->storeinfo->getStoreInfo();
       
       
        $data["name"] = $storeInfo["name"];
        $data["logo"] = $storeInfo["logo"];
        $data["menu_count"]=$menu;
        
    
        $this->load->view("dashboard",$data);
}
    public function openinfo() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $data= $this->storeinfo->getStoreInfo();

        $this->load->view("updates/storeFeatures", $data);
    }
    
    
    public function updatestoreinfo() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Name", "required|trim|min_length[3]|max_length[100]");
        $this->form_validation->set_rules("information", "Information", "required|trim|min_length[1]");
        $this->form_validation->set_rules("address", " Address", "required|trim|min_length[1]");
        $this->form_validation->set_rules("telephone", "Telephone", "required|trim|min_length[1]");
        $this->form_validation->set_rules("email", "Email ", "required|trim|min_length[1]");
        $this->form_validation->set_rules("googlemap", "Google Map Location", "required|trim");
        $this->form_validation->set_rules("twitter", "Twitter Link", "required|trim|min_length[1]");
        $this->form_validation->set_rules("instagram", "Instagram Link" , "required|trim|min_length[1]");
        $this->form_validation->set_rules("youtube", "Youtube Link", "required|trim|min_length[1]");
        $this->form_validation->set_rules("facebook", "Facebook Link", "required|trim|min_length[1]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if(isset($_FILES['userfile']['error']) && $_FILES['userfile']['error'] === UPLOAD_ERR_NO_FILE){

            if ($this->form_validation->run() == FALSE) {
                $data= $this->storeinfo->getStoreInfo();
                
                $this->load->view("updates/storeFeatures",$data);
            } else {
                $val["id"] = $this->input->post("id");
                $val["name"] = $this->input->post("name");
                $val["email"] = $this->input->post("email");
                $val["information"] = $this->input->post("information");
                $val["address"] = $this->input->post("address");
                $val["googlemap"] = $this->input->post("googlemap");
                $val["telephone"] = $this->input->post("telephone");
                $val["facebook"] = $this->input->post("facebook");
                $val["twitter"] = $this->input->post("twitter");
                $val["youtube"] = $this->input->post("youtube");
                $val["instagram"] = $this->input->post("instagram");

                $feedback= $this->storeinfo->updateStoreInfo($val);
                $storeInfo = $info=$this->storeinfo->getStoreInfo();
                $data["name"] = $storeInfo["name"];
                $data["logo"] = $storeInfo["logo"];
                $data["feedback"] = $feedback;
                $this->load->view("feedbacks/sermon", $data);
            }

        }else{

            
            if ($this->form_validation->run() == FALSE) {
                $data= $this->storeinfo->getStoreInfo();
                $pic=$this->storelogo->getStoreLogo();
               
                $this->load->view("updates/storeFeatures",$data);
            } else {
                if (!$this->upload->do_upload('userfile')) {

                    $error =$this->upload->display_errors();
                    $store= $this->storeinfo->getStoreInfo();
                    $pic=$this->storelogo->getStoreLogo();                    
                    $data['error']=$error;

                    $data["id"] =$store["id"] ;
                    $data["name"] =$store["name"] ;
                    $data["information"] =$store["information"] ;
                    $data["address"] =$store["address"] ;
                    $data["telephone"] =$store["telephone"] ;
                    $data["twitter"] =$store["twitter"] ;
                    $data["facebook"] =$store["facebook"] ;
                    $data["instagram"] =$store["instagram"] ;
                    $data["youtube"] =$store["youtube"] ;
                    $data["googlemap"] =$store["googlemap"] ;
                    $data["logo"] =$store["logo"] ;
                    $data["email"] =$store["email"] ;

                    $store= $this->storeinfo->getStoreInfo();
                    $pic=$this->storelogo->getStoreLogo();
                    $data["church"]=$store["name"];
                    $data["favicon"]=$pic["photo"];
        
                    $this->load->view('updates/storeFeatures', $data);
                } else {
                    $data = $this->upload->data();
                    $upload = array('upload_data' => $data);
                    $val['logo'] = $data["file_name"];
                    $val["id"] = $this->input->post("id");
                    $val["name"] = $this->input->post("name");
                    $val["email"] = $this->input->post("email");
                    $val["information"] = $this->input->post("information");
                    $val["address"] = $this->input->post("address");
                    $val["googlemap"] = $this->input->post("googlemap");
                    $val["telephone"] = $this->input->post("telephone");
                    $val["facebook"] = $this->input->post("facebook");
                    $val["twitter"] = $this->input->post("twitter");
                    $val["youtube"] = $this->input->post("youtube");
                    $val["instagram"] = $this->input->post("instagram");
    
                    $feedback= $this->storeinfo->updateStoreInfo($val);
                    $storeInfo = $info=$this->storeinfo->getStoreInfo();
                    $data["name"] = $storeInfo["name"];
                    $data["logo"] = $storeInfo["logo"];
                    $data["feedback"] = $feedback;
                    $this->load->view("feedbacks/sermon", $data);
                }
            }

        }
    }
    

    
    public function logout() {
        $this->session->unset_userdata("admin_pass");
        redirect("welcome");
    }

}

