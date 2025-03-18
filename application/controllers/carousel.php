<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class carousel extends CI_Controller {

    public function opencarousel() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
        $this->load->view('uploads/carousel',$data);
    }

    public function uploadcarousel() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("header", "Carousel Header", "required|trim|min_length[3]");
        $this->form_validation->set_rules("text", "Carousel Text", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $this->load->view('uploads/carousel',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $error= $this->upload->display_errors();
                $storeInfo = $info=$this->storeinfo->getStoreInfo();
                $data["name"] = $storeInfo["name"];
                $data["logo"] = $storeInfo["logo"];
                $data["error"] = $error;
                $this->load->view('uploads/carousel', $data);
            } else {
                $photo = $this->upload->data();
                $upload = array('upload_data' => $photo);
                $feedback = $this->carouselmodel->uploadcarousel($photo["file_name"]);
                $storeInfo = $info=$this->storeinfo->getStoreInfo();
                $data["name"] = $storeInfo["name"];
                $data["logo"] = $storeInfo["logo"];
                $data["feedback"] = $feedback;
                $this->load->view('feedbacks/sermon', $data);
            }
        }
    }

    public function updatecarousel() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $this->form_validation->set_rules("header", "Carousel Header", "required|trim|min_length[3]");
            $this->form_validation->set_rules("text", "Carousel Text", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if($_FILES['userfile']['error'] === UPLOAD_ERR_NO_FILE){

            if ($this->form_validation->run() == FALSE) {
                $dbContent = $this->carouselmodel->editcarousel($this->input->post('id'));
                $storeInfo = $info=$this->storeinfo->getStoreInfo();
                $data["name"] = $storeInfo["name"];
                $data["logo"] = $storeInfo["logo"];
                $data["photo"] = $dbContent["photo"];
                $data["text"] = $dbContent["text"];
                $data["header"] = $dbContent["header"];
                $data["id"] = $dbContent["id"];
                $this->load->view('updates/carousel', $data);
            } else {
                    $rec['id'] = $this->input->post('id');
                    $rec["text"] = $this->input->post("text");
                    $rec["header"] = $this->input->post("header");
                    
                    $feedback = $this->carouselmodel->updatecarousel($rec);
                    $storeInfo = $info=$this->storeinfo->getStoreInfo();
                    $data["name"] = $storeInfo["name"];
                    $data["logo"] = $storeInfo["logo"];
                    $data["feedback"] = $feedback;
                    $this->load->view('feedbacks/sermon', $data);

                }
        
        }else{


            if ($this->form_validation->run() == FALSE) {
                $dbContent = $this->carouselmodel->editcarousel($this->input->post('id'));
                $storeInfo = $info=$this->storeinfo->getStoreInfo();
                $data["photo"] = $dbContent["photo"];
                $data["text"] = $dbContent["text"];
                $data["header"] = $dbContent["header"];
                $data["id"] = $dbContent["id"];
                $data["name"] = $storeInfo["name"];
                $data["logo"] = $storeInfo["logo"];
                $this->load->view('updates/carousel', $data);
            } else {
                if (!$this->upload->do_upload('userfile')) {
                    $data=array();
                    $error =$this->upload->display_errors();
                    $dbContent = $this->carouselmodel->editcarousel($this->input->post('id'));
                    $storeInfo = $info=$this->storeinfo->getStoreInfo();
                    $data['error']=$error;
                    $data["photo"] = $dbContent["photo"];
                    $data["text"] = $dbContent["text"];
                    $data["header"] = $dbContent["header"];
                    $data["id"] = $dbContent["id"];
                    $data["name"] = $storeInfo["name"];
                    $data["logo"] = $storeInfo["logo"];
        
                    $this->load->view('updates/carousel', $data);
                } else {
                    $data = $this->upload->data();
                    $upload = array('upload_data' => $data);
                    $rec['photo'] = $data["file_name"];
                    $rec['id'] = $this->input->post('id');
                    $rec["text"] = $this->input->post("text");
                    $rec["header"] = $this->input->post("header");
                    
                    $feedback = $this->carouselmodel->updatecarousel($rec);
                    $storeInfo = $info=$this->storeinfo->getStoreInfo();
                    $data["name"] = $storeInfo["name"];
                    $data["logo"] = $storeInfo["logo"];
                    $data["feedback"] = $feedback;
        
                    $this->load->view('feedbacks/sermon', $data);
                }
            }
        }

        
    }


   
    
    public function viewcarousel() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->carouselmodel->viewcarousel();
        $storeInfo = $info=$this->storeinfo->getStoreInfo();
        $data["name"] = $storeInfo["name"];
        $data["logo"] = $storeInfo["logo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }

    public function deletethiscarousel() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $feedback = $this->carouselmodel->deletecarousel($this->uri->segment(3));
        $storeInfo = $info=$this->storeinfo->getStoreInfo();
        $data["name"] = $storeInfo["name"];
        $data["logo"] = $storeInfo["logo"];
        $data["feedback"] = $feedback;
        $this->load->view("feedbacks/sermon", $data);
    }
    public function editthiscarousel() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->carouselmodel->editcarousel($this->uri->segment(3));
        $storeInfo = $info=$this->storeinfo->getStoreInfo();
        $data["name"] = $storeInfo["name"];
        $data["logo"] = $storeInfo["logo"];
        $this->load->view("updates/carousel", $data);
    }

}

?>
