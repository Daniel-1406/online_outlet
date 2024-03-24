<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class exhortation extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("title", "Exhortation Title", "required|trim|min_length[3]");
        $this->form_validation->set_rules("author", "Author", "required|trim|min_length[3]");
        $this->form_validation->set_rules("summary", "Exhortation Summary", "required|trim|min_length[3]");
        $this->form_validation->set_rules("date", "Exhortation Date", "required|trim|min_length[3]");
        $this->form_validation->set_rules("info", "Exhortation Information", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 3000000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $data = $this->exhortationmodel->editexhortation($this->input->post('id'));
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/exhortation',$data);
        } else {
                    if (!$this->upload->do_upload('userfile')) {
                        $data=array();
                        $error =$this->upload->display_errors();
                        $data = $this->exhortationmodel->editexhortation($this->input->post('id'));
                        $data['error']=$error;
                       
                        $church= $this->churchinfo->getchurchinformation();
                        $pic=$this->footerbackg->getfooterbg();
                        $data["church"]=$church["name"];
                        $data["favicon"]=$pic["photo"];
                        $this->load->view('updates/exhortation', $data);
        
                    } else {
                        $data = $this->upload->data();
                        $upload = array('upload_data' => $data);
                        $rec['photo'] = $data["file_name"];
                        $rec['id'] = $this->input->post('id');
                        $rec["title"] = $this->input->post("title");
                        $rec["author"] = $this->input->post("author");
                        $rec["date"] = $this->input->post("date");
                        $rec["summary"] = $this->input->post("summary");
                        $rec["info"] = $this->input->post("info");
                        $data["msg"] = $this->exhortationmodel->updateexhortation($rec);
                        $church= $this->churchinfo->getchurchinformation();
                        $pic=$this->footerbackg->getfooterbg();
                        $data["church"]=$church["name"];
                        $data["favicon"]=$pic["photo"];
                        $this->load->view('feedbacks/sermon', $data);
                    

                }

            


         
        }
    }

}

?>
