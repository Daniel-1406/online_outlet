<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class footerbg extends CI_Controller {

   
    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);
        

        $process_img['image_library'] = 'gd2';
        $process_img['source_image'] = './images/'.$data["file_name"];
        $process_img['create_thumb'] = TRUE;
        $process_img['maintain_ratio'] = TRUE;
        $process_img['width']= 186;
        $process_img['height']= 72;
        $this->load->library('image_lib', $process_img);
        
            if (!$this->upload->do_upload('userfile')) {
                $data=array();
                $data["error"] =$this->upload->display_errors();
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];

            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $rec['photo'] = $data["file_name"];

                if(!$this->image_lib->resize()){
                $data["error"] =$this->image_lib->display_errors();
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $this->load->view('updates/footerbg', $data);
                }else{
                    $data["msg"] = $this->footerbackg->updatefooterbg($rec);
                    $church= $this->churchinfo->getchurchinformation();
                    $pic=$this->footerbackg->getfooterbg();
                    $data["church"]=$church["name"];
                    $data["favicon"]=$pic["photo"];

                    $this->load->view('feedbacks/sermon', $data);
                }
                
            }
        
    }

    public function openfooterbg() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view("updates/footerbg", $data);
    }


    

}

?>
