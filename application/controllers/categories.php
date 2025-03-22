<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class categories extends CI_Controller {

    public function openproductcategory() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["main_category"]= $this->categorymodel->getmaincategory();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $this->load->view('uploads/productcategory',$data);
    }

    public function categoryupload() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $this->form_validation->set_rules("cat_name", "Category Name Item", "required|trim");
            $this->form_validation->set_rules("orientation", "Category Orientation Item", "required|trim");
            //$this->form_validation->set_rules("child_orientation", "Child Orientation Item", "required|trim");
        
        if ($this->form_validation->run() == FALSE) {
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["main_category"]= $this->categorymodel->getmaincategory();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $this->load->view('uploads/productcategory',$data);
        } else {
            $feedback= $this->categorymodel->uploadcategory();
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $data["feedback"] = $feedback;
            $this->load->view('feedbacks/sermon', $data);
        }
    }
    public function viewcategories() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->categorymodel->viewcategories();
        $storeInfo = $info=$this->storeinfo->getStoreInfo();
        $data["name"] = $storeInfo["name"];
        $data["logo"] = $storeInfo["logo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];

        $this->load->view("manage", $data);
    }
    public function categoryupdate() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $this->form_validation->set_rules("cat_name", "Category Name Item", "required|trim");
            $this->form_validation->set_rules("cat_orientation", "Category Orientation Item", "required|trim");
            $this->form_validation->set_rules("child_orientation", "Child Orientation Item", "required|trim");
        
        if ($this->form_validation->run() == FALSE) {
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $dbContent = $this->categorymodel->editcategory($this->uri->segment(3));
            $mainCategory = $this->categorymodel->getmaincategoryforupdate();
            $data["cat_name"] = $dbContent["cat_name"];
            $data["cat_orientation"] = $dbContent["cat_orientation"];
            $data["child_orientation"] = $dbContent["child_orientation"];
            $data["id"] = $dbContent["id"];
            $data["maincategory"] = $mainCategory;
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];

            $this->load->view('updates/productcategory',$data);
        } else {

            $val["cat_name"] = $this->input->post("cat_name");
            $val["cat_orientation"] = $this->input->post("cat_orientation");
            $val["child_orientation"] = $this->input->post("child_orientation");
            $val["id"] = $this->input->post("id");


            $feedback= $this->categorymodel->updatecategory($val);
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $data["feedback"] = $feedback;
            $this->load->view('feedbacks/sermon', $data);
        }
    }

    public function editthiscategory() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");

        $storeInfo = $info=$this->storeinfo->getStoreInfo();
        $dbContent = $this->categorymodel->editcategory($this->uri->segment(3));
        $mainCategory = $this->categorymodel->getmaincategoryforupdate();
        $data["cat_name"] = $dbContent["cat_name"];
        $data["cat_orientation"] = $dbContent["cat_orientation"];
        $data["child_orientation"] = $dbContent["child_orientation"];
        $data["id"] = $dbContent["id"];
        $data["maincategory"] = $mainCategory;
        $data["name"] = $storeInfo["name"];
        $data["logo"] = $storeInfo["logo"];
       
        $this->load->view("updates/productcategory", $data);
    }

    public function deletethiscategory() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $feedback = $this->categorymodel->deletecategory($this->uri->segment(3));
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $data["feedback"] = $feedback;
            
            $this->load->view("feedbacks/sermon", $data);
    }












































    public function openform() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
        $this->load->view('uploads/form',$data);
    }

    public function viewrecord() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->recordmodel->viewrecord();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("manage", $data);
    }
    public function viewform() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->recordmodel->viewform();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("manage", $data);
    }


    public function deletethisrecord() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data["msg"] = $this->recordmodel->deleterecord($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("feedbacks/sermon", $data);
    }
    public function deletethisform() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data["msg"] = $this->recordmodel->deleteform($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("feedbacks/sermon", $data);
    }


    public function editthisrecord() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->recordmodel->editrecord($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("updates/record", $data);
    }
    public function editthisform() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->recordmodel->editform($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("updates/form", $data);
    }
    
    public function form_upload() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("title", "Title", "required|trim");
        $this->form_validation->set_rules("aboutform", "Description", "required|trim");
        
        if ($this->form_validation->run() == FALSE) {
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('uploads/form',$data);
        } else {
            $data["msg"] = $this->recordmodel->uploadform();
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('feedbacks/sermon', $data);
        }
    }
        public function updaterecord() {

            if ($this->session->userdata("admin_pass") == "")
                redirect("welcome/");
            $this->form_validation->set_rules("record", "Record", "required|trim|min_length[3]");
            $this->form_validation->set_rules("value", "Value", "required|trim");
            $this->form_validation->set_rules("numbering", "Numbering", "required|trim");
            
            if ($this->form_validation->run() == FALSE) {
                $data= $this->recordmodel->editrecord($this->input->post("id"));
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $this->load->view('updates/record', $data);
            } else {
                $val["record"] = $this->input->post("record");
                $val["value"] = $this->input->post("value");
                $val["id"] = $this->input->post("id");
                $val["numbering"] = $this->input->post("numbering");
    
    
            $data["msg"] = $this->recordmodel->updaterecord($val);
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
    
                $this->load->view('feedbacks/sermon', $data);
            }
        }
        public function updateform() {

            if ($this->session->userdata("admin_pass") == "")
                redirect("welcome/");
            $this->form_validation->set_rules("title", "Title", "required|trim");
            $this->form_validation->set_rules("aboutform", "Description", "required|trim");   
            if ($this->form_validation->run() == FALSE) {
                $data= $this->recordmodel->editform($this->input->post("id"));
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $this->load->view('updates/form', $data);
            } else {
                $val["title"] = $this->input->post("title");
                $val["about"] = $this->input->post("aboutform");
                $val["id"] = $this->input->post("id");
    
    
            $data["msg"] = $this->recordmodel->updateform($val);
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
    
                $this->load->view('feedbacks/sermon', $data);
            }
        }   


}

?>
