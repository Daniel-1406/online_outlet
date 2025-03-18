<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class product extends CI_Controller {

    public function openproduct() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $main_categories= $this->productmodel->getmaincategories();
            $class_cat= $this->productmodel->getclasscategories();
            $tags= $this->productmodel->gettags();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $data["main_categories"] = $main_categories;
            $data["class_cat"] = $class_cat;
            $data["tags"] = $tags;
        $this->load->view('uploads/product',$data);
    }

    public function uploadproduct() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("pr_name", "Product Name", "required|trim|min_length[3]");
        $this->form_validation->set_rules("pr_info", "Product Information", "required|trim|min_length[3]");
        $this->form_validation->set_rules("pr_sell_price", "Product Selling Price", "required|trim");
        $this->form_validation->set_rules("pr_slash_price", "Product Slashed Price", "required|trim");
        $this->form_validation->set_rules("pr_desc", "Product Description", "required|trim");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $main_categories= $this->productmodel->getmaincategories();
            $class_cat= $this->productmodel->getclasscategories();
            $tags= $this->productmodel->gettags();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $data["main_categories"] = $main_categories;
            $data["class_cat"] = $class_cat;
            $data["tags"] = $tags;
            $this->load->view('uploads/product',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $error= $this->upload->display_errors();
                $storeInfo = $info=$this->storeinfo->getStoreInfo();
                $main_categories= $this->productmodel->getmaincategories();
                $class_cat= $this->productmodel->getclasscategories();
                $tags= $this->productmodel->gettags();
                $data["name"] = $storeInfo["name"];
                $data["logo"] = $storeInfo["logo"];
                $data["main_categories"] = $main_categories;
                $data["class_cat"] = $class_cat;
                $data["tags"] = $tags;
                $data["error"] = $error;
                $this->load->view('uploads/product', $data);
            } else {
                $photo = $this->upload->data();
                $upload = array('upload_data' => $photo);
                $feedback = $this->productmodel->uploadproduct($photo["file_name"]);
                $storeInfo = $info=$this->storeinfo->getStoreInfo();
                $data["name"] = $storeInfo["name"];
                $data["logo"] = $storeInfo["logo"];
                $data["feedback"] = $feedback;
                $this->load->view('feedbacks/sermon', $data);
            }
        }
    }


    public function updateproduct() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("pr_name", "Product Name", "required|trim|min_length[3]");
        $this->form_validation->set_rules("pr_info", "Product Information", "required|trim|min_length[3]");
        $this->form_validation->set_rules("pr_sell_price", "Product Selling Price", "required|trim");
        $this->form_validation->set_rules("pr_slash_price", "Product Slashed Price", "required|trim");
        $this->form_validation->set_rules("pr_desc", "Product Description", "required|trim");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);


        if($_FILES['userfile']['error'] === UPLOAD_ERR_NO_FILE){
            if ($this->form_validation->run() == FALSE) {
                $data = $this->productmodel->editproduct($this->input->post('id'));
                $maincategories = $this->productmodel->maincategoryforupdate();
                $classcategories = $this->productmodel->classcategoryforupdate();
                $storeInfo = $info=$this->storeinfo->getStoreInfo();
                $data["name"] = $storeInfo["name"];
                $data["logo"] = $storeInfo["logo"];
                $data["maincategories"] = $maincategories;
                $data["classcategories"] = $classcategories;
                $this->load->view("updates/product", $data);
            } else {
                $rec['id'] = $this->input->post('id');
                $rec["pr_name"] = $this->input->post("pr_name");
                $rec["pr_info"] = $this->input->post("pr_info");
                $rec["pr_sell_price"] = $this->input->post("pr_sell_price");
                $rec["pr_slash_price"] = $this->input->post("pr_slash_price");
                $rec["pr_desc"] = $this->input->post("pr_desc");
                $rec["main_category"] = $this->input->post("main_category");
                $rec["class_category"] = $this->input->post("class_category");
                $checkedValues = $this->input->post("tags");

                $rec["tag_category"] = json_encode($checkedValues);

                $feedback = $this->productmodel->updateproduct($rec);
                $storeInfo = $info=$this->storeinfo->getStoreInfo();
                $data["name"] = $storeInfo["name"];
                $data["logo"] = $storeInfo["logo"];
                $data["feedback"] = $feedback;
                $this->load->view('feedbacks/sermon', $data);
            }

        }else{
            

        if ($this->form_validation->run() == FALSE) {
            $data = $this->productmodel->editproduct($this->input->post('id'));
            $maincategories = $this->productmodel->maincategoryforupdate();
            $classcategories = $this->productmodel->classcategoryforupdate();
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $data["maincategories"] = $maincategories;
            $data["classcategories"] = $classcategories;
            $this->load->view("updates/product", $data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
            $error= $this->upload->display_errors();
            $data = $this->productmodel->editproduct($this->input->post('id'));
            $maincategories = $this->productmodel->maincategoryforupdate();
            $classcategories = $this->productmodel->classcategoryforupdate();
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $data["maincategories"] = $maincategories;
            $data["classcategories"] = $classcategories;
            $data["error"] = $error;
            $this->load->view('updates/product', $data);

            } else {
                $photo = $this->upload->data();
                $upload = array('upload_data' => $photo);

                $rec['photo'] = $photo["file_name"];
                $rec['id'] = $this->input->post('id');
                $rec["pr_name"] = $this->input->post("pr_name");
                $rec["pr_info"] = $this->input->post("pr_info");
                $rec["pr_sell_price"] = $this->input->post("pr_sell_price");
                $rec["pr_slash_price"] = $this->input->post("pr_slash_price");
                $rec["pr_desc"] = $this->input->post("pr_desc");
                $rec["main_category"] = $this->input->post("main_category");
                $rec["class_category"] = $this->input->post("class_category");
                $checkedValues = $this->input->post("tags");

                $rec["tag_category"] = json_encode($checkedValues);


                $feedback = $this->productmodel->updateproduct($rec);
                $storeInfo = $info=$this->storeinfo->getStoreInfo();
                $data["name"] = $storeInfo["name"];
                $data["logo"] = $storeInfo["logo"];
                $data["feedback"] = $feedback;
                $this->load->view('feedbacks/sermon', $data);
            }
        }

        }

    }


    
    public function viewproducts() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->productmodel->viewproduct();
        $storeInfo = $info=$this->storeinfo->getStoreInfo();
        $data["name"] = $storeInfo["name"];
        $data["logo"] = $storeInfo["logo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }

    public function deletethisproduct() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $feedback = $this->carouselmodel->deletecarousel($this->uri->segment(3));
        $storeInfo = $info=$this->storeinfo->getStoreInfo();
        $data["name"] = $storeInfo["name"];
        $data["logo"] = $storeInfo["logo"];
        $data["feedback"] = $feedback;
        $this->load->view("feedbacks/sermon", $data);
    }
    public function editthisproduct() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

            $data = $this->productmodel->editproduct($this->uri->segment(3));
            $maincategories = $this->productmodel->maincategoryforupdate();
            $classcategories = $this->productmodel->classcategoryforupdate();
            $storeInfo = $info=$this->storeinfo->getStoreInfo();
            $data["name"] = $storeInfo["name"];
            $data["logo"] = $storeInfo["logo"];
            $data["maincategories"] = $maincategories;
            $data["classcategories"] = $classcategories;
            $this->load->view("updates/product", $data);
    }

}

?>
