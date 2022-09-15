<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class eventupdate extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Event Name", "required|trim|min_length[3]");
        $this->form_validation->set_rules("description", "Event Description", "required|trim|min_length[3]");
        $this->form_validation->set_rules("date", "Event Date", "required|trim|min_length[3]");


        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000000;
        $config['max_width'] = 200000;
        $config['max_height'] = 200000;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
           $data= $this->eventmodel->editevent($this->input->post($id));
            $this->load->view('event',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('event', $error);
            } else {


                $data = $this->upload->data();
                $upload = array('upload_data' => $data);

                $rec["msg"] = $this->eventmodel->updateevent($data["file_name"]);

                $this->load->view('facilityfeedback', $rec);
            }
        }
    }

}

?>
